<?php // Pricing Table

if( get_row_layout() == 'pricing_table' ):

  $spaceBelow = get_sub_field('pricing_table_space_below');
  $title_1 = get_sub_field('pricing_table_title_1');
  $title_2 = get_sub_field('pricing_table_title_2');

  ?>

    <div class="pricing_table--large container space-below--<?php echo $spaceBelow ?>">
      <div class="row">
        <div class="col-6 offset-1"></div>
        <div class="col-2 d-flex justify-content-center align-items-center"><h6><?php echo $title_1; ?></h6></div>
        <div class="col-2 d-flex justify-content-center align-items-center"><h6><?php echo $title_2; ?></h6></div>
      </div>
      <hr style="border-top:2px solid #000">
  <?php if( have_rows('pricing_table_section_repeater') ): ?>

        <?php while( have_rows('pricing_table_section_repeater') ): the_row();?>

            <?php if( have_rows('rows') ): ?>

            <?php while( have_rows('rows') ): the_row();
                $title = get_sub_field('title');
                $column_1 = get_sub_field('column_1');
                $column_2 = get_sub_field('column_2');
            ?>
            <div class="row">
            <div class="col-6 offset-1"><p><?php echo $title; ?></p></div>
            <div class="col-2 d-flex justify-content-center align-items-center"><?php echo $column_1; ?></div>
            <div class="col-2 d-flex justify-content-center align-items-center"><?php echo $column_2; ?></div>
            </div>

            <?php endwhile; ?>

            <?php endif; ?>
            
              <div class="row">
                  <div class="col-12"><hr></div>
              </div>


        <?php endwhile; ?>

  <?php endif; ?>

    </div>


  <div class="pricing_table--small container space-below--<?php echo $spaceBelow ?>">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center"><h4><?php echo $title_1; ?></h4></div>
  </div>
  <hr style="border-top:2px solid #000">

  
  <div id="accordion">
    <?php if( have_rows('pricing_table_section_repeater') ): ?>
    <?php $count = 0; ?>

    <?php while( have_rows('pricing_table_section_repeater') ): the_row();
        $count += 1;
    ?>
    
        <div  data-toggle="collapse" data-target=".column_1--collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $count; ?>">

        <?php if( have_rows('rows') ): 
                    $count_row = 1;
                    ?>

        <?php while( have_rows('rows') ): the_row();
            $title = get_sub_field('title');
            $column_1 = get_sub_field('column_1');
            $column_2 = get_sub_field('column_2');

        ?>
        <?php if($count_row == 1): ?>
        <div class="row">
          <div class="col-8"><p><b style='text-transform:uppercase;'><?php echo $title; ?></b></p></div>
          <div class="col-4 d-flex justify-content-center align-items-center"><?php echo $column_1; ?></div>
        </div>

        <?php elseif($count_row != 1  && $column_1):?>
        <?php if($title):?>

        <div class="row column_1--collapse<?php echo $count; ?> collapse" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordion">
          <div class="col-8"><p><?php echo $title; ?></p></div>
          <div class="col-4 d-flex justify-content-center align-items-center"><?php echo $column_1; ?></div>
        </div>

        <?php else:?>
        <div class="row">
          <div class="col-12 d-flex justify-content-center align-items-center"><?php echo $column_1; ?></div>
        </div>
        <?php endif; ?>

        <?php endif; ?>

        <?php
              $count_row += 1;
              endwhile; ?>

        <?php endif; ?>
        
          <div class="row">
              <div class="col-12"><hr></div>
          </div>

    </div>
    <?php endwhile; ?>

    <?php endif; ?>
    </div>

  </div>


  <div class="pricing_table--small container space-below--<?php echo $spaceBelow ?>">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center"><h4><?php echo $title_2; ?></h4></div>
  </div>
  <hr style="border-top:2px solid #000">

  
  <div id="accordion">
    <?php if( have_rows('pricing_table_section_repeater') ): ?>
    <?php $count = 0; ?>

    <?php while( have_rows('pricing_table_section_repeater') ): the_row();
        $count += 1;
    ?>
    
        <div  data-toggle="collapse" data-target=".column_2--collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $count; ?>">

        <?php if( have_rows('rows') ): 
                    $count_row = 1;
                    ?>

        <?php while( have_rows('rows') ): the_row();
            $title = get_sub_field('title');
            $column_1 = get_sub_field('column_1');
            $column_2 = get_sub_field('column_2');

        ?>
        <?php if($count_row == 1): ?>
        <div class="row">
          <div class="col-8"><p><b style='text-transform:uppercase;'><?php echo $title; ?></b></p></div>
          <div class="col-4 d-flex justify-content-center align-items-center"><?php echo $column_2; ?></div>
        </div>

        <?php elseif($count_row != 1  && $column_2):?>

          <?php if($title):?>
        <div class="row column_2--collapse<?php echo $count; ?> collapse" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordion">
          <div class="col-8"><p><?php echo $title; ?></p></div>
          <div class="col-4 d-flex justify-content-center align-items-center"><?php echo $column_2; ?></div>
        </div>
        <?php else: ?>
          <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center"><?php echo $column_2; ?></div>
          </div>
          <?php endif; ?>


        <?php endif; ?>

        <?php
              $count_row += 1;
              endwhile; ?>

        <?php endif; ?>
        
          <div class="row">
              <div class="col-12"><hr></div>
          </div>

    </div>
    <?php endwhile; ?>

    <?php endif; ?>
    </div>

  </div>


  <?php endif;

  ?>
