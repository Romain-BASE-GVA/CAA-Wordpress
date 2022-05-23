<section class="block block--video" id="<?php echo $args['blockID']; ?>">
    <h2 class="block__title<?php echo $args['hideTitle']; ?>"><?php echo $args['blockTitle']; ?></h2>
    <?php 
        $videoPoster = get_sub_field('video_image');
        $videoType = get_sub_field('video_type');
        $videoFile = get_sub_field('video_file');
    ?>
    <?php if($videoType == 'file'): ?>
        <video class="block--video__video block--video__video--file lazy" playsinline controls data-poster="<?php echo $videoPoster['sizes']['large']; ?>" preload="none">
            <source src="<?php echo $videoFile['url'] ?>" type="video/mp4" />
        </video>
    <?php elseif($videoType == 'youtube'): 
        $youtubeIdVideo = get_sub_field('video_id');    
    ?>
        <div class="block--video__video block--video__video--youtube lazy" style="background-image:url(<?php echo $videoPoster['sizes']['thumbnail']; ?>);" data-bg="<?php echo $videoPoster['url']; ?>">
            <button class="block--video__play" data-video-id="<?php echo $youtubeIdVideo; ?>">
                <svg viewBox="0 0 18 18">
                    <path d="M15.562 8.1L3.87.225c-.818-.562-1.87 0-1.87.9v15.75c0 .9 1.052 1.462 1.87.9L15.563 9.9c.584-.45.584-1.35 0-1.8z"></path>
                </svg>
            </button>
        </div>
    <?php endif; ?>
</section>