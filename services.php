<?php include "includes/services-navigation.php"; ?>

<?php   

  if(isset($_GET['s_id'])) {
    $the_service_id = $_GET['s_id'];
  } else {
    $query = "SELECT * FROM services ORDER BY TITLE LIMIT 1 ";
    $select_first_ordered_title = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_first_ordered_title)) {
      $the_service_id = $row['ID'];    
    }
  }

?>

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

  <?php 

  $query_img = "SELECT BACKGROUND_IMG FROM services  ";
  $select_background_services = mysqli_query($connection, $query_img); 
  $row = mysqli_fetch_array($select_background_services);
  $services_background_img = $row['BACKGROUND_IMG'];    

  ?>

<section id="servicos" style="background: url('img/<?php if(isset($services_background_img) && !empty($services_background_img)) {echo $services_background_img;} ?>') center top no-repeat fixed;"> 
      <div class="container">
          <header class="section-header">
               <h3>Serviços</h3>
          </header>
              <div class="row" style="padding-top: 50px;">
                 <div class="col-md-4">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <?php 

                          /*$query = "SELECT * FROM services ORDER BY TITLE LIMIT 1 ";
                          $select_first_ordered_title = mysqli_query($connection, $query); 

                          while($row = mysqli_fetch_assoc($select_first_ordered_title)) {
                            $the_first_service_id = $row['ID'];    
                          }*/

                          $query = "SELECT * FROM services ORDER BY TITLE ";
                          $select_services = mysqli_query($connection, $query); 

                          while($row = mysqli_fetch_assoc($select_services)) {
                            $service_id = $row['ID'];    
                            $service_title = $row['TITLE'];
                            $service_content = $row['CONTENT']; 

                          if($service_id == $the_service_id) {

                             echo "<a class='nav-link links active' id='v-pills-{$service_id}-tab' data-toggle='pill' href='#v-pills-{$service_id}' role='tab' aria-controls='v-pills-{$service_id}' aria-selected='true'>&rarr; {$service_title}</a>";

                           } else {

                             echo "<a class='nav-link links' id='v-pills-{$service_id}-tab' data-toggle='pill' href='#v-pills-{$service_id}' role='tab' aria-controls='v-pills-{$service_id}' aria-selected='true'>&rarr; {$service_title}</a>";

                          } } ?>

                      </div>
                 </div>
              <div class="col-md-8">
                  <div class="tab-content" id="v-pills-tabContent">

                    <?php 

                    /*$query = "SELECT * FROM services ORDER BY TITLE LIMIT 1 ";
                    $select_first_ordered_title = mysqli_query($connection, $query); 

                    while($row = mysqli_fetch_assoc($select_first_ordered_title)) {
                      $the_first_service_id = $row['ID'];    
                    }*/

                    $query = "SELECT * FROM services ORDER BY TITLE ";
                    $select_services = mysqli_query($connection, $query); 
                    while($row = mysqli_fetch_assoc($select_services)) {
                            $service_id = $row['ID'];    
                            $service_title = $row['TITLE'];
                            $service_content = $row['CONTENT']; 

                    if($service_id === $the_service_id) { ?>

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
                                  <div class="col-sm-8 col-md-8">
                                    <p>Veja as imagens:</p>

                                    <?php 

                                    $query = "SELECT A.ID, A.IMG_PATH, B.TITLE FROM services_images A, services B ";
                                    $query .="WHERE A.SERVICES_ID = B.ID ";
                                    $query .="AND B.ID = $service_id ";
                                    $query .="ORDER BY A.ID ";

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