<section class="block block--picture" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <figure>
        <picture>
            <!--
            <source srcset="logo-768.png 768w, logo-768-1.5x.png 1.5x">
            <source srcset="logo-480.png, logo-480-2x.png 2x">
            -->
            <img class="lazy" src="<?php echo $args['image']['sizes']['medium']; ?>" data-src="<?php echo $args['image']['sizes']['large']; ?>" alt="<?php echo $args['image']['alt']; ?>">
        </picture>
        <figcaption><?php echo $args['image']['caption']; ?></figcaption>
    </figure>
</section>