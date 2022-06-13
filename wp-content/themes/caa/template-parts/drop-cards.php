<section class="section section--drop-cards">
	<div class="section__header">
		<h2 class="section__title">Le Climate Action Accelerator offre des solutions concrètes et une plateforme de partage à votre organisation pour accélérer le changement.
		</h2>
		<a href="#" class="see-more see-more--on-light see-more--with-arrow">Composez votre jeu</a>
	</div>
    <?php 
		$featuredPosts = get_field('home_featured_items');
    	if( $featuredPosts ): 
	?>
    
	<div class="card-drop-list">
	<?php foreach( $featuredPosts as $featuredPost ): 
        //setup_postdata($post); 
		$permalink = get_permalink( $featuredPost->ID );
		$title = get_the_title( $featuredPost->ID );
		$postType = get_post_type( $featuredPost->ID );
		$featuredImgUrl = get_the_post_thumbnail_url($featuredPost->ID, 'medium');
		$introduction = get_field('introduction', $featuredPost->ID, false, false);
		$partnerIntro = wp_trim_words( get_field('introduction'), 20, '...' );
		$partnerLogo = get_field('partner_logo', $featuredPost->ID);
		$date = $featuredPost->post_type === 'events' ? get_field('event_date', $featuredPost->ID) : get_the_time('d.m.y', $featuredPost->ID);
		$bgColor;
		$areas = get_field('solution_areas', $featuredPost->ID);

		if( $areas ):
			foreach( $areas as $area ):
	
				if(get_field('color', $area->ID)):
					$bgColor = get_field('color', $area->ID);
				elseif( get_field('color', wp_get_post_parent_id($area->ID)) ):
					$bgColor = get_field('color', wp_get_post_parent_id($area->ID));
				else:
					$bgColor = null;
				endif;
				
			endforeach;
		endif;

		$tags = array_map(function (WP_Term $term) {
			return $term->name;
		}, wp_get_post_terms($post->ID, 'tags'));
	
		$sectors = array_map(function (WP_Term $term) {
			return $term->name;
		}, wp_get_post_terms($post->ID, 'sector'));
	?>
            <?php if($postType === 'solutions'): ?>

<div class="card card--rounded card--solution card--<?php echo $bgColor; ?>">
	<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
			</div>
		</div>
		<?php if($areas): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach( $areas as $area ): 
				$title = get_the_title( $area->ID );
			?>
				<li class="card__tag-item"><?php echo $title; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php elseif($postType === 'page'): ?>

<div class="card card--page">
	<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
			</div>
		</div>
		<?php if($areas || $tags): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach( $areas as $area ): 
				$title = get_the_title( $area->ID );
			?>
				<li class="card__tag-item"><?php echo $title; ?></li>
			<?php endforeach; ?>
			<?php foreach($tags as $tag): ?>
				<li class="card__tag-item"><?php echo $tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php elseif($postType === 'experiences'): ?>

<div class="card card--experience">
	<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
			</div>
		</div>
		<?php if($tags): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach($tags as $tag): ?>
				<li class="card__tag-item"><?php echo $tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php elseif($postType === 'experts'): ?>

<div class="card card--expert">
	<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
				<p class="card__sub-title">Fondateur de projet Drawdown</p>
			</div>
			<?php if($featuredImgUrl): ?>
			<div class="card__media">
				<div class="card__img">
					<img src="<?php echo $featuredImgUrl; ?>" alt="">
					<div class="img-cover" style="background-image: url(<?php echo $featuredImgUrl; ?>)"></div>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php if($areas || $tags): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach( $areas as $area ): 
				$title = get_the_title( $area->ID );
			?>
				<li class="card__tag-item"><?php echo $title; ?></li>
			<?php endforeach; ?>
			<?php foreach($tags as $tag): ?>
				<li class="card__tag-item"><?php echo $tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php elseif($postType === 'post'): ?>

<div class="card card--news">
	<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
			<span class="card__time"><?php echo $date; ?></span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
			</div>
		</div>
		<?php if($tags): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach($tags as $tag): ?>
				<li class="card__tag-item"><?php echo $tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php elseif($postType === 'events'): ?>

<div class="card card--event">
<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
			<?php if($date): ?>
				<span class="card__time"><?php echo $date; ?></span>
			<?php endif; ?>
		</header>
		<div class="card__main">

			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
			</div>

		</div>
		<?php if($tags): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach($tags as $tag): ?>
				<li class="card__tag-item"><?php echo $tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>
<?php elseif($postType === 'partners'): ?>

<div class="card card--partner">
<a href="<?php echo $permalink; ?>" class="card__link" title="<?php echo $title; ?>"><span><?php echo $title; ?></span></a>
	<div class="card-in">
		<header class="card__header">
			<span class="card__type">
				<span class="card__type__icon"></span>
				<span class="card__type__name"><?php echo $postType; ?></span>
			</span>
		</header>
		<div class="card__main">
			<div class="card__main__top">
				<h2 class="card__title"><?php echo $title; ?></h2>
				<?php if($partnerIntro): ?>
					<div class="card__sub-title">
						<?php echo $partnerIntro; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="card__media">
				<?php if($partnerLogo): ?>
				<div class="card--partner__logo">
					<img src="<?php echo $partnerLogo['url']; ?>" alt="<?php echo $title; ?>">
				</div>
				<?php endif; ?>
				<div class="card__img">
					<img src="<?php echo $featuredImgUrl; ?>" alt="">
					<div class="img-cover" style="background-image: url(<?php echo $featuredImgUrl; ?>)"></div>
				</div>
			</div>
		</div>
		<?php if($sectors): ?>
		<footer class="card__footer">
			<ul class="card__tags">
			<?php foreach($sectors as $sector): ?>
				<li class="card__tag-item"><?php echo $sector; ?></li>
			<?php endforeach; ?>
			</ul>
		</footer>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>
	<?php endforeach; ?>
	</div>
	<?php wp_reset_postdata(); endif;?>
</section>