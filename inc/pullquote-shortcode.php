<?php 

/* FAQ
-------------------------------------------------- */

    // Add Shortcode
    function pullquote_shortcode( $atts , $content = null ) {

        // Attributes
        extract ( shortcode_atts(

            array(

                'class'   => '',
                'type'    => '',
                'align'  => '',
                'text'  => '',
                'id'      => '' 

            ),

            $atts )

        );

            $out .='<div class="pullquote pullquote-align--'.$align.'">';
            $out .='<p>“';
           
            $out .= $text;
            
            $out .='”</p>';
            $out .='</div>';


         return $out;

    }

    add_shortcode( 'pullquote', 'pullquote_shortcode' );