<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=global
Order=10
[END_COT_EXT]
==================== */

/**
 * PHPMailer for Cotonti CMF
 *
 * @version 5.1
 * @author esclkm
 * @copyright (c) 2008-2011 esclkm
 */
defined('COT_CODE') or die('Wrong URL.');

function cot_mail_custom($fmail, $subject, $body, $headers, $customtemplate, $additional_parameters)
{
	global $cfg;
	
	if (is_array($cot_mail_senders) && count($cot_mail_senders) > 0)
	{
		foreach ($cot_mail_senders as $func)
		{
			$ret &= $func($fmail, $subject, $body, $headers, $additional_parameters);
		}
		return $ret;
	}
	if (empty($fmail))
	{
		return(FALSE);
	}
	else
	{

		if (!$customtemplate)
		{
			$body_params = array(
				'SITE_TITLE' => $cfg['maintitle'],
				'SITE_URL' => $cfg['mainurl'],
				'SITE_DESCRIPTION' => $cfg['subtitle'],
				'ADMIN_EMAIL' => $cfg['adminemail'],
				'MAIL_SUBJECT' => $subject,
				'MAIL_BODY' => $body
			);

			$subject_params = array(
				'SITE_TITLE' => $cfg['maintitle'],
				'SITE_DESCRIPTION' => $cfg['subtitle'],
				'MAIL_SUBJECT' => $subject
			);

			$subject = cot_title($cfg['subject_mail'], $subject_params, false);
			$body = cot_title(str_replace("\r\n", "\n", $cfg['body_mail']), $body_params, false);
		}
		$subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\n");
		
		require_once $cfg['plugins_dir'].'/phpmailer/inc/class.phpmailer.php';

		global $error;
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = (bool)$cfg['plugin']['phpmailer']['SMTPAuth'];  // authentication enabled
		$mail->SMTPSecure = $cfg['plugin']['phpmailer']['SMTPSecure']; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = $cfg['plugin']['phpmailer']['Host'];
		$mail->Port = $cfg['plugin']['phpmailer']['Port'];
		$mail->Username = $cfg['plugin']['phpmailer']['Username'];
		$mail->Password = $cfg['plugin']['phpmailer']['Password'];
		$mail->SetFrom($cfg['plugin']['phpmailer']['from'], $cfg['plugin']['phpmailer']['from_name']);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($fmail);
		if (!$mail->Send())
		{
			$error = 'Mail error: '.$mail->ErrorInfo;
			return false;
		}
		else
		{
			//cot_stat_inc('totalmailsent');
			$error = 'Message sent!';
			return true;
		}
	}
}

?>
