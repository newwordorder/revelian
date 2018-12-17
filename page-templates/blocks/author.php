<?php // Author Block

if( get_row_layout() == 'author' ):

$spaceBelow = get_sub_field('author_space_below');
$intro_blurb = get_sub_field('author_intro_blurb');
$image = get_sub_field('author_image');
$blurb = get_sub_field('author_blurb');
$url = get_sub_field('author_url');


  ?>


    <div class="container space-below--<?php echo $spaceBelow ?>">
        <div class="row justify-content-center">
        <div class="col-sm-10 author">
        <div class="author__introblurb"><p><?php echo $intro_blurb; ?></p></div>

        <div class="row">
            <div class="col-lg-4">
                <div style="position:relative; min-height:240px;" class=" d-flex justify-content-center align-items-center">
                <div class="author__image" >
                    <?php

                    if( !empty($image) ):

                        // vars
                        $url = $image['url'];
                        $alt = $image['alt'];

                    ?>

                    <div class="background-image-holder" style="background-image:url('<?php echo $url; ?>')">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    </div>
                    <?php endif; ?>

                    </div>
                    </div>
            </div>
                <div class="col-lg-8 d-flex justify-content-center flex-column">
                    <?php echo $blurb ?>
                    <a href="<?php echo $url; ?>" class="author__link"><i class="fab fa-linkedin"></i> LINKEDIN</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>


  <?php endif;

  ?>
