<?php include "header.php"; ?>
      
<!--==========================
    Header
============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!--<h1><a href="#intro" class="scrollto">BizPage</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php#intro"><img id="logo-site" class="my-logo" src="img/nova-logo-jcb-2.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php#intro">Início</a></li>
         <li class="menu-has-children"><a href="index.php#about">Sobre Nós</a>
            <ul>
              <li><a href="index.php#about">Institucional</a></li>
              <li><a href="index.php#cd-timeline">Nossa história</a></li>
              <li><a href="index.php#facts">Nossos números</a></li>
              <li><a href="index.php#clients">Clientes</a></li>
            </ul>
          </li>
         <li class="menu-has-children menu-active"><a href="services.php#servicos">Serviços</a>
            <ul>
              <?php 
                $query = "SELECT * FROM services ORDER BY TITLE";
                $select_services = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($select_services)) {    
                    $service_id = $row['ID'];
                    $service_title = $row['TITLE']; ?>

                <li><a href="services.php?s_id=<?php echo $service_id; ?>#servicos"><?php echo $service_title; ?></a></li>
              <?php } ?>
             </ul> 
          </li>
          <li><a href="blog-main-page.php">Novidades</a></li>
          <li><a href="index.php#contact">Contato</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->