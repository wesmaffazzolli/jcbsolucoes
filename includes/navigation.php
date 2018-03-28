<?php include "header.php"; ?>
      
<!--==========================
    Header
============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!--<h1><a href="#intro" class="scrollto">BizPage</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img class="my-logo" src="img/nova-logo-jcb-2.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php#intro">Início</a></li>
         <li class="menu-has-children"><a href="index.php#about">Sobre Nós</a>
            <ul>
              <li><a href="index.php#about">Institucional</a></li>
              <li><a href="index.php#cd-timeline">Nossa história</a></li>
              <li><a href="index.php#facts">Nossos números</a></li>
              <li><a href="index.php#clients">Clientes</a></li>
            </ul>
          </li>
         <li class="menu-has-children"><a href="services.php">Serviços</a>
            <ul>
              <?php 
                $query = "SELECT * FROM services ORDER BY TITLE";
                $select_services = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($select_services)) {    
                    $service_title = $row['TITLE']; ?>

                <li><a href="services.php"><?php echo $service_title; ?></a></li>
                    <!--<li><a href="services.php">Consultoria e Acessoria</a></li>
                    <li><a href="services.php">Equipe de Resgate em altura e espaço confinado</a></li>
                    <li><a href="services.php">Fornecimento de mão-de-obra especialiazada em SMS</a></li>
                    <li><a href="services.php">Limpeza Aérea/Limpeza e manutenção de Telhados</a></li>
                    <li><a href="services.php">Limpeza de Resíduos Químicos</a></li>
                    <li><a href="services.php">Trabalho em Altura</a></li>
                    <li><a href="services.php">Tratamento ST3 pintura</a></li>
                    <li><a href="services.php">Serviços em espaço confinado</a></li>
                    <li><a href="services.php">Manutenção Industrial/Limpeza de silos e tanques</a></li>-->
              <?php } ?>
             </ul> 
          </li>
          <li><a href="blog-main-page.php">Novidades</a></li>
          <li><a href="index.php#contact">Contato</a></li>
          <li><a href="login.php"><i class="material-icons">vpn_key</i></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->