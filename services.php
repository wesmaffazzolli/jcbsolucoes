<?php include "includes/navigation.php"; ?>

<?php   

  $query = "SELECT HEADER_IMG FROM services ";
  $select_services = mysqli_query($connection, $query); 

  $row = mysqli_fetch_array($select_services);
  $services_header_img = $row['HEADER_IMG'];    

?>

<!-- Header with Background Image -->
<header id="intro">
 <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">

         <div class="carousel-item active" style="background-image: url('img/servicos/<?php echo $services_header_img; ?>')">
          </div>

        </div>
      </div>
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- The Close Button -->
    <span class="close">&times;</span>
    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">
    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
  </div>
</header>

<section id="about">
      <div class="container">
          <header class="section-header">
               <h3>Serviços</h3>
          </header>
          <div class="row" style="padding-top: 50px;">
                 <div class="col-md-4">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <?php 

                          $query = "SELECT * FROM services ORDER BY TITLE LIMIT 1 ";
                          $select_first_ordered_title = mysqli_query($connection, $query); 

                          while($row = mysqli_fetch_assoc($select_first_ordered_title)) {
                            $the_first_service_id = $row['ID'];    
                          }

                          $query = "SELECT * FROM services ORDER BY TITLE ";
                          $select_services = mysqli_query($connection, $query); 

                          while($row = mysqli_fetch_assoc($select_services)) {
                            $service_id = $row['ID'];    
                            $service_title = $row['TITLE'];
                            $service_content = $row['CONTENT']; 

                          if($service_id == $the_first_service_id) {

                             echo "<a class='nav-link links active' id='v-pills-{$service_id}-tab' data-toggle='pill' href='#v-pills-{$service_id}' role='tab' aria-controls='v-pills-{$service_id}' aria-selected='true'>&rarr; {$service_title}</a>";

                           } else {

                             echo "<a class='nav-link links' id='v-pills-{$service_id}-tab' data-toggle='pill' href='#v-pills-{$service_id}' role='tab' aria-controls='v-pills-{$service_id}' aria-selected='true'>&rarr; {$service_title}</a>";

                          } } ?>

                      </div>
                 </div>
              <div class="col-md-8">
                  <div class="tab-content" id="v-pills-tabContent">

                    <?php 

                    $query = "SELECT * FROM services ORDER BY TITLE LIMIT 1 ";
                    $select_first_ordered_title = mysqli_query($connection, $query); 

                    while($row = mysqli_fetch_assoc($select_first_ordered_title)) {
                      $the_first_service_id = $row['ID'];    
                    }

                    $query = "SELECT * FROM services ORDER BY TITLE ";
                    $select_services = mysqli_query($connection, $query); 
                    while($row = mysqli_fetch_assoc($select_services)) {
                            $service_id = $row['ID'];    
                            $service_title = $row['TITLE'];
                            $service_content = $row['CONTENT']; 

                    if($service_id === $the_first_service_id) { ?>

                    <!-- Tabpanel com active -->
                    <div class='tab-pane fade show active' id="v-pills-<?php echo $service_id; ?>" role='tabpanel' aria-labelledby='v-pills-<?php echo $service_id; ?>-tab'>

                    <?php } else { ?>

                    <!-- Tabpanel sem active -->
                    <div class='tab-pane fade show' id="v-pills-<?php echo $service_id; ?>" role='tabpanel' aria-labelledby='v-pills-<?php echo $service_id; ?>-tab'>

                    <?php  } ?>

                      <!-- Conteúdo do serviço -->
                     <h2><?php echo $service_title; ?></h2>
                        <p style="text-align: justify;"><?php echo $service_content; ?></p>
                              <div class="row">
                                  <div class="col-sm-12 col-md-12">
                                    <p>Veja as imagens:</p>
                                    <?php 

                                    $query = "SELECT A.ID, A.IMG_PATH, B.TITLE FROM services_images A, services B ";
                                    $query .="WHERE A.SERVICES_ID = B.ID ";
                                    $query .="AND B.ID = $service_id ";

                                    $select_services_images = mysqli_query($connection, $query); 
                                    while($row = mysqli_fetch_assoc($select_services_images)) {
                                      $service_image_id = $row['ID'];
                                      $service_image_path = $row['IMG_PATH'];
                                      $service_image_title = $row['TITLE']; ?>

                                    <?php echo "<img id='myImg' class='myImg-services' src='img/servicos/{$service_image_path}' alt='{$service_image_title}'>"; ?>
                                  
                                    <?php } ?>
                               </div>
                            </div>
                      </div>

                   <?php } ?>

                  </div><!-- div tabel panel content -->
              </div> <!-- div segunda coluna -->
          </div> <!-- div row -->
    </div> <!-- div container -->
</section><!-- #about -->

<?php include "includes/footer.php"; ?>