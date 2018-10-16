<?php // CODE BLOCK

if( get_row_layout() == 'code_block' ):

  $code_block = get_sub_field('code_block_code_block');

  ?>



<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-12">
      <?php echo $code_block; ?>
    </div>
  </div>
</div>


<?php endif;

?>