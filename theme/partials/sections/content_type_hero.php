<?php 
    $icon =  get_sub_field('content_type_hero_icon');
    $image = get_sub_field('content_type_hero_media');
    $logo = get_sub_field('content_type_hero_logo');
?>

<?php if( have_rows('content_type_section_colors') ): ?>
<?php while( have_rows('content_type_section_colors') ): the_row(); 

        // Get sub field values.
        $main = get_sub_field('content_type_color_section');
        $content = get_sub_field('content_type_color_content');
        $accent = get_sub_field('content_type_color_highlight');

        ?>

<?php endwhile; ?>
<?php endif; ?>
<section
    class="hero<?php echo (!empty($logo) ) ? ' hero--page' : '' ?><?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">

    <div class="hero__media" data-scrolly="fromAlpha">
        <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <?php if( !empty( $logo ) ): ?>
        <img class="hero__media__logo" src="<?php echo esc_url($logo['url']); ?>"
            alt="<?php echo esc_attr($logo['alt']); ?>" />
        <?php endif; ?>
    </div>
    <div class="hero__content" data-scrolly="fromBottom">

        <h1>

            <?php echo get_sub_field('content_type_hero_title', false, false); ?>

            <?php if( !empty( $logo ) ): ?>
            <?php if( !empty( $icon ) && $icon !== "none" ): ?>
            <svg class="icon<?php echo ($icon == "splash") ? ' icon--revert' : '' ?>">
                <use xlink:href="#icon-<?php echo $icon ?>"></use>
            </svg>
            <?php endif ?>
            <?php endif ?>
        </h1>
    </div>
</section>