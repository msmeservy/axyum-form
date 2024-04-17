<?php

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

if(isset($_POST['axyumContactSubmit']) && $_POST['axyumContactSubmit'] == "1")
{
	/* GET INFO FROM THE POST SUBMIT */
	$name = sanitize_text_field($_POST['name']);
	$last = sanitize_text_field($_POST['last']);
	$email = sanitize_email($_POST['email']);
	$phone = sanitize_text_field($_POST['phone']);
	$comments = sanitize_textarea_field($_POST['comments']);
	
	
	/* WRITE EMAIL INFORMATION FOR SENDING TO ADMIN */
	
	$to = get_bloginfo('admin_email');
	$subject = get_bloginfo( 'name' );	
	$subject .= ' Contact Form Submission';	
	$message = '';
	
	$message .= 'Name: '.$name;
	$message .=  PHP_EOL;
	$message .= 'Email: '.$email;
	$message .=  PHP_EOL;
	$message .= 'Phone: '.$phone;
	$message .=  PHP_EOL;
	
	$comments = wpautop($comments);
	$message .=  PHP_EOL;
	$comments = str_replace("<p>", "", $comments);
	$comments = str_replace("</p>", "", $comments);
	$comments = str_replace("<br />", "", $comments);
	
	$message .= 'Comments: ';
	$message .=  PHP_EOL;
	$message .= $comments;
	
	wp_mail($to,$subject,$message);
	
	/*RETURN SOMETHING FOR THE USER */
	$return = [];
	$return['success'] = 1;
	$return['message'] = 'Thank you for contacting us!  Your information has been received.';
	
	/*if(isset($_POST['last']) && $_POST['last'] != "") {
		die();
	} else {
		echo json_encode($return);
	}*/
	echo json_encode($return);
	
}

?>