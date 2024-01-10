<?php
/*
Template Name: Page contact
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="hero__media" data-scrolly="fromAlpha">
        <?php
             $image = get_field('contact_hero_media');
        ?>
        <?php if( !empty( $image ) ): ?>
        <div class="image"><img src="<?php echo esc_url($image['url']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="hero__content" data-scrolly="fromBottom">
        <h1><?php the_title(); ?></h1>
    </div>
</section>
<section class="section b-form grid-wrapper section--fig  sections--colors-section-green">
    <div class="grid-center">
        <div class="grid">
            <div class="title title--splash" data-scrolly="fromLeft">
                <svg class="icon">
                    <use xlink:href="#icon-splash"></use>
                </svg>
                <div class="title__content">
                    <h3><?php echo get_field("contact_form_title"); ?></h3>
                </div>
            </div>
            <?php 
                $form_id = 2;
                
                if(pll_current_language() == 'en'){
                    $form_id = 3;
                }
                gravity_form( $form_id, false, false, false, '', false ); 
            
            ?>
        </div>
    </div>
</section>




<?php get_footer(); ?>