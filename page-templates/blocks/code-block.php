<?php // CODE BLOCK

if( get_row_layout() == 'code_block' ):

  $code_block = get_sub_field('code_block_code_block');
  $width = get_sub_field('code_block_width');

  ?>


<?php if( $width == 'contained' ):?>
<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-12">
      <?php echo $code_block; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if( $width == 'full-width' ):?>
<div class="space-below--<?php echo $spaceBelow ?>">

      <?php echo $code_block; ?>
    
</div>
<?php endif; ?>

<?php endif;

?>