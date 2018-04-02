<?php

    // the message
  //$msg = "First line of text\nSecond line of text";

  // use wordwrap() if lines are longer than 70 characters
  //$msg = wordwrap($msg,70);

  // send email
  //mail("wesley.maffazzolli@gmail.com","My subject",$msg);


if(isset($_POST['submit'])) {
  $to = "wesley.maffazzolli@gmail.com";
  $subject = $_POST['subject'];
  $body = $_POST['body'];

}

    
 ?>

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
      <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
      <div class="validation"></div>
    </div>
    <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
  </form>
</div>