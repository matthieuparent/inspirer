<?php get_header(); ?>



<?php if( have_rows('inspirer_page_content') ): ?>
<?php while( have_rows('inspirer_page_content') ): the_row(); ?>
<?php include( locate_template('partials/sections/'. get_row_layout().'.php', false, false )); ?>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>