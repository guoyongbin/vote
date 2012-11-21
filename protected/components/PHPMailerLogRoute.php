<?php
require_once Yii::getPathOfAlias('ext.phpmailer').'/class.phpmailer.php';

class PHPMailerLogRoute extends CEmailLogRoute {
	
	public $host;
	public $SMTPAuth;
	public $username;
	public $password;
	public $from;
	public $fromName;
	
	public function sendEmail($email, $subject, $message) {
		$headers=$this->getHeaders();
		if(($from=$this->getSentFrom())!==null)
			$headers[]="From: {$from}";
		$this->smtp_mail($email, $subject, $message);
	}
	
	function smtp_mail($sendto_email, $subject, $body) {
		$mail = new PHPMailer ();
		$mail->IsSMTP (); // send via SMTP    
		$mail->Host = $this->host; // SMTP servers    
		$mail->SMTPAuth = $this->SMTPAuth; // turn on SMTP authentication    
		$mail->Username = $this->username; // SMTP username  注意：普通邮件认证不需要加 @域名    
		$mail->Password = $this->password; // SMTP password    
		$mail->From = $this->from; // 发件人邮箱    
		$mail->FromName = $this->fromName; // 发件人    

		$mail->CharSet = "UTF-8"; // 这里指定字符集！    
		$mail->Encoding = "base64";
		$mail->AddAddress ( $sendto_email, strstr($sendto_email, "@hayzone.com", true) ); // 收件人邮箱和姓名    
		$mail->AddReplyTo ( $this->from, $sendto_email );
		//$mail->WordWrap = 50; // set word wrap 换行字数    
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件    
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    
		$mail->IsHTML ( true ); // send as HTML    
		// 邮件主题    
		$mail->Subject = $subject;    
	    // 邮件内容    
	    $mail->Body = $body;
		$mail->AltBody = "text/html";
		$mail->Send ();
		/*
		if (! $mail->Send ()) {
			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo "邮件发送有误 <p>";
			echo "邮件错误信息: " . $mail->ErrorInfo;
			exit ();
		} else {
			echo $mail->Username.'邮件发送成功!<br />';
		}
		*/
	}

}