<?php
$whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
$isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);
$algoliaIndex = $isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';

if (!(defined('WP_CLI') && WP_CLI)) {
    return;
}

class Algolia_Command {
    public function reindex_post($args, $assoc_args) {
        global $algolia;
        global $algoliaIndex;
        $index = $algolia->initIndex($algoliaIndex);
  
        $index->clearObjects()->wait();
  
        $paged = 1;
        $count = 0;
  
        do {
            $posts = new WP_Query([
                'posts_per_page' => 1000,
                'paged' => $paged,
                'post_type' => array( 'solutions', 'events', 'experts', 'resources', 'experiences', 'post', 'partners', 'areas' )
            ]);
  
            if (!$posts->have_posts()) {
                break;
            }
  
            $records = [];
  
            foreach ($posts->posts as $post) {
                if (!empty($assoc_args['verbose'])) {
                    WP_CLI::line('Serializing ['.$post->post_title.']');
                }
                $record = (array) apply_filters('post_to_record', $post);
  
                if (!isset($record['objectID'])) {
                    $record['objectID'] = implode('#', [$post->post_type, $post->ID]);
                }
  
                $records[] = $record;
                $count++;
            }
  
            if (!empty($assoc_args['verbose'])) {
                WP_CLI::line('Sending batch');
            }
  
            $index->saveObjects($records);
  
            $paged++;
  
        } while (true);
  
        WP_CLI::success("$count posts indexed in Algolia");
    }
  }
  

WP_CLI::add_command('algolia', 'Algolia_Command');