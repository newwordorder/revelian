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
                        <div style="
                            background-image:url('<?php echo $image['url']; ?>');    
                            width: 180px;
                            height: 180px;
                            background-size: cover;
                            background-position: center;
                            border-radius:50%;
                            " alt="<?php echo $image['alt']; ?>" ></div>
                    </div>
            </div>
                <div class="col-lg-8 d-flex justify-content-center flex-column">
                    <?php echo $blurb ?>
                    <a href="<?php echo $url; ?>" class="author__link d-flex align-items-center"><i class="fab fa-linkedin"></i>LINKEDIN</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>


  <?php endif;

  ?>
