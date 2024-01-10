<?php
/*
Template Name: Page video
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="hero__media" data-scrolly="fromAlpha">
        <?php
             $image = get_field('inspirer_video_hero_media');
        ?>
        <?php if( !empty( $image ) ): ?>
        <div class="image"><img src="<?php echo esc_url($image['url']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="hero__content" data-scrolly="fromBottom">
        <h1><?php the_field("inspirer_video_hero_title"); ?></h1>
    </div>
</section>
<section class="section b-videos sections--colors-section-marine section--fig grid-wrapper">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-arrow"></use>
            </svg>
            <div class="title__content">
                <h3><?php the_field("inspirer_section_video_title"); ?></h3>
                <p class="title__sub"><?php the_field("inspirer_section_video_subtitle"); ?></p>
            </div>
        </div>
        <div class="grid grid-2">
            <?php 
                $args = array(
                    'post_type' => 'gbi_videos',
                    'posts_per_page'=>-1,
                );
                $the_query = new WP_Query( $args ); 
                $count = $the_query->found_posts;
                ?>

            <?php if ( $the_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            
         ?>


            <div class="video" data-scrolly="fromBottom" data-component="Video"
                data-video-id="<?php echo the_field('inspirer_video_id'); ?>" data-controls="true">
                <div class="video__media js-video">
                    <?php
                        $image = get_field('inspirer_video_media');
                        
                    ?>
                    <?php if( !empty( $image ) ): ?>
                    <img class="js-poster" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>

                    <button class="btn-play">
                        <svg class="icon icon--md">
                            <use xlink:href="#icon-play"></use>
                        </svg>
                    </button>
                </div>
            </div>


            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>