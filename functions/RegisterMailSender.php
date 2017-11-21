<?php
//Abp4952Bfj1069
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
// require 'vendor/autoload.php';

class RegisterMailSender{

    private $email;
    private $name;
    private $password;

    public function _construct($email, $name, $password){
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function _destruct(){}

    public function setEmail($email){
        $this->email = $email;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($subject){
        $this->password = $password;
    }

    public function sendMail(){
        $mail = new PHPMailer(true);       
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->Port = 587;
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'lynxcorporative@gmail.com';                 // SMTP username
        $mail->Password = 'Abp4952Bfj1069';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        
        $mail->From = 'lynxcorporative@gmail.com';
        $mail->FromName = 'Lynx Corporative';
    

        $mail->addAddress($this -> email, $this -> name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('lynxcorporative@gmail.com');
        // $mail->addBCC('bcc@example.com');
        
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
        $message = '<html><body>';
        $message .= '<img src="https://wallpaperscraft.com/image/couple_food_table_coffee_shop_fast_food_57082_3840x2400.jpg" height="500" width="800" />';
        $message .= '<br />';
        $message .= '<h1 style="color:brown;text-align:center;font-family:Comic Sans MS">Lynx Corporative</h1>';
        $message .= '<br />';
        $message .= '<p style="text-align:center;font-family:Comic Sans MS">We are delighted to have a question from you. We will reply ASAP. Thankyou.</p>';
        $message .= '<p style="text-align:center;font-family:Comic Sans MS">Name.</p>';
        $message .= '<p style="text-align:center;font-family:Comic Sans MS">' . $this -> name . '</p>';
        $message .= '<p style="text-align:center;font-family:Comic Sans MS">Email.</p>';
        $message .= '<p style="text-align:center;font-family:Comic Sans MS">' . $this -> email . '</p>';
        $message .= '<br />';
        $message .= '<br />';
        $message .= '<table align="center" width="604" cellpadding="5" cellspacing="0"> <tr> <td width="288" bgcolor="#ffffff"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_square-512.png" height="35" width="35" /><br /> <td width="294" bgcolor="#ffffff" align="right"> <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/512/Twitter-icon.png" height="35" width="35" /><tr>';
        $message .= '<td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;" align="center">
                        <span style="font-size: 10px; color: #575757; line-height: 120%; font-family: arial; text-decoration: none;">
                        <a href="mailto:info@petanthology.com">
                        Contact Us?</a><br>
                        Visit us on the web at <a href="default.asp">petanthology.com</a></span></td>
                        <td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: right; height: 50px;" align="center">
                        <span style="font-size: 10px; color: #575757; line-height: 120%;
                        font-family: arial; text-decoration: none;">If you no longer want to receive our emails, please <a href="default.asp">un-subscribe here</a>.</span>';
        $message .= '</table>';
        $message .= "</body></html>";
    
        $mail->Subject = "Hello";
        $mail->Header = $headers;
        $mail->Body = $message;
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

}

?>