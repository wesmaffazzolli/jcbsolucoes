<?php  include "includes/navigation.php"; ?>

<?php

if(isset($_POST['submit'])) {
  //$name = $_POST['name'];
  $email = $_POST['email']; 
  $to = $_POST['to'];
  $subject = wordwrap($_POST['subject'],70);
  $body = $_POST['body'];
  $header = "From: ".$email;
 
  $message = "deu boa!";
  
  mail($to,$subject,$body,$header); ?>
  

  <script type="text/javascript">alert("Deu boa!");</script>

  <?php } ?>

<section id="contact" class="section-bg wow fadeInUp">
  <div class="container" style="margin-top: 100px;">

    <h3>Fale Conosco</h3>
    <div class="form">
      <form action="" method="POST" role="form" class="contactForm">
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nome" />
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
          </div>
        </div>
        <div class="form-group">
            <select name="to" class="form-control">
              <option value="" disabled>Departamento</option>
              <option value="wesley.maffazzolli@gmail.com">Meu Email</option>
              <option value="cm">Comercial</option>
              <option value="rh">Recursos Humanos</option>
              <option value="dr">Diretoria</option>
            </select>
       </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" />
        </div>
        <div class="form-group">
          <textarea class="form-control" name="body" rows="5" placeholder="Mensagem"></textarea>
        </div>
        <input type="submit" name="submit" />
      </form>
    </div>

  </div>
</section>

<?php include "includes/footer.php";?>
