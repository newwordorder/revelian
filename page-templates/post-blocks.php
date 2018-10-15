<?php

// check if the repeater field has rows of data
if( have_rows('posts_blocks') ) {

  echo '<section>';

  // loop through the rows of data
  while ( have_rows('posts_blocks') ) { the_row();

      // loop through the rows of data
         get_template_part( 'page-templates/blocks/text-block' );
         get_template_part( 'page-templates/blocks/50-50' );
         get_template_part( 'page-templates/blocks/text-image' );
         get_template_part( 'page-templates/blocks/cta' );
         get_template_part( 'page-templates/blocks/image' );
         get_template_part( 'page-templates/blocks/feature-columns' );
         get_template_part( 'page-templates/blocks/feature-cards' );
         get_template_part( 'page-templates/blocks/line-break' );
         get_template_part( 'page-templates/blocks/projects' );
         get_template_part( 'page-templates/blocks/feature' );
         get_template_part( 'page-templates/blocks/testimonials' );
         get_template_part( 'page-templates/blocks/video' );
         get_template_part('page-templates/blocks/image-split');
         get_template_part('page-templates/blocks/text-code-block');

  }

  echo '</section>';

}

?>

<?php get_footer();
