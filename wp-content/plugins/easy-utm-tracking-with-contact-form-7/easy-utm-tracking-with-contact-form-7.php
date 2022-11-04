<?php
/**
 * Plugin Name: Easy UTM tracking with contact form 7 
 * Plugin URI: http://decorumsol.com
 * Description: This plugin adds UTM tracking code to your contact form 7 based on js cookies.
 * Version: 2.0.4
 * Author: Aureate
 * Author URI: http://basirmukhtar.com
 */

 
 /**
 * adding script to catch utm and store them to cookies
 */

    function easy_utm_enqueue_script(){
        wp_enqueue_script('utm_contact_form7_scripts', plugin_dir_url(__FILE__) . 'js/ucf7_scripts.js',  array(), 'version', true);    
    }
    add_action( 'wp_enqueue_scripts', 'easy_utm_enqueue_script' );

	
	add_action('wpcf7_before_send_mail', 'wpcf7_update_email_body');

	function wpcf7_update_email_body($contact_form) {
	  $submission = WPCF7_Submission::get_instance();
	  if ( $submission ) {
		//getting utm variables from js cookie.
		$cookies = $_COOKIE['_deco_utmz'];		
		$all_utm = explode("|", $cookies);
		if( count($all_utm) > 0){
			foreach($all_utm as $val){
				$arr = explode("=", $val);
				$newarr[$arr[0]] = $arr[1];
			}
		}
		
        $url = $_COOKIE['_deco_utmurl'];
        $referrer = $_COOKIE['_deco_utm_referrer'];
        
		$email_utm = '';
		if(isset($newarr)){
		
			/*$email_utm .= '<style type="text/css">tr:nth-child(even) { background-color: #eff0f1; }</style><table cellpadding="10" border="1" style="border-collapse:collapse; width:50%;">';
            
			$email_utm .= '<tr style="background-color: #eff0f1;"><td><strong>UTM Parameter:</strong></td><td><strong>Value</strong></td></tr>';
			$email_utm .= '<tr><td>utm_source:</td><td>'. $all_utm[0] .'</td></tr>';
			$email_utm .= '<tr style="background-color: #eff0f1;"><td>utm_medium:</td><td>'. $all_utm[1] .'</td></tr>';
			$email_utm .= '<tr><td>utm_term:</td><td>'. $all_utm[2] .'</td></tr>';
			//$email_utm .= '<tr style="background-color: #eff0f1;"><td>utm_content:</td><td>'. $all_utm[4] .'</td></tr>';
			$email_utm .= '<tr><td>utm_campaign: </td><td>'. $all_utm[3] .'</td></tr>';
           // $email_utm .= '<tr style="background-color: #eff0f1;"><td>Landing page URL: </td><td>' . $url .'</td></tr>';
            //$email_utm .= '<tr style=""><td>Page Referrer: </td><td>' . $referrer .'</td></tr>';
			$email_utm .='</table>';*/
			//$email_utm .= '<br>';			
			if($newarr['utm_source'] != '' && $newarr['utm_source'] != "false"){
				$email_utm .= '<span><b>utm_source: </b>'.$newarr["utm_source"].'</span> | ';
			}
			if($newarr['utm_medium'] != '' && $newarr['utm_medium'] != "false"){
				$email_utm .= '<span><b>utm_medium: </b>'.$newarr["utm_medium"].'</span> | ';
			}
			if($newarr['utm_term'] != '' && $newarr['utm_term'] != "false"){
				$email_utm .= '<span><b>utm_term: </b>'.$newarr["utm_term"].'</span> | ';
			}
			if($newarr['utm_campaign'] != '' && $newarr['utm_campaign'] != "false"){
				$email_utm .= '<span><b>utm_campaign: </b>'.$newarr["utm_campaign"].'</span> | ';
			}
			if($newarr['utm_content'] != '' && $newarr['utm_content'] != "false"){
				$email_utm .= '<span><b>utm_content:</b> '.$newarr["utm_content"].'</span> | ';
			}
			if($newarr['utm_id'] != '' && $newarr['utm_id'] != "false"){
				$email_utm .= '<span><b>utm_id: </b>'.$newarr["utm_id"].'</span> | ';
			}
			$email_utm = rtrim($email_utm, '| ');
			//$email_utm .= '<span>utm_source: '.$all_utm[0].'</span> , <span>utm_term: '.$all_utm[2].'</span> , <span>utm_campaign: '.$all_utm[3].'</span> , <span>utm_medium: '.$all_utm[1].'</span>';
		}
		
		$mail = $contact_form->prop('mail');		
		if (strpos($mail['body'], '[UTM_Details]') !== false) {
			$finalstring = "UTM Details: " . $email_utm;
			$mail['body'] = str_replace("[UTM_Details]",$finalstring,$mail['body']);
			//$mail['body'] .= $email_utm;			
		}
		$mail['use_html'] = 1;
		$contact_form->set_properties(array('mail' => $mail));
        
	  }
	}
	
