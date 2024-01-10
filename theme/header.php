<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <title>Inspirer. Respirer.</title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6NB6YWVCW7"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6NB6YWVCW7');
    </script>
    <?php wp_head(); ?>
</head>
<?php if (is_front_page()) : ?>

<body <?php body_class("front-page"); ?>>
    <?php else : ?>
    <svg class="icon">
        <use xlink:href="#icon-close"></use>
    </svg>

    <body <?php body_class(); ?>>
        <?php endif;?>
        <?php include('partials/body_begins.php'); ?>
        <div class="site-container" data-component="Scrolly">
            <header class="header grid-wrapper" data-component="Header" data-auto-hide>
                <div class="grid-center">
                    <nav class="nav-socials">
                        <?php if( have_rows('gbi_global_nav_social', 'option') ): ?>

                        <ul>
                            <?php if(get_field('inspirer_traduction_active', 'option')) : ?>
                            <?php 
                                    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 1, 'raw' => 1 ) );
                                    ?>
                            <?php if ($langs_array) : ?>
                            <?php foreach ($langs_array as $lang) : ?>
                            <li>
                                <a href="<?php echo $lang['url']; ?>" class="nav-socials__item --lang">
                                    <?php echo $lang['slug']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php while( have_rows('gbi_global_nav_social', 'option') ): the_row(); ?>

                            <li><a href="<?php the_sub_field('nav_item_link'); ?>" class="nav-socials__item "><svg
                                        class="icon icon--<?php the_sub_field('nav_item_icon'); ?>">
                                        <use xlink:href="#icon-<?php the_sub_field('nav_item_icon'); ?>"></use>
                                    </svg></a></li>
                            <?php endwhile; ?>

                        </ul>

                        <?php endif; ?>
                    </nav>
                    <div class="header__brand">
                        <a href="/"><img src="<?php echo get_template_directory_uri() ?>/dist/images/logo.png"
                                alt="Inspirer, respirer - Argenteuil"></a>
                    </div>
                    <button class="header__toggle js-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                </div>
                <nav class="nav-primary">
                    <nav class="nav-links">
                        <?php if( have_rows('gbi_global_nav_avantage', 'option') ): ?>

                        <ul>

                            <?php while( have_rows('gbi_global_nav_avantage', 'option') ): the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('nav_item_link'); ?>"
                                    class="nav-links__item <?php the_sub_field('nav_item_color')?>">
                                    <svg class="icon">
                                        <use xlink:href="#icon-<?php the_sub_field('nav_item_icon'); ?>"></use>
                                    </svg>
                                    <?php the_sub_field('nav_item_title'); ?></a>
                            </li>
                            <?php endwhile; ?>

                        </ul>

                        <?php endif; ?>
                    </nav>
                    <nav class="nav-municip">
                        <ul>
                            <li>
                                <span href="#" class="nav-links__item municipalities">
                                    <svg class="icon">
                                        <use xlink:href="#icon-splash"></use>
                                    </svg>
                                    <?php the_field('gbi_global_nav_municip_title', 'option') ?></span>
                            </li>
                            <?php if( have_rows('gbi_global_nav_municip', 'option') ): ?>
                            <?php while( have_rows('gbi_global_nav_municip', 'option') ): the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('nav_item_link'); ?>"
                                    class="nav__item"><?php the_sub_field('nav_item_title'); ?></a>
                            </li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <nav class="nav-others">
                        <ul>
                            <?php if( have_rows('gbi_global_nav_secondary', 'option') ): ?>
                            <?php while( have_rows('gbi_global_nav_secondary', 'option') ): the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('nav_item_link'); ?>"
                                    class="nav__item"><?php the_sub_field('nav_item_title'); ?></a>
                            </li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if(get_field('inspirer_traduction_active', 'option')) : ?>
                            <?php 
                                    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 1, 'raw' => 1 ) );
                                    ?>
                            <?php if ($langs_array) : ?>
                            <?php foreach ($langs_array as $lang) : ?>
                            <li>
                                <a href="<?php echo $lang['url']; ?>" class="nav__item">
                                    <?php echo $lang['name']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endif; ?>

                        </ul>
                    </nav>
                    <nav>


                    </nav>
                </nav>
            </header>