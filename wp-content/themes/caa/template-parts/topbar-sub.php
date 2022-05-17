<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="top-bar__sub">
        <div class="top-bar__breadcrumb"><?php the_breadcrumb(); ?></div>
        <div class="top-bar__share">
            <button class="top-bar__share__btn">Partager</button>
            <ul class="top-bar__share__list">
                <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink(); ?>" title="LinkedIn">LinkedIn</a></li>
                <li><a href="https://twitter.com/intent/tweet?text=lookatthis&url=<?php echo get_permalink(); ?>" title="Twitter">Twitter</a></li>
                <!-- <li><a href="http://www.facebook.com/share.php?<?php echo get_permalink(); ?>" title="Facebook">Facebook</a></li> -->
                <li><a href="https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=<?php echo get_permalink(); ?>&redirect_uri=<?php echo get_permalink(); ?>" title="Facebook">Facebook</a></li>
            </ul>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>