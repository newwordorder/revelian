<?php // 50 50 SPLIT BLOCK

if( get_row_layout() == '50_50' ):

$text = get_sub_field('50_50_text_block');
$background = get_sub_field('50_50_block_background');
$image = get_sub_field('50_50_image');
$flipLayout = get_sub_field('50_50_flip_layout');


?>

<div class="imageblock switchable <?php if( !($flipLayout) == 'yes' ): echo 'switchable--switch'; endif; ?>">

  <div class="imageblock__content col-md-6 pos-right">
      <div class="background-image-holder" style="background-image:url('<?php echo $image['url']; ?>')">
        <?php

        if( !empty($image) ):

          // vars
          $url = $image['url'];
          $alt = $image['alt'];

         ?>
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
        <?php endif; ?>
      </div>
  </div>
  <div class="container">
      <div class="row <?php if( $flipLayout == 'yes' ): echo 'justify-content-end'; endif; ?>">
          <div class="col-md-5">
              <?php echo $text ?>
              <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
          </div>
      </div>
  </div>
</div>

<?php endif;

?>
