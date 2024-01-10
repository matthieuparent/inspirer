<?php
/*
Template Name: Page emploi
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="hero__media" data-scrolly="fromAlpha">
        <?php
             $image = get_field('inspirer_job_hero_media');
        ?>
        <?php if( !empty( $image ) ): ?>
        <div class="image"><img src="<?php echo esc_url($image['url']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="hero__content" data-scrolly="fromBottom">
        <h1><?php the_field("inspirer_job_hero_title"); ?></h1>
    </div>
</section>
<?php 
                $args = array(
                    'post_type' => 'gbi_jobs',
                    'posts_per_page'=>-1,
                );
                $the_query = new WP_Query( $args ); 
                $count = $the_query->found_posts;
                ?>
<section class="section b-job sections--colors-section-marine section--fig grid-wrapper">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-arrow"></use>
            </svg>
            <div class="title__content">
                <h3><?php the_field("inspirer_job_title"); ?></h3>
                <p class="title__sub"><?php the_field("inspirer_job_subtitle"); ?></p>
            </div>
        </div>
        <div class="section__controls">
            <p class="b-job__total" data-count="<?php _e("{xx} offre{s} correspondante{s}","gbi_inspire"); ?>">
                <?php echo $count; ?> offres
                correspondantes</p>
            <form action="#" data-component="Filters">
                <p>Trier par</p>
                <div class="input select">
                    <select class="input__element" name="sector" id="sector" required placeholder="lorem"
                        data-filter="sector">
                        <option value="" hidden selected disabled>Secteur d’emploi</option>
                        <option value="all">Toutes les catégories</option>
                        <option value="achat">Achats et logistique d’approvisionnement</option>
                        <option value="admin">Administration et gestion</option>
                        <option value="aero">Aérospatial</option>
                        <option value="agriculture">Agriculture et agroalimentaire</option>
                        <option value="amenagement">Aménagement et urbanisme</option>
                        <option value="arts">Arts, culture, cinéma et muséologie</option>
                        <option value="autre">Autre</option>
                        <option value="batiment">Bâtiment et travaux publics</option>
                        <option value="cadre">Cadres supérieurs / Haute direction</option>
                        <option value="commerce">Commerce de détail</option>
                        <option value="comptabilite">Comptabilité, finances et assurances</option>
                        <option value="construction">Construction</option>
                        <option value="design">Design et création</option>
                        <option value="droit">Droit et services juridiques</option>
                        <option value="education">Éducation</option>
                        <option value="electronique">Électronique et électricité</option>
                        <option value="environnement">Environnement, ressources naturelles et développement durable
                        </option>
                        <option value="evenementiel">Événementiel</option>
                        <option value="forest">Foresterie</option>
                        <option value="hotel">Hôtellerie et restauration</option>
                        <option value="immo">Immobilier</option>
                        <option value="ingenerie">Ingénierie, développement de produits et architecture</option>
                        <option value="manutention">Manutention et entreposage</option>
                        <option value="marketing">Marketing, communication et médias</option>
                        <option value="mecanique">Mécanique et entretien</option>
                        <option value="prod">Production et métiers - secteur manufacturier</option>
                        <option value="public">Public (municipal, gouvernemental)</option>
                        <option value="relation">Relations publiques</option>
                        <option value="rh">Ressources humaines</option>
                        <option value="sante">Santé et services sociaux</option>
                        <option value="sante-securite">Santé sécurité du travail</option>
                        <option value="pharma">Sciences et pharmaceutique-bio</option>
                        <option value="securite">Sécurité et protection du public</option>
                        <option value="services-client">Services client et ventes</option>
                        <option value="soutien">Soutien administratif</option>
                        <option value="stage">Stages et emplois étudiant</option>
                        <option value="techno-info">Technologies de l’information
                        <option value="tourisme">Tourisme et loisirs</option>
                        <option value="vehicule">Transport</option>
                        <option value="vente">Vente, achat et service à la clientèle</option>

                    </select>
                    <svg class="icon">
                        <use xlink:href="#icon-chevron-down"></use>
                    </svg>
                </div>
                <div class="input select">
                    <select class="input__element" name="muni" id="muni" required placeholder="lorem"
                        data-filter="location">
                        <option value="" hidden selected disabled>Municipalité</option>
                        <option value="all">Tous</option>
                        <?php if ( $the_query->have_posts() ) :$unique_cities = array(); ?>

                        <!-- the loop -->
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                            $location = get_field('gbi_enterprise_address')['city'];
                            ?>
                        <?php if( ! in_array( $location, $unique_cities ) ) :
                                // add city to array so it doesn't repeat
                                $unique_cities[] = $location; ?>
                        <option value="<?php echo sanitize_title($location); ?>"><?php echo $location ?></option>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                    <svg class="icon">
                        <use xlink:href="#icon-chevron-down"></use>
                    </svg>
                </div>
            </form>
        </div>
        <div class="grid grid-4">
            <?php if ( $the_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $location = get_field('gbi_enterprise_address');
                     ?>
            <?php
                    $field = get_field( 'gbi_job_sector' );
                    ?>
            <a href="<?php echo esc_url( the_permalink() ); ?>" class="posting" data-filter-element
                data-filter-sector="<?php echo $field['value']; ?>"
                data-filter-location="<?php echo sanitize_title($location["city"]); ?>" data-scrolly="fromBottom">
                <div class="posting__content">
                    <p class="posting__location">
                        <svg class="icon">
                            <use xlink:href="#icon-marker"></use>
                        </svg>
                        <?php echo  $location["city"]; ?>
                    </p>
                    <h6><?php the_field('gbi_job_title');?></h6>
                    <p class="posting__enterprise"><?php the_field('gbi_job_enterprise');?></p>
                    <button class="link link--arrow">
                        <?php _e("Voir l'offre","gbi_inspire"); ?>
                        <svg class="icon">
                            <use xlink:href="#icon-arrow"></use>
                        </svg>
                    </button>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
        <div class="grid job__submit">
            <?php   $link = get_field('inspirer_job_detail_submit', 'option');
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo $link['title'] ?>
                <svg class="icon">
                    <use xlink:href="#icon-arrow"></use>
                </svg></a>
        </div>
        <!-- end of the loop -->
        <!--nav class="pagination">
            <?php 
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                   'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                   'format' => '?paged=%#%',
                   'current' => max( 1, get_query_var('paged') ),
                   'total' => $the_query->max_num_pages,
                   'prev_next' => false,
               ) );
                ?>
        </nav-->
        <!-- pagination here-->

        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


    </div>
</section>


<?php get_footer(); ?>