<?php // TESTIMONIALS

if( get_row_layout() == 'testimonials' ):

  $spaceBelow = get_sub_field('testimonials_space_below');
  ?>

   <div class="container text-center space-below--<?php echo $spaceBelow ?>">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10 align-self-center">
                <div class="slider" data-paging="true">
                    <ul class="slides">
                    <?php while( have_rows('testimonials_slides') ): the_row();

                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    ?>    
                        <li>
                            <div class="testimonial">
                            <svg width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
                                <title>Quote icon</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Product" transform="translate(-690.000000, -3203.000000)">
                                        <g id="Testimony" transform="translate(0.000000, 3081.000000)">
                                            <g id="Quote-icon" transform="translate(691.000000, 123.000000)">
                                                <circle id="Oval-3" stroke="#EA0029" cx="29" cy="29" r="29"></circle>
                                                <path d="M23.1120168,36.6671435 C21.3168999,36.6671435 20.0244158,35.3028547 20.0244158,33.4359332 C20.0244158,30.5637462 21.3887046,28.4814107 27.4202972,22.0189901 L27.7793205,22.0189901 L28.9281953,23.0242555 L28.9281953,23.3832789 C26.6304458,26.0400518 25.481571,27.6915593 24.3326962,29.9175042 C25.696985,29.9175042 26.9176645,31.281793 26.9176645,33.0051051 C26.9176645,34.9438313 25.266157,36.6671435 23.1120168,36.6671435 Z M32.6620384,36.6671435 C30.9387262,36.6671435 29.6462421,35.3028547 29.6462421,33.4359332 C29.6462421,30.5637462 31.0105309,28.4814107 37.0421235,22.0189901 L37.4011468,22.0189901 L38.4782169,23.0242555 L38.4782169,23.3832789 C36.1804674,26.0400518 35.0315926,27.6915593 33.9545225,29.9175042 C35.3188113,29.9175042 36.4676861,31.281793 36.4676861,33.0051051 C36.4676861,34.9438313 34.8879832,36.6671435 32.6620384,36.6671435 Z" id="“" fill="#EA0029"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                                <blockquote>
                                   <?php echo $text; ?>
                                </blockquote>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>

<?php endif;
?>

  