<?php // TEXT & CODE BLOCK

if( get_row_layout() == 'text_code_block' ):

  $textBlock = get_sub_field('text_block_text_code_block');
  $spaceBelow = get_sub_field('text_block_space_below');

  ?>

<?php if($spaceBelow): ?>

<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <?php echo $textBlock ?>

    </div>
  </div>
</div>

<?php else: ?>

<div class="container space-below--md">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <?php echo $textBlock ?>

    </div>
  </div>
</div>

<?php endif; ?>

<?php endif;

?>
