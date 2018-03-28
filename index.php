<?php include "includes/navigation.php"; ?>

<!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators">
        </ol>

        <div class="carousel-inner" role="listbox">

        <?php 

        $query = "SELECT INICIO_ID ";
        $query .="FROM inicio WHERE STATUS = 'A' ";
        $query .="ORDER BY POSITION LIMIT 1";

        $select_first_active_id = mysqli_query($connection, $query); 
        $row = mysqli_fetch_array($select_first_active_id);
        $home_first_id = $row['INICIO_ID'];

        $query = "SELECT INICIO_ID, TITLE, DESCR, STATUS, POSITION, IMG_PATH, URL ";
        $query .="FROM inicio WHERE STATUS = 'A'";
        $query .="ORDER BY POSITION ";

        $select_imagens_inicio = mysqli_query($connection, $query); 
        while($row = mysqli_fetch_assoc($select_imagens_inicio)) { 
            $home_id = $row['INICIO_ID'];
            $home_title = $row['TITLE'];
            $home_descr = $row['DESCR'];
            $home_status = $row['STATUS'];
            $home_position = $row['POSITION'];
            $home_url = $row['URL'];
            $home_image_path = $row['IMG_PATH']; ?>

         <div class="carousel-item<?php if($home_id == $home_first_id) {echo ' active';} ?>" style="background-image: url('img/intro-carousel/<?php if(isset($home_image_path) && !empty($home_image_path)){echo $home_image_path;}else{echo "";} ?>');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?php if(isset($home_title) && !empty($home_title)){echo $home_title;}else{echo "Título aqui";} ?></h2>
                <p><?php if(isset($home_descr) && !empty($home_descr)){echo $home_descr;}else{echo "Texto aqui";} ?></p>
                <a href="<?php if(isset($home_url) && !empty($home_url)){echo $home_url;}else{echo "";} ?>" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>

        <?php  } ?>       

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      QUEM SOMOS
    ============================-->
    <section id="about">
      <div class="container">
          <header class="section-header">
               <a href="#about"><h3>Sobre nós</h3></a>
          </header>
           <div class="row">
               <div class="col-md-6">

                  <?php $query = "SELECT * FROM institucional ";

                    $select_institucional = mysqli_query($connection, $query); 

                    while($row = mysqli_fetch_assoc($select_institucional)) { 
                      $institucional_text = $row['INSTITUCIONAL_TEXT'];
                      $institucional_missao_text = $row['MISSAO_TEXT'];
                      $institucional_visao_text = $row['VISAO_TEXT'];
                      $institucional_objetivos_text = $row['OBJETIVOS_TEXT'];
                      $institucional_update_date = $row['UPDATE_DATE'];

                      } ?>

                   <h3 class="about-title-content">Institucional</h3>  
                    <p><?php if(isset($institucional_text) && !empty($institucional_text)){echo $institucional_text;}else{echo "Buscar soluções que se adaptem a cada necessidade e que possam ser implementadas com segurança, agilidade, responsabilidade técnica e com alta performance em qualidade na prestação de serviços, são os principais objetivos da JCB Soluções Industriais. Uma empresa especializada em fornecimento de mão de obra especializada, treinamentos em Segurança, Saúde e Meio Ambiente (SMS) e na prestação de serviços envolvendo técnicas em alpinismo industrial, predial e limpeza técnica aérea e em espaços confinados.";} ?></p>
                </div>
                <div class="col-md-6 align-items-center">
                   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="padding-top:30px;">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color: #fafafa; width:150px;">&rarr; Missão</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #fafafa; width:150px;">&rarr; Visão</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="color: #fafafa; width:150px;">&rarr; Objetivos</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <p><?php if(isset($institucional_missao_text) && !empty($institucional_missao_text)){echo $institucional_missao_text;}else{echo "Buscar sempre soluções que contribuam efetivamente para o crescimento sustentável dos nossos clientes, parceiros e da própria JCB Soluções Industriais.";} ?></p>
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p><?php if(isset($institucional_visao_text) && !empty($institucional_visao_text)){echo $institucional_visao_text;}else{echo "Ser referência nas soluções apresentadas nas atividades de capacitação em SMS,  gerenciamento de risco e na prestação de serviços.";} ?></p>
                      </div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p><?php if(isset($institucional_objetivos_text) && !empty($institucional_objetivos_text)){echo $institucional_objetivos_text;}else{echo "Buscar soluções que se adaptem a cada necessidade e que possam ser implementadas com segurança, agilidade, responsabilidade técnica e com alta performance em qualidade na prestação de serviços, são os principais objetivos da JCB Soluções Industriais.";} ?>
                        </p>
                      </div>
                    </div>
                </div>
          </div>
      </div>
    </section><!-- #about -->
   
      <!--==========================
      Timeline
    ============================-->
    <!--<section id="call-to-action" class="wow fadeIn">
      <div class="container">
          <?php //include "includes/timeline.php"; ?>
      </div>
    </section> #call-to-action -->
    
   <!--==========================
      Timeline
    ============================-->
          <?php include "includes/timeline3.php"; ?>
          
    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

      <?php 

        $query = "SELECT * FROM nossos_numeros ";

        $select_nossos_numeros = mysqli_query($connection, $query); 

        while($row = mysqli_fetch_assoc($select_nossos_numeros)) { 
          $nossos_numeros_text_main = $row['TEXT_MAIN'];
          $nossos_numeros_num1 = $row['NUM1'];
          $nossos_numeros_num2 = $row['NUM2'];
          $nossos_numeros_num3 = $row['NUM3'];
          $nossos_numeros_num4 = $row['NUM4'];
          $nossos_numeros_text1 = $row['TEXT1'];
          $nossos_numeros_text2 = $row['TEXT2'];
          $nossos_numeros_text3 = $row['TEXT3'];
          $nossos_numeros_text4 = $row['TEXT4']; ?>
      
        <header class="section-header">
          <h3>A JCB em números</h3>
          <p><?php if(isset($nossos_numeros_text_main) && !empty($nossos_numeros_text_main)){echo $nossos_numeros_text_main;}else{echo "Uma história fundada em competência e dedicação:
";}?></p>
        </header>

        <div class="row counters">
  		    <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php if(isset($nossos_numeros_num1) && !empty($nossos_numeros_num1)){echo $nossos_numeros_num1;}else{echo "274
";}?></span>
                <p><?php if(isset($nossos_numeros_text1) && !empty($nossos_numeros_text1)){echo $nossos_numeros_text1;}else{echo "Clientes
";}?></p>
  		    </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php if(isset($nossos_numeros_num2) && !empty($nossos_numeros_num2)){echo $nossos_numeros_num2;}else{echo "421
";}?></span>
            <p><?php if(isset($nossos_numeros_text2) && !empty($nossos_numeros_text2)){echo $nossos_numeros_text2;}else{echo "Projetos
";}?></p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php if(isset($nossos_numeros_num3) && !empty($nossos_numeros_num3)){echo $nossos_numeros_num3;}else{echo "1,364
";}?></span>
            <p><?php if(isset($nossos_numeros_text3) && !empty($nossos_numeros_text3)){echo $nossos_numeros_text3;}else{echo "Horas de Suporte
";}?></p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php if(isset($nossos_numeros_num4) && !empty($nossos_numeros_num4)){echo $nossos_numeros_num4;}else{echo "18
";}?></span>
            <p><?php if(isset($nossos_numeros_text4) && !empty($nossos_numeros_text4)){echo $nossos_numeros_text4;}else{echo "Funcionários
";}?></p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="img/imagem3.jpg" alt="" class="img-fluid">
        </div>

        <?php } ?>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Nossos Clientes</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <?php 
          //Listagem dos clientes                
          $query_group_1 = "SELECT IMG_PATH, GRUPO, POSITION FROM clients WHERE GRUPO = 1 ORDER BY GRUPO, POSITION"; 
          $select_clients = mysqli_query($connection, $query_group_1);
          while($row = mysqli_fetch_assoc($select_clients)) {
              $clients_img = $row['IMG_PATH'];
              $clients_group = $row['GRUPO'];
              $clients_position = $row['POSITION']; ?>

          <?php if(isset($clients_group) && !empty($clients_group) && isset($clients_position) && !empty($clients_position) && isset($clients_img) && !empty($clients_img)) { ?> 
        
          <img src="img/clients/<?php echo $clients_img; ?>" alt="">

          <?php } } ?>
        </div>

        <div class="owl-carousel clients-carousel">

         <?php 
          //Listagem dos clientes                
          $query_group_2 = "SELECT IMG_PATH, GRUPO, POSITION FROM clients WHERE GRUPO = 2 ORDER BY GRUPO, POSITION"; 
          $select_clients = mysqli_query($connection, $query_group_2);
         while($row = mysqli_fetch_assoc($select_clients)) {
            $clients_img = $row['IMG_PATH'];
            $clients_group = $row['GRUPO'];
            $clients_position = $row['POSITION']; ?>

        <?php if(isset($clients_group) && !empty($clients_group) && isset($clients_position) && !empty($clients_position) && isset($clients_img) && !empty($clients_img)) { ?> 

          <img src="img/clients/<?php echo $clients_img; ?>" alt="">
          
          <?php } } ?>
        </div>
      </div>
    </section><!-- #clients -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

      <?php

            $query = "SELECT * FROM contact ";

            $select_contact = mysqli_query($connection, $query); 

            while($row = mysqli_fetch_assoc($select_contact)) { 
              $contact_address = $row['ADDRESS'];
              $contact_phone1 = $row['PHONE1'];
              $contact_phone2 = $row['PHONE2'];
              $contact_email = $row['EMAIL'];
              $contact_url_facebook = $row['URL_FACEBOOK'];
              $contact_url_instagram = $row['URL_INSTAGRAM'];
              $contact_url_linkedin = $row['URL_LINKEDIN']; ?>

        <div class="section-header">
          <h3>Contato</h3>
          <p>Entre em contato conosco via telefone ou nos envie uma mensagem preenchendo o formulário abaixo.</p>
        </div>

        <div class="row contact-info"> <!-- Linha 1 contato -->

          <div class="col-md-6">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Endereço</h3>
              <address><?php if(isset($contact_address) && !empty($contact_address)){echo $contact_address;}else{echo "R. Lídia Wosch, 155, Santa Candida, Curitiba - PR - Brasil";} ?></address>
            </div>
            <div class="contact-address">

            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telefone</h3>
              <p><a href=""><?php if(isset($contact_phone1) && !empty($contact_phone1)){echo $contact_phone1;}else{echo "(41) 3257-0454";} ?></a></p>
              <p><a href=""><?php if(isset($contact_phone2) && !empty($contact_phone2)){echo $contact_phone2;}else{echo "(41) 3256-7812";} ?></a></p>
            </div>
          </div>

        </div> <!-- Fim linha 1 contato -->
        
        <div class="row contact-info"> <!-- Linha 2 contato -->

          <div class="col-md-6">
            <div class="contact-address">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href=""><?php if(isset($contact_email) && !empty($contact_email)){echo $contact_email;}else{echo "comercial@jcbsolucoes.com.br";} ?></a></p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-phone">
              <i class="ion-ios-person-outline"></i>
              <h3>Redes Sociais</h3>
              <div class="social-links">
                <a href="<?php if(isset($contact_url_facebook) && !empty($contact_url_facebook)){echo $contact_url_facebook;}else{echo "https://www.facebook.com/jcbsolucoes/";} ?>" class="facebook"><i class="fa fa-facebook" style="font-size: 26px; padding: 10px;"></i></a>
                <a href="<?php if(isset($contact_url_instagram) && !empty($contact_url_instagram)){echo $contact_url_instagram;}else{echo "https://www.instagram.com/jcbsolucoes/";} ?>" class="instagram"><i class="fa fa-instagram" style="font-size: 30px; padding: 10px;"></i></a>
                <a href="<?php if(isset($contact_url_linkedin) && !empty($contact_url_linkedin)){echo $contact_url_linkedin;}else{echo "https://pt.linkedin.com/company/jcb-solu-es-industriais";} ?>" class="linkedin"><i class="fa fa-linkedin" style="font-size: 30px; padding: 10px;"></i></a>
            </div>
            </div>
          </div>

        </div> <!-- Fim Linha 2 contato -->

        <?php } ?>

        <?php include "includes/contact-form.php"; ?>

      </div>
      
    </section><!-- #contact -->

  </main>
  
 <?php include "includes/footer.php"; ?>