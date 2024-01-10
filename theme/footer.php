<?php if( have_rows('gbi_global_nav_municip', 'option') ): ?>
<div class="prefooter-nav grid-wrapper">
    <div class="grid-center">
        <nav class="nav-links" data-scrolly="fromBottom">

            <ul>

                <?php while( have_rows('gbi_global_nav_municip', 'option') ): the_row(); ?>
                <li>
                    <a href="<?php the_sub_field('nav_item_link'); ?>" class="nav-links__item">

                        <?php the_sub_field('nav_item_title'); ?></a>
                </li>
                <?php endwhile; ?>

            </ul>

        </nav>
    </div>
</div>
<?php endif; ?>
<div class="prefooter grid-wrapper">
    <div class="grid-center">
        <div class="prefooter__brand" data-scrolly="fromBottom" data-scrolly-root="0 0 0 0">
            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/dist/images/logo-revert.png"
                    alt="Inspirer, Respirer - Argenteuil"></a>
        </div>
        <div class="prefooter__info">
            <div class="prefooter__contact" data-scrolly="fromBottom">
                <p class="contact__title"><?php the_field('footer_contact_title', 'option'); ?></p>
                <p><?php the_field('footer_contact_person', 'option'); ?></p>
                <p><a
                        href="tel:<?php the_field('footer_contact_phone', 'option'); ?>"><?php the_field('footer_contact_phone', 'option'); ?></a>,
                    <?php the_field('footer_contact_phone_post', 'option'); ?></p>
                <p><?php the_field('footer_contact_address', 'option'); ?></p>
                <a
                    href="mailto:<?php the_field('footer_contact_email', 'option'); ?>"><?php the_field('footer_contact_email', 'option'); ?></a>
            </div>

            <div class="prefooter__socials" data-scrolly="fromBottom">
                <nav class="nav-socials">

                    <?php if( have_rows('gbi_global_nav_social', 'option') ): ?>

                    <ul>

                        <?php while( have_rows('gbi_global_nav_social', 'option') ): the_row(); ?>

                        <li><a href="<?php the_sub_field('nav_item_link'); ?>" class="nav-socials__item "><svg
                                    class="icon icon--<?php the_sub_field('nav_item_icon'); ?>">
                                    <use xlink:href="#icon-<?php the_sub_field('nav_item_icon'); ?>"></use>
                                </svg></a></li>
                        <?php endwhile; ?>

                    </ul>

                    <?php endif; ?>
                </nav>
            </div>
        </div>


        <div class="prefooter__links">
            <nav class="nav-links" data-scrolly="fromBottom">
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
        </div>
    </div>
</div>
<footer class="footer grid-wrapper">
    <div class="grid-center" data-scrolly="fromBottom">
        <div class="footer__initiative">
            <p><?php _e("Une initiative de","gbi_inspire"); ?></p>
            <a href="http://argenteuil.qc.ca"><img
                    src="<?php echo get_template_directory_uri() ?>/dist/images/logo-mrc-argenteuil.png"
                    alt="Logo de la MRC Argenteuil"></a>
        </div>
        <div class="footer__partner">
            <p><?php _e("Avec la participation financière du gouvernement du Québec","gbi_inspire"); ?></p>
        </div>
        <div class="footer__copyright">
            <p><?php _e("©2021 Tous droits réservés.","gbi_inspire"); ?></p>
        </div>
    </div>
</footer>

</div><!-- site-container close tag -->
<?php wp_footer(); ?>
</body>

</html>