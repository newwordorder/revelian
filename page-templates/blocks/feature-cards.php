<?php // FEATURE CARDS

if( get_row_layout() == 'feature_cards' ):

  $spaceBelow = get_sub_field('feature_cards_space_below');
  $type = get_sub_field('feature_cards_type');
  
  ?>


  <?php if( have_rows('feature_cards_column') ): ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-center">
        <?php while( have_rows('feature_cards_column') ): the_row();
          $text = get_sub_field('text_block');
          $image = get_sub_field('image');
          $icon = get_sub_field('icon');
        ?>
          <div class="col-sm-4">
            <div class="feature-card">
            <?php if( $type == 'image' ):
              if( !empty($image) ):

                // vars
                $url = $image['url'];
                $alt = $image['alt'];

               ?>
                <img class="rounded feature-card__image" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
              <?php endif; ?>
            <?php endif; ?>
            <?php if( $type == 'icon' ):if( !empty($icon) ):
              // vars
              $url = $icon['url'];
              $alt = $icon['alt'];
             ?>
            <div class="feature-card__icon--container">
              <img class="feature-card__icon" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
            </div>
              <?php endif; ?>
            <?php endif; ?>

            <?php echo $text ?>

            <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
          </div>
            </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php endif;

  ?>
