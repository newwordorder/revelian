<?php // FEATURE COLUMNS

if( get_row_layout() == 'feature_columns' ):

  $spaceBelow = get_sub_field('feature_columns_space_below');
  $type = get_sub_field('feature_columns_type');
  $columns = get_sub_field('feature_columns_size');
  $boxed = get_sub_field('feature_columns_boxed');
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

        ?>

        <?php if($sideIcon): ?>
          <div class="col-md-<?php echo $columns; ?> feature-column sideIcon space-below--<?php echo $spaceBelow ?>">

            <div class=" row <?php if( $boxed == 'yes' ): ?>feature-column--boxed<?php endif; ?> <?php if( $centered == 'yes' ): ?>text-center<?php endif; ?>">

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

              <?php if( $type == 'icon' ):if( !empty($icon) ):

                // vars
                $url = $icon['url'];
                $alt = $icon['alt'];

                ?>
                <?php if( $boxed == 'yes' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>
                <div class="col-md-2 feature-column__icon--container">
                  <img class="feature-column__icon" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                </div>
                  <?php endif; ?>
              <?php endif; ?>

              <?php if( $boxed == 'yes' && $type == 'none' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>

                <div class="col-md-10"><?php echo $text ?></div>

                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>

                <?php if( $boxed == 'yes' ): ?></div><?php endif; ?>

              </div>
            </div>

        <?php else: ?> 
          <?php if($card): ?>
          <div class="col-lg-<?php echo $columns; ?>  space-below--<?php echo $spaceBelow ?>">
            <div class="feature-card"> 
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
                  <img class="feature-card__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  <?php if( $boxed == 'yes' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>

              <?php if( $type == 'icon' ):if( !empty($icon) ):

                // vars
                $url = $icon['url'];
                $alt = $icon['alt'];

                ?>
                <?php if( $boxed == 'yes' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>
                <div class="feature-card__icon--container">
                  <img class="feature-card__icon" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                </div>
                  <?php endif; ?>
              <?php endif; ?>

              <?php if( $boxed == 'yes' && $type == 'none' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>

                <?php echo $text ?>

                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>

                <?php if( $boxed == 'yes' ): ?></div><?php endif; ?>

              </div>
              </div>

              <?php else: ?>
                <div class="col-md-<?php echo $columns; ?> feature-column space-below--<?php echo $spaceBelow ?>">

                  <div class="<?php if( $boxed == 'yes' ): ?>feature-column--boxed<?php endif; ?> <?php if( $centered == 'yes' ): ?>text-center<?php endif; ?>">

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

                    <?php if( $type == 'icon' ):if( !empty($icon) ):

                      // vars
                      $url = $icon['url'];
                      $alt = $icon['alt'];

                      ?>
                      <?php if( $boxed == 'yes' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>
                      <div class="feature-column__icon--container">
                        <img class="feature-column__icon" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                      </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if( $boxed == 'yes' && $type == 'none' ): ?><div class="feature-column--boxed__inner"><?php endif; ?>

                      <?php echo $text ?>

                      <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>

                      <?php if( $boxed == 'yes' ): ?></div><?php endif; ?>

                    </div>
                  </div>
            
              <?php endif;?>

          <?php endif;?>
    <?php endwhile; ?>

  <?php endif; ?>

<?php endif; ?>
