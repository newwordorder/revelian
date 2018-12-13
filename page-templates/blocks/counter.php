<?php // COUNTER

if( get_row_layout() == 'counter' ):

  $spaceBelow = get_sub_field('space_below');

  ?>
<?php if( have_rows('column') ): ?>
<div class="container space-below--<?php echo $spaceBelow ?>">
<div class="row justify-content-center">
<div class="col-md-10">
  <div class="row justify-content-center" id="counter">
<?php while( have_rows('column') ): the_row(); 

    $textBlock = get_sub_field('text_block');
    $preCharacter = get_sub_field('pre_character');

    $number = get_sub_field('number');
    $followingCharacter = get_sub_field('following_character');

?>



    <div class="col-md-6 counter__wrapper">
    <div class="counter my-5"><?php echo $preCharacter ?><span class="counter__number" data-count="<?php echo $number ?>">0</span><?php echo $followingCharacter ?></div>

        <div class="counter__text">
        <?php echo $textBlock ?>
        </div>

    </div>
  

<?php endwhile; ?>
      </div>
    </div>
    </div>
    </div>
  <?php endif; ?>


<?php endif;

?>
