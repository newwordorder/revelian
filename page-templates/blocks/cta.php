<?php // TEXT & IMAGE BLOCK

if( get_row_layout() == 'cta' ):

$text = get_sub_field('text_block');

$spaceBelow = get_sub_field('text_image_space_below');

$layout = get_sub_field('layout');

?>
    <?php if($layout == "horizontal"): ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
        <div class="row align-items-center">
            <div class="col-md-8 cta__text">
                <?php echo $text ?>
            </div>
            <div class="col-md-4 cta__buttons">
                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>
        </div>
        </div>
    <?php elseif($layout == "vertical"): ?>
        <div class="container space-below--<?php echo $spaceBelow ?>">
            <div class="row justify-content-center">
                <div class="col-md-8 cta__text">
                    <?php echo $text ?>

                </div>
                <div class="col-md-8 cta__buttons text-center">
                    <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
                </div>
            </div>
        </div>
    <?php endif;?>

<?php endif;

?>
