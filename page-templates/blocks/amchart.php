<?php // AMCHART

if( get_row_layout() == 'amchart' ):

  $map = get_sub_field('amchart');

  ?>

  <?php echo do_shortcode(" $map "); ?>


<?php endif;

?>
