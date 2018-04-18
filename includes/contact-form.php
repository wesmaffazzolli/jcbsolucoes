<?php

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email']; 
  $to = $_POST['to'];
  $subject = "Contato via website JCB: ".wordwrap($_POST['subject'],70);
  $body = $_POST['body']." <Nome do contato: ".$name."> <Email: ".$email.">";
  $header = "From: ".$email;
  
  mail($to,$subject,$body,$header); ?>
  

  <script type="text/javascript">alert("A sua mensagem foi enviada. Em breve entraremos em contato.");</script>

  <?php } ?>

<h3>Fale Conosco</h3>
<div class="form">
  <form action="" method="POST" role="form" class="contactForm">
    <div class="form-row">
      <div class="form-group col-md-6">
        <input type="text" name="name" class="form-control" id="name" maxlength="100" placeholder="Nome" required/>
      </div>
      <div class="form-group col-md-6">
        <input type="email" class="form-control" name="email" id="email" maxlength="100" placeholder="Email" required/>
      </div>
    </div>
    <div class="form-group">
        <select name="to" class="form-control" required>
          <option disabled selected value>Departamento</option>
          <option value="encaminhamentojcb1@gmail.com">Comercial</option>
          <option value="encaminhamentojcb2@gmail.com">Trabalhe Conosco</option>
        </select>
   </div>
    <div class="form-group">
      <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required/>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="body" rows="5" placeholder="Mensagem" required></textarea>
    </div>
    <input class="btn" type="submit" name="submit" value="Enviar Mensagem" />
  </form>
</div>