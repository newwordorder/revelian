<?php 

/* FAQ
-------------------------------------------------- */

    // Add Shortcode
    function faq_shortcode( $atts , $content = null ) {

        // Attributes
        extract ( shortcode_atts(

            array(

                'class'   => '',
                'type'    => '',
                'question'=> '',
                'id'      => '' 

            ),

            $atts )

        );

            $out .='<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
            $out .='<div class="panel panel-default">';
            $out .='<div class="panel-heading" role="tab" id="headingOne">';
            $out .='<h5 class="panel-title">';
            $out .='<a role="button" data-toggle="collapse" data-parent="#accordion" href="#'. $id .'" aria-expanded="true" aria-controls="collapseOne" class="collapsed">';
            $out .='<i class="fal fa-plus js-rotate-if-collapsed"></i>';
            $out .= $question;
            $out .='</a>';
            $out .='</h5>';
            $out .='</div>';
            $out .='<div id="'. $id .'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
            $out .='<div class="panel-body">'; 
            $out .= do_shortcode($content) ;
            $out .='</div>';
            $out .='</div>';
            $out .='</div>';


         return $out;

    }

    add_shortcode( 'faq', 'faq_shortcode' );