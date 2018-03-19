<?php include "includes/navigation.php"; ?>

<!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <?php 

          $query = "SELECT A.MAINPAGE_DATA_ID, A.TITLE, A.DESCR, A.STATUS, A.POSITION, B.MAINPAGE_IMAGE_ID, B.IMG_PATH ";
          $query .="FROM mainpage_data AS A INNER JOIN mainpage_images AS B ON A.MAINPAGE_DATA_ID = B.MAINPAGE_DATA_ID ";
          $query .="ORDER BY A.POSITION ";

          $select_imagens_inicio = mysqli_query($connection, $query); 
          while($row = mysqli_fetch_assoc($select_imagens_inicio)) {
                  $home_id = $row['MAINPAGE_DATA_ID'];
                  $home_title = $row['TITLE'];
                  $home_descr = $row['DESCR'];

                  $home_status = $row['STATUS'];
                  if($home_status == 'A') {
                      $home_status_descr = 'Ativo';
                  } else {
                      $home_status_descr = 'Inativo';
                  }

                  $home_position = $row['POSITION'];
                  $home_image_id = $row['MAINPAGE_IMAGE_ID'];
                  $home_image_path = $row['IMG_PATH'];
        ?>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Limpeza aérea</h2>
                <p>Durante a parada na Vale Uberaba a JCB Soluções promoveu a campanha de Conscientização Cancer de Mama. Foi um dia muito especial para toda a nossa equipe.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>
          
         <!--<div class="carousel-item" style="background-image: url('img/intro-carousel/1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Limpeza aérea</h2>
                <p>Durante a parada na Vale Uberaba a JCB Soluções promoveu a campanha de Conscientização Cancer de Mama. Foi um dia muito especial para toda a nossa equipe.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item active" style="background-image: url('img/intro-carousel/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Técnicas de Acesso por Corda</h2>
                <p>Execução de atividades classificadas como alpinismo industrial: Tratamento e pintura industrial, montagem, remoção, instalação e reparos industriais, inspeções técnicas e limpeza técnica especializada.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/imagem7.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Tratamento ST3 e Pintura Industrial</h2>
                <p>Serviços executados pela equipe da JCB Soluções Industriais.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/imagem5.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Instalação e Manutenção de Banners e Similares</h2>
                <p>Em parceria com a empresa F9, a JCB Soluções Industriais instalou o banner para a reinauguração do Palácio Iguaçu, sede do governo estadual do Paraná.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/imagem6.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Técnicas de Acesso por Corda</h2>
                <p>Execução de atividades classificadas como alpinismo industrial: Tratamento e pintura industrial, montagem, remoção, instalação e reparos industriais, inspeções técnicas e limpeza técnica especializada.</p>
                <a href="services.php" class="btn-get-started scrollto">Saiba mais</a>
              </div>
            </div>
          </div>-->

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
                   <h3 class="about-title-content">Institucional</h3>  
                    <p>Buscar soluções que se adaptem a cada necessidade e que possam ser implementadas com segurança, agilidade, responsabilidade técnica e com alta performance em qualidade na prestação de serviços, são os principais objetivos da JCB Soluções Industriais. Uma empresa especializada em fornecimento de mão de obra especializada, treinamentos em Segurança, Saúde e Meio Ambiente (SMS) e na prestação de serviços envolvendo técnicas em alpinismo industrial, predial e limpeza técnica aérea e em espaços confinados.</p>
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
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><p>Buscar sempre soluções que contribuam efetivamente para o crescimento sustentável dos nossos clientes, parceiros e da própria JCB Soluções Industriais.</p></div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><p>Ser referência nas soluções apresentadas nas atividades de capacitação em SMS,  gerenciamento de risco e na prestação de serviços.</p></div>
                      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><p>Buscar soluções que se adaptem a cada necessidade e que possam ser implementadas com segurança, agilidade, responsabilidade técnica e com alta performance em qualidade na prestação de serviços, são os principais objetivos da JCB Soluções Industriais.</p></div>
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
    </section><!-- #call-to-action -->
    
   <!--==========================
      Timeline
    ============================-->
          <?php include "includes/timeline3.php"; ?>
          
    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>A JCB em números</h3>
          <p>Uma história fundada em competência e dedicação:</p>
        </header>

        <div class="row counters">
  		    <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">274</span>
                <p>Clientes</p>
  		    </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projetos</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Horas de Suporte</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Funcionários</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="img/imagem3.jpg" alt="" class="img-fluid">
        </div>

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
          <img src="img/clients/mond.png" alt="">
          <img src="img/clients/petrobras.png" alt="">
          <img src="img/clients/vale-top.png" alt="">
          <img src="img/clients/volvo.jpg" alt="">
          <img src="img/clients/csn.jpg" alt="">
          <!--<img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">-->
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="img/clients/mond.png" alt="">
          <img src="img/clients/petrobras.png" alt="">
          <img src="img/clients/vale-top.png" alt="">
          <img src="img/clients/volvo.jpg" alt="">
          <img src="img/clients/csn.jpg" alt="">
          <!--<img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">-->
        </div>
      </div>
    </section><!-- #clients -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contato</h3>
          <p>Entre em contato conosco via telefone ou nos envie uma mensagem preenchendo o formulário abaixo.</p>
        </div>

        <div class="row contact-info"> <!-- Linha 1 contato -->

          <div class="col-md-6">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Endereço</h3>
              <address>R. Lídia Wosch, 155, Santa Candida, Curitiba - PR - Brasil</address>
            </div>
            <div class="contact-address">

            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telefone</h3>
              <p><a href="tel:4132570454">(41) 3257-0454</a></p>
              <p><a href="tel:4132567812">(41) 3256-7812</a></p>
            </div>
          </div>

        </div> <!-- Fim linha 1 contato -->
        
        <div class="row contact-info"> <!-- Linha 2 contato -->

          <div class="col-md-6">
            <div class="contact-address">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">comercial@jcbsolucoes.com.br</a></p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-phone">
              <i class="ion-ios-person-outline"></i>
              <h3>Redes Sociais</h3>
              <div class="social-links">
                <a href="https://www.facebook.com/jcbsolucoes/" class="facebook"><i class="fa fa-facebook" style="font-size: 26px; padding: 10px;"></i></a>
                <a href="https://www.instagram.com/jcbsolucoes/" class="instagram"><i class="fa fa-instagram" style="font-size: 30px; padding: 10px;"></i></a>
                <a href="https://pt.linkedin.com/company/jcb-solu-es-industriais" class="linkedin"><i class="fa fa-linkedin" style="font-size: 30px; padding: 10px;"></i></a>
            </div>
            </div>
          </div>

        </div> <!-- Fim Linha 2 contato -->

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
                <select class="form-control">
                  <option value="" disabled selected>Departamento</option>
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

      </div>
      
    </section><!-- #contact -->

  </main>
  
 <?php include "includes/footer.php"; ?>