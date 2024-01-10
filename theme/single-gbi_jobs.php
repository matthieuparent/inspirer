<?php get_header(); ?>
<?php $location = get_field('gbi_enterprise_address'); ?>
<section class="section job-detail sections--colors-section-green grid-wrapper--large" data-scrolly="fromAlpha">
    <div class="grid-center job-detail__options">
        <?php   $link = get_field('inspirer_job_detail_back', 'option');
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="back" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <svg class="icon icon--reverse">
                <use xlink:href="#icon-arrow"></use>
            </svg><?php echo $link['title'] ?></a>
    </div>
    <div class="grid-center">
        <header>
            <h1><?php the_field('gbi_job_title') ?></h1>
        </header>
        <section class="job-detail__description grid grid-2">
            <div class="description__company">
                <h2><?php the_field('gbi_job_enterprise') ?></h2>
                <address>
                    <svg class="icon">
                        <use xlink:href="#icon-marker"></use>
                    </svg>
                    <div class="company__address">
                        <p><?php echo $location["street_number"] . " " . $location["street_name"]; ?></p>
                        <p><?php echo $location["city"] . "," . $location["state"]; ?></p>
                        <p><?php echo $location["post_code"] ; ?></p>
                    </div>
                </address>
                <?php if( get_field('gbi_contact_website') ): ?>
                <div class="company__website">
                    <svg class="icon">
                        <use xlink:href="#icon-marker"></use>
                    </svg>
                    <a href="<?php the_field('gbi_contact_website') ?>"
                        target="_blank"><?php the_field('gbi_contact_website') ?></a>
                </div>
                <?php endif; ?>
            </div>
            <div class="description__job">
                <ul>
                    <?php if( get_field('gbi_job_sector') ): ?>
                    <?php
                    $field = get_field( 'gbi_job_sector' );
                    ?>
                    <li>
                        <p><?php _e("Secteur d'emploi","gbi_inspire"); ?></p>
                        <p><?php echo $field["label"]; ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('gbi_job_hours') ): ?>
                    <li>
                        <p><?php _e("Horaire","gbi_inspire"); ?></p>
                        <p><?php echo the_field('gbi_job_hours') ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('gbi_job_statuts') ): ?>
                    <li>
                        <p><?php _e("Statut","gbi_inspire"); ?></p>
                        <p><?php echo the_field('gbi_job_statuts') ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('gbi_job_posting_start') ): ?>
                    <li>
                        <p><?php _e("Entrée en fonction","gbi_inspire"); ?></p>
                        <p><?php echo the_field('gbi_job_posting_start') ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if( get_field('gbi_job_posting_end') ): ?>
                    <li>
                        <p><?php _e("Fin du concours","gbi_inspire"); ?></p>
                        <p><?php echo the_field('gbi_job_posting_end') ?></p>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php $file = get_field('gbi_job_pdf'); if( $file ): ?>
                <a href="<?php echo $file['url']; ?>" target="_blank">
                    <svg class="icon">
                        <use xlink:href="#icon-download"></use>
                    </svg>
                    <?php _e("Voir l'offre","gbi_inspire"); ?>
                </a>
                <?php endif; ?>
            </div>
        </section>
        <section class="job-detail__info">
            <?php if( get_field('gbi_enterprise_about') ): ?>
            <h3><?php _e("L’entreprise","gbi_inspire"); ?></h3>
            <?php the_field('gbi_enterprise_about'); ?>
            <?php endif; ?>
            <?php if( get_field('gbi_job_description') ): ?>
            <h3><?php _e("Description du poste","gbi_inspire"); ?></h3>
            <?php the_field('gbi_job_description'); ?>
            <?php endif; ?>
            <?php if( get_field('gbi_job_requirement_aptitude') ): ?>
            <h3><?php _e("Profil et compétences recherchées","gbi_inspire"); ?></h3>
            <?php the_field('gbi_job_requirement_aptitude'); ?>
            <?php endif; ?>
            <?php if( get_field('gbi_job_advantages') ): ?>
            <h3><?php _e("Conditions","gbi_inspire"); ?></h3>
            <?php the_field('gbi_job_advantages'); ?>
            <?php endif; ?>
            <?php if( get_field('gbi_job_salary') || get_field('gbi_job_quantity') || get_field('gbi_job_requirement_languages')): ?>
            <h3><?php _e("Autres informations","gbi_inspire"); ?></h3>
            <ul class="list__others">
                <?php if( get_field('gbi_job_salary') ): ?>
                <li><span><?php _e("Salaire offert :","gbi_inspire"); ?> </span><span>
                        <?php the_field('gbi_job_salary'); ?></span></li>
                <?php endif; ?>
                <?php if( get_field('gbi_job_quantity') ): ?>
                <li><span><?php _e("Nombre de poste à combler :","gbi_inspire"); ?> </span><span>
                        <?php the_field('gbi_job_quantity'); ?></span></li>
                <?php endif; ?>
                <?php if( get_field('gbi_job_requirement_languages') ): ?>
                <li><span><?php _e("Langues demandées (parlées et écrites) :","gbi_inspire"); ?>
                    </span><span> <?php the_field('gbi_job_requirement_languages'); ?></span></li>
                <?php endif; ?>
            </ul>

            <?php endif; ?>
            <h3><?php _e("Pour postuler","gbi_inspire"); ?></h3>
            <?php if( get_field('gbi_job_notes') ): ?>
            <p><?php the_field('gbi_job_notes'); ?></p>
            <?php endif; ?>
            <?php if( get_field('gbi_contact_email') ): ?>
            <a href="mailto:<?php the_field('gbi_contact_email'); ?>">
                <svg class="icon">
                    <use xlink:href="#icon-arrow"></use>
                </svg>
                <?php the_field('gbi_contact_email'); ?></a>
            <?php endif; ?>
            <h3><?php _e("Partagez cette offre","gbi_inspire"); ?></h3>
            <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
    ADDTOANY_SHARE_SAVE_KIT( array( 
        'buttons' => array( 'facebook', 'twitter', 'email', 'linkedin' ),
    ) );
} ?>
        </section>
    </div>
</section>

<?php get_footer(); ?>