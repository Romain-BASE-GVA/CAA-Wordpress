<?php if( have_rows('content_block') ): ?>

<article class="article">

    <?php while( have_rows('content_block') ): the_row(); 
        $blockTitle = get_sub_field('block_title');
        $blockHash = preg_replace('/[^A-Za-z0-9\-]/', '-',  strtolower($blockTitle));
        $blockHash = str_replace('---', '-', $blockHash);
    ?>
        
        <!-- BLOCK TITLE AND TEXT -->
        <?php if( get_row_layout() == 'title_and_content' ): ?> 

            <?php get_template_part( 'template-parts/blocks/block-text', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash,
                'content' => get_sub_field('content')
            ) ); ?>

        <!-- BLOCK HOTSPOTS -->
        <?php elseif( get_row_layout() == 'hotspots' ): ?>

            <?php get_template_part( 'template-parts/blocks/block-hotspot', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash,
                'image' => get_sub_field('hotspot_image')
                //'hotspot' => get_sub_field('hotspot')
            )  ); ?> 
        
        <!-- IMAGE/PICTURE -->
        <?php elseif( get_row_layout() == 'image' ): ?>

            <?php get_template_part( 'template-parts/blocks/block-picture', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash,
                'image' => get_sub_field('img_img')
            )  ); ?>
        
        <!-- GRID LIST -->
        <?php elseif( get_row_layout() == 'grid_list' ): ?>

            <?php get_template_part( 'template-parts/blocks/block-grid-list', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash,
                'type' => get_sub_field('title_type') == 'bubble' ? 'type-1' : 'type-2'
            )  ); ?>
        
        <!-- STAT SLIDER -->
        <?php elseif( get_row_layout() == 'statistics_slider' ): ?>

            <?php get_template_part( 'template-parts/blocks/block-stats-slider', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>
        
        <!-- TIMELINE SLIDER -->
        <?php elseif( get_row_layout() == 'timeline_slider'): ?>

            <?php get_template_part( 'template-parts/blocks/block-timeline', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>
        
        <!-- DROPDOWNS -->
        <?php elseif( get_row_layout() == 'dropdowns' ):  ?>    

            <?php get_template_part( 'template-parts/blocks/block-dropdown', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>

        <!-- QUOTE -->
        <?php elseif( get_row_layout() == 'quote' ): ?> 

            <?php get_template_part( 'template-parts/blocks/block-super-quote', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>
            
        <!-- DOWNLOADS -->   
        <?php elseif( get_row_layout() == 'downloads' ): ?>     
            
            <?php get_template_part( 'template-parts/blocks/block-downloads', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>
        
        <!-- FIND OUT MORE -->
        <?php elseif( get_row_layout() == 'find_out_more' ): ?>     

            <?php get_template_part( 'template-parts/blocks/block-find-out-more', null, array(
                'blockTitle' => $blockTitle,
                'blockID' => $blockHash
            )  ); ?>

        <?php endif ?>

    <?php endwhile; ?>

</article>

<?php endif; ?>