<?php 
/**
* Plugin Name: Axyum Contact Form
* Description: This form submits through an Ajax call
* Author: Mike Meservy
**/


/**
MY LIST OF ITEMS

1. write the forms code as a shortcode
2. write the process page that it submits to
3. write the javascript / ajax that will take the submission
4. write email send function

**/

function axyum_contact_form()
{
	/* string variable to hold content */
	$content * ''; /*creat string*/
	
	//$content .= '<form method="post" action="">';
	$content .= '<div class="axyumForm">';
	
	$content .= '<div class="row ohnohoney"><div class="col-12 ohnohoney"><div class="md-form mb-0 mt-0 ohnohoney">';
	$content .= '<label for="your_last">Last:</label>';
	$content .= '<input class="form-control ohnohoney" type="text" name="your_last" id="your_last" />';
	$content .= '</div></div></div>'; 
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0 mt-0">';
	$content .= '<label for="your_name">Name:</label>';
	$content .= '<input class="form-control" type="text" name="your_name" id="your_name" />';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label for="your_email">Email:</label>';
	$content .= '<input class="form-control" type="email" name="your_email" id="your_email"  />';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label for="phone_number">Phone:</label>';
	$content .= '<input class="form-control"  type="text" name="phone_number" id="phone_number"  />';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row tx-row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<label class="pt" for="your_comments">Message:</label>';
	$content .= '<textarea type="text" class=""  name="your_comments" rows="2" id="your_comments"></textarea>';
	$content .= '</div></div></div>';
	
	$content .= '<div class="row"><div class="col-12"><div class="md-form mb-0">';
	$content .= '<input type="submit"  class="main-btn transition" name="axyum_submit" id="axyum_submit" onclick="submit_axyum_form()" value="Submit"/>';
	$content .= '</div></div></div>';
	
	$content .= '<div id="response_div"></div>';
	$content .= '</div>';
		
	//$content .= '</form>';
		
	return $content;
}
add_shortcode('axyum_form', 'axyum_contact_form');


add_action('init', 'register_script');
function register_script() {
   
    wp_register_style( 'style', plugins_url('/css/style.css', __FILE__), false, '1.0.0', 'all');
   
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
  

   wp_enqueue_style( 'style' );
  
}

add_action( 'admin_print_styles', 'utm_user_scripts' );


function axyum_contact_addjs() 
{
	?>
	<script src="/wp-content/plugins/axyum-form/js/axyum-contact.js"></script>
	<?php
	
}
add_action('wp_footer', 'axyum_contact_addjs');
	
?>