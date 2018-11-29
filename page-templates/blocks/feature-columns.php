<?php // FEATURE COLUMNS

if( get_row_layout() == 'feature_columns' ):

  $spaceBelow = get_sub_field('feature_columns_space_below');
  $type = get_sub_field('feature_columns_type');
  $columns = get_sub_field('feature_columns_size');
  $centered = get_sub_field('feature_columns_centered');
  $sideIcon = get_sub_field('feature_columns_sideicon');
  $card = get_sub_field('feature_columns_card');

?>


  <?php if( have_rows('feature_columns_column') ): ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-center">
        <?php while( have_rows('feature_columns_column') ): the_row();

          $text = get_sub_field('text_block');
          $image = get_sub_field('image');
          $icon = get_sub_field('icon');
          $faicon = get_sub_field('fontawesome_icon');

        ?>

          <div class="col-md-6 col-lg<?php if ( $columns == '3' ): ?>-<?php endif; ?><?php if ( $columns == '6' ): ?>-<?php endif; ?><?php if ( $columns == '4' ): ?>-<?php endif; ?><?php echo $columns; ?> feature-column <?php if($sideIcon == 'yes'): ?>feature-column--side-icon<?php endif; ?> <?php if( $centered == 'yes' ): ?>feature-column--centered<?php endif; ?> ">
          <div class="<?php if($card == 'yes'): ?>feature-card<?php endif; ?>">

              <?php if( $type == 'image' ):
                if( !empty($image) ):

                  // vars
                  $url = $image['url'];
                  $alt = $image['alt'];

                  $size = '600x400';
                  $thumb = $image['sizes'][ $size ];
                  $width = $image['sizes'][ $size . '-width' ];
                  $height = $image['sizes'][ $size . '-height' ];

                  ?>
                  <img class="feature-column__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  <?php if( $boxed == 'yes' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>

              <?php if( $type == 'fa' ):?>
              <div class="feature-column__fa-icon">
                      <?php echo $faicon; ?>
                      </div>
              <?php endif; ?>

              <?php if( $type == 'icon' ):if( !empty($icon) ):

                // vars
                $url = $icon['url'];
                $alt = $icon['alt'];

                ?>
                <div class="feature-column__icon--container">
                  <img class="feature-column__icon" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                </div>
                  <?php endif; ?>
              <?php endif; ?>


                <div class="feature-column__text"><?php echo $text ?></div>

                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>


              </div>
            </div>

    <?php endwhile; ?>
              </div>
              </div>

  <?php endif; ?>

<?php endif; ?>
