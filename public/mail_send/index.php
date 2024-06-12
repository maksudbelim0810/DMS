<?php
$to_email = 'alpesh.koyani90@gmail.com';
$subject = "test Subject";
$message = "test";
phpMailerMail("Admin", $to_email, "", "test", $to_email,"","", $subject, $message, "1");

function phpMailerMail($FromDisplay, $FromEmail, $ReplyTo, $ToName, $ToEmail, $CCList, $BCCList, $Subject, $myMsg, $MailFormat){
	if(isset($ToEmail) && validateEmail($ToEmail))
	{
		require_once('includes/class.phpmailer.php');
		$mail = new PHPMailer();
		
		if(!isset($MailFormat) || ($MailFormat!=0 && $MailFormat!=1))
		{
			$MailFormat = 1;
		}
		if($MailFormat==1)
		{
			$myMsgTop = "<table border='0' cellspacing='0' cellpadding='2' width='95%'>
			<tr><td><font face='verdana' size='2'>";
			$myMsgBottom = "</font></td></tr></table>";
		}
		else
		{
			$myMsg = strip_tags($myMsg);
			//$myMsg = str_replace("\n","",$myMsg);
			$myMsg = str_replace("\t","",$myMsg);
			$myMsg = str_replace("&nbsp;","",$myMsg);
			$myMsgTop = "";
			$myMsgBottom = "";
		}
		$message = $myMsgTop.$myMsg.$myMsgBottom;

		if(!isset($FromDisplay) || strlen(trim($FromDisplay))==0)
		{
			$FromDisplay = $FromEmail;
		}
		if(!isset($ToName) || strlen(trim($ToName))==0)
		{
			$ToName = $ToEmail;
		}
		if(isset($myCCList) && strlen(trim($myCCList)) > 0)
		{
			$tempCCs = explode(",", $myCCList);
			for($c = 0;$c<count($tempCCs);$c++)
				if(validateEmail($tempCCs[$c]))
					$mail->AddCC($tempCCs[$c]);
		}
		if(isset($myBCCList) && strlen(trim($myBCCList)) > 0)
		{
			$tempBCCs = explode(",", $myBCCList);
			for($c = 0;$c<count($tempBCCs);$c++)
				if(validateEmail($tempBCCs[$c]))
					$mail->AddBCC($tempBCCs[$c]);
		}
		$body = $myMsg;

		$mail->IsSMTP(); 
		$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
										
		$mail->SMTPAuth = false;                  // enable SMTP authentication
		$mail->Host = "smtp.gmail.com"; // sets the SMTP server
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 587;                    // set the SMTP port for the GMAIL server
		$mail->Username = "app.engear@gmail.com"; // SMTP account username
		$mail->Password = "Mobiato@123";        // SMTP account password
		$mail->setFrom('inbox310@glmux.com', '111');

		$mail->Subject = $Subject;

		//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);

		$address = $ToEmail;
		$mail->AddAddress($address, $ToName);

		$mail->Send();
	}
}
function validateEmail($val)
	{
		$my=$val;
		$attherate= strpos($my,"@");
		$lastattherate = strrpos($my,"@");
		$dotpos= strrpos($my,".");
		$posspace = strpos($my," ");
		$totallen = strlen($my);
		if($attherate<=0 || $dotpos<=0 || $attherate > $dotpos || ($dotpos-$attherate)<=1 || ($dotpos == $totallen-1) || $posspace > -1 || $attherate!=$lastattherate)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
					