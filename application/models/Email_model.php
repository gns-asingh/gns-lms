<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Short description for class:
 * Modal of all email functionality
 * @copyright  GNS Technologies
 */ 
class Email_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
/**
 * Password reset 
 * @param String   $new_password  contains string of password
 * @param String   $email         contains email id to reset the password
 * @author GNS
 */
	function password_reset_email($new_password = '' , $email = '')
	{
		$query = $this->db->get_where('users' , array('email' => $email));
		if($query->num_rows() > 0)
		{

			$email_msg	=	"Your password has been changed.";
			$email_msg	.=	"Your new password is : ".$new_password."<br />";

			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			//$this->do_email($email_msg , $email_sub , $email_to);
			$this->send_smtp_mail($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{
			return false;
		}
	}
/**
 * Varification mail
 * @param String   $to                 contains email id of reciever
 * @param String   $verification code  contains varification code
 * @author GNS
 */
	public function send_email_verification_mail($to = "", $verification_code = "") {
		$redirect_url = site_url('login/verify_email_address/'.$verification_code);
		$subject 		= "Verify Email Address";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>Please click the link below to verify your email address.</p>";
		$email_msg	.=	"<a href = ".$redirect_url." target = '_blank'>Verify Your Email Address</a>";
		$this->send_smtp_mail($email_msg, $subject, $to);
	}
/**
 * Varification mail
 * @param String   $course_id                 contains course id of course
 * @param String   $mail_subject              contains mail subject 
 * @param String   $mail_body                 contains mail body
 * @author GNS
 */
	public function send_mail_on_course_status_changing($course_id = "", $mail_subject = "", $mail_body = "") {
		$instructor_id		 = 0;
		$course_details    = $this->crud_model->get_course_by_id($course_id)->row_array();
		if ($course_details['user_id'] != "") {
			$instructor_id = $course_details['user_id'];
		}else {
			$instructor_id = $this->session->userdata('user_id');
		}
		$instuctor_details = $this->user_model->get_all_user($instructor_id)->row_array();
		$email_from = get_settings('system_email');

		$this->send_smtp_mail($mail_body, $mail_subject, $instuctor_details['email'], $email_from);
	}
/**
 * Send smtp mail
 * @param String   $msg                       contains msg
 * @param String   $sub                       contains subject of mail
 * @param String   $to                        contains email id of reciver
 * @param String   $from                      contains email id of sender
 * @author GNS
 */
	public function send_smtp_mail($msg=NULL, $sub=NULL, $to=NULL, $from=NULL) {
		//Load email library
		$this->load->library('email');

		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('key' => 'system_email'))->row()->value;

		//SMTP & mail configuration
		$config = array(
			'protocol'  => get_settings('protocol'),
			'smtp_host' => get_settings('smtp_host'),
			'smtp_port' => get_settings('smtp_port'),
			'smtp_user' => get_settings('smtp_user'),
			'smtp_pass' => get_settings('smtp_pass'),
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$htmlContent = $msg;

		$this->email->to($to);
		$this->email->from($from, get_settings('system_name'));
		$this->email->subject($sub);
		$this->email->message($htmlContent);

		//Send email
		$this->email->send();
	}
}
