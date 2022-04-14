<?php

function algolia_post_to_record(WP_Post $post) {
    $tags = array_map(function (WP_Term $term) {
        return $term->name;
    }, wp_get_post_terms($post->ID, 'tags'));

    $fields = array_map(function (WP_Term $term) {
        return $term->name;
    }, wp_get_post_terms($post->ID, 'field'));

    $sectors = array_map(function (WP_Term $term) {
        return $term->name;
    }, wp_get_post_terms($post->ID, 'sector'));

    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'large');
    $introduction = get_field('introduction', $post->ID, false, false);
    $partnerLogo = get_field('partner_logo', $post->ID);
    $partnerLink = get_field('partner_link', $post->ID);

    $pageContent = '';
    //$blockContentField = get_field('content_block', $post->ID );

    if( have_rows('content_block', $post->ID) ):
        // Loop through rows.

        while ( have_rows('content_block', $post->ID) ) : the_row();

            // Case: Paragraph layout.
            if( get_row_layout() == 'downloads' ):
                $title = get_sub_field('block_title');
            // Do something...
                $pageContent .= ' ' . $title;

                if( have_rows('download') ):
                    while ( have_rows('download') ) : the_row();
                        $downloadTitle = get_sub_field('download_title');
                        $downloadDescription = get_sub_field('download_description');
                        $file = get_sub_field('download_file');

                        $pageContent .= ' ' . $downloadTitle . ' ' . $downloadDescription . ' ' . $file['caption'] . ' ' . $file['filename'];

                    endwhile;
                endif;
                        // Case: Paragraph layout.
            elseif( get_row_layout() == 'find_out_more' ):
                $title = get_sub_field('block_title');
            // Do something...
                $pageContent .= ' ' . $title;

                if( have_rows('more_item') ):
                    while ( have_rows('more_item') ) : the_row();
                        $moreItemTitle = get_sub_field('title');
                        $moreItemDescription = get_sub_field('description');
                        $moreItemLink = get_sub_field('link');

                        $pageContent .= ' ' . $moreItemTitle . ' ' . $moreItemDescription . ' ' . $moreItemLink['url'] . ' ' . $moreItemLink['title'];

                    endwhile;
                endif;
            // Case: Download layout.
            elseif( get_row_layout() == 'hotspots' ): 
                $title = get_sub_field('block_title');
                $hotspotImg = get_sub_field('hotspot_image');
                // Do something...
                $pageContent .= ' ' . $title . ' ' . $hotspotImg['alt'] . ' ' . $hotspotImg['caption'];

                if( have_rows('hotspot') ):
                    while ( have_rows('hotspot') ) : the_row();
                        $hotspotContent = get_sub_field('content', false, false);

                        $pageContent .= ' ' . $hotspotContent;

                    endwhile;
                endif;

            elseif( get_row_layout() == 'image' ): 
                $title = get_sub_field('block_title');
                $imgImg = get_sub_field('img_img');

                $pageContent .= ' ' . $title . ' ' . $imgImg['alt'] . ' ' . $imgImg['caption'];
            elseif( get_row_layout() == 'statistics_slider' ): 
                $title = get_sub_field('block_title');
                // Do something...
                $pageContent .= ' ' . $title;

                if( have_rows('slide') ):
                    while ( have_rows('slide') ) : the_row();
                        $statSlideTitle = get_sub_field('title');
                        $statSlideStat = get_sub_field('statistic');
                        $statSlideContent = get_sub_field('content');

                        $pageContent .= ' ' . $statSlideTitle . ' ' . $statSlideStat . ' ' . $statSlideContent;

                    endwhile;
                endif;

            elseif( get_row_layout() == 'timeline_slider' ): 
                $title = get_sub_field('block_title');
                // Do something...
                $pageContent .= ' ' . $title;

                if( have_rows('slide') ):
                    while ( have_rows('slide') ) : the_row();
                        $tlSlideTitle = get_sub_field('title');
                        $tlSlideTime = get_sub_field('time');
                        $tlSlideContent = get_sub_field('content');

                        $pageContent .= ' ' . $tlSlideTitle . ' ' . $tlSlideTime . ' ' . $tlSlideContent;

                    endwhile;
                endif;

            elseif( get_row_layout() == 'grid_list' ): 
                $title = get_sub_field('block_title');
                
                $pageContent .= ' ' . $title;

                if( have_rows('item') ):
                    while ( have_rows('item') ) : the_row();
                        $gridItemTitle = get_sub_field('title');
                        $gridItemContent = get_sub_field('content');

                        $pageContent .= ' ' . $gridItemTitle . ' ' . $gridItemContent;

                    endwhile;
                endif;

            elseif( get_row_layout() == 'title_and_content' ): 
                $title = get_sub_field('block_title');
                $content = get_sub_field('content', false, false);
                
                $pageContent .= ' ' . $title . ' ' . $content;
    
            endif;

        // End loop.

        endwhile;
        // $pageContent = "Some Content";
    else :
        // no rows found
        $pageContent = "";
    endif;

    return [
        'objectID' => implode('#', [$post->post_type, $post->ID]),
        'postType' => $post->post_type,
        'title' => $post->post_title,
        // 'author' => [
        //     'id' => $post->post_author,
        //     'name' => get_user_by('ID', $post->post_author)->display_name,
        // ],
        'partnerInfo' => array('logoUrl' => $partnerLogo['url'], 'linkTitle' => $partnerLink['title'], 'linkUrl' => $partnerLink['url']),
        'intro' => $introduction,
        //'excerpt' => $post->post_excerpt,
        'mainImage' => $featured_img_url,
        //'content' => strip_tags($post->post_content),
        'tags' => $tags,
        'fields' => $fields,
        'sectors' => $sectors,
        'url' => get_post_permalink($post->ID),
        // 'pageContent' => get_field('content_block', $post->ID ),
        'pageContent' => $pageContent,
    ];
}

function algolia_update_post($id, WP_Post $post, $update) {
    if (wp_is_post_revision($id) || wp_is_post_autosave($id)) {
        return $post;
    }

    global $algolia;

    $record = (array) apply_filters($post->post_type.'_to_record', $post);

    if (!isset($record['objectID'])) {
        $record['objectID'] = implode('#', [$post->post_type, $post->ID]);
    }

    $index = $algolia->initIndex(
        apply_filters('algolia_index_name', 'CAA-test')
    );

    if ('trash' == $post->post_status) {
        $index->deleteObject($record['objectID']);
    } else {
        $index->saveObject($record);
    }

    return $post;
}

function algolia_update_post_meta($meta_id, $object_id, $meta_key, $_meta_value) {
    global $algolia;
    $indexedMetaKeys = ['seo_description', 'seo_title'];

    if (in_array($meta_key, $indexedMetaKeys)) {
        $index = $algolia->initIndex(
            apply_filters('algolia_index_name', 'CAA-test')
        );

        $index->partialUpdateObject([
            'objectID' => implode('#', [$post->post_type, $post->ID]),
            $meta_key => $_meta_value,
        ]);
    }
}

add_filter('post_to_record', 'algolia_post_to_record');
add_action('save_post', 'algolia_update_post', 10, 3);
add_action('update_post_meta', 'algolia_update_post_meta', 10, 4);

