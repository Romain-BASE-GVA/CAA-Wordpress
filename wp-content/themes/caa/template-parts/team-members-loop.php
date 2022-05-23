<?php 
    // WP_Query arguments
    $args = array(
        'post_type' => array( 'team' ),
        'posts_per_page' => -1
    );

    // The Query
    $team = new WP_Query( $args );

?>

<?php if ( $team->have_posts() ): ?>
<section class="block block--team" id="team">
    <div class="team-list">
        <?php while($team->have_posts()) : $team->the_post(); 
            $memberRole = get_field('role');
            $memberImgId = get_post_thumbnail_id( $post->ID );
            $memberImgUrl = get_the_post_thumbnail_url($post->ID, 'large');
            $memberImgAlt = get_post_meta ( $memberImgId, '_wp_attachment_image_alt', true );
            $memberLinkedIn = get_field('linkedin_link');
            $memberGroup = get_field('group');
        ?>
        
        <a href="#" class="team-member" data-group="<?php echo $memberGroup->slug; ?>" data-desc="<?php the_content(); ?>">
            <h2><?php the_title(); ?></h2>
            <img src="<?php echo $memberImgUrl; ?>" alt="<?php echo $memberImgAlt; ?>">
            <p><?php echo $memberRole; ?></p>
        </a>
        <?php endwhile;?>
    </div>

</section>
<?php endif; wp_reset_postdata(); ?>