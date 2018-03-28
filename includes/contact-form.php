<?php
/**
 * PHPMailer simple contact form example.
 * If you want to accept and send uploads in your form, look at the send_file_upload example.
 */
//Import the PHPMailer class into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/phpmailer/src/Exception.php';
//require 'lib/phpmailer/src/PHPMailer.php';
require 'lib/phpmailer/src/SMTP.php';

require_once('lib/phpmailer/src/PHPMailer.php'); //chama a classe de onde você a colocou.

if(isset($_POST['submit'])) {

  echo "passei aqui!!";

  $mail = new PHPMailer(); // instancia a classe PHPMailer

  $mail->IsSMTP();

  //configuração do gmail
  $mail->Port = '465'; //porta usada pelo gmail.
  $mail->Host = 'smtp.gmail.com'; 
  $mail->IsHTML(true); 
  $mail->Mailer = 'smtp'; 
  $mail->SMTPSecure = 'ssl';

  //configuração do usuário do gmail
  $mail->SMTPAuth = true; 
  $mail->Username = 'wesley.maffazzolli@gmail.com'; // usuario gmail.   
  $mail->Password = '5918669bertoldo'; // senha do email.

  $mail->SingleTo = true; 

  // configuração do email a ver enviado.
  $mail->From = "Mensagem de email, pode vim por uma variavel."; 
  $mail->FromName = $_POST['name']; 

  $mail->addAddress("wesley.maffazzolli@gmail.com"); // email do destinatario.

  $mail->Subject = $_POST['subject']; 
  $mail->Body = $_POST['message'];

  if(!$mail->Send()) {
    echo "Erro ao enviar Email:" . $mail->ErrorInfo;
  } else {
    var_dump($mail);
  }

  $teste = "esta é a variável que vou fazer var_dump!";

  var_dump($teste);
    
} ?>

<div class="form">
  <div id="sendmessage">A sua mensagem foi enviada. Obrigado!</div>
  <div id="errormessage"></div>
  <form action="" method="post" role="form" class="contactForm">
    <div class="form-row">
      <div class="form-group col-md-6">
        <input type="text" name="name" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
        <div class="validation"></div>
      </div>
      <div class="form-group col-md-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
        <div class="validation"></div>
      </div>
    </div>
    <div class="form-group">
        <select name="to" class="form-control">
          <option value="" disabled>Departamento</option>
          <option value="wesley.maffazzolli">Meu Email</option>
          <option value="cm">Comercial</option>
          <option value="rh">Recursos Humanos</option>
          <option value="dr">Diretoria</option>
        </select>
   </div>
    <div class="form-group">
      <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
      <div class="validation"></div>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
      <div class="validation"></div>
    </div>
    <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
  </form>
</div>