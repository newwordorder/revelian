<?php // TEXT & CODE BLOCK

if( get_row_layout() == 'text_code' ):

$text = get_sub_field('text_block');

$code = get_sub_field('code_block');

$spaceBelow = get_sub_field('space_below');

?>

  <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row">
          <div class="col-md-6">
              <?php echo $text ?>
              <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
          </div>
          <div class="col-md-6">
            <?php echo $code ?>
          </div>
      </div>
    </div>

<?php endif; //end text_code row

?>
