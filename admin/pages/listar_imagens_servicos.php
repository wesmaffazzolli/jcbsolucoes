<?php

if(isset($_GET['source'])) { 

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Pesquisar Imagens do Serviço
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <p class="form-control-static">Selecione o serviço que deseja exibir as fotos e clique no botão pesquisar.</p>
            </div>

            <div class="form-group">
                <label for="service">Serviços: </label>
                <select name="service" id="">
                    <option value=""></option>
                    <?php 

                    $query = "SELECT * FROM services ORDER BY TITLE ";
                    $select_services = mysqli_query($connection, $query); 
                    confirmQuery($select_services);
                    while($row = mysqli_fetch_assoc($select_services)) { 
                        $service_id = $row['ID'];
                        $service_title = $row['TITLE'];

                        echo "<option value='{$service_id}'>{$service_title}</option>";
                    } 

                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="search_service_image" value="Pesquisar">
            </div>

        </form>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php 

if(isset($_POST['search_service_image']) || (isset($_GET['s_id']))) { 
    if(isset($_POST['service']) && $_POST['service'] != "" && !empty($_POST['service'])) { 
        $service_id_selected = $_POST['service']; 
    } else {
        //Retorno da página de edição via GET
        $service_id_selected = $_GET['s_id'];
    }

?>
<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Imagens
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Serviço</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    

                    //Listagem das imagens do serviço                            
		            $query = "SELECT A.ID, A.IMG_PATH, B.TITLE FROM services_images A, services B ";
                    $query .="WHERE A.SERVICES_ID = B.ID ";
                    $query .="AND B.ID = $service_id_selected ";

		            $select_services_images = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_services_images)) {
                        $service_image_id = $row['ID'];
		                $service_image_path = $row['IMG_PATH'];
		                $service_title = $row['TITLE'];

		                echo "<tr>";
		                echo "<td>{$service_title}</td>";
		                echo "<td>
                                <img id='myImg' src='../img/servicos/{$service_image_path}' alt='{$service_title}' style='width: 300px;'>
                                  <!-- The Modal -->
                                    <div id='myModal' class='modal'>

                                      <!-- The Close Button -->
                                      <span class='close'>&times;</span>

                                      <!-- Modal Content (The Image) -->
                                      <img class='modal-content' id='img01'>

                                      <!-- Modal Caption (Image Text) -->
                                      <div id='caption'></div>
                                    </div>
                                </td>";
		                echo "<td><a href='imagens_servicos.php?source=editar&img_id={$service_image_id}&s_id={$service_id_selected}'>Editar</a>&nbsp;&nbsp;<a href='imagens_servicos.php?source=delete&img_id={$service_image_id}'>Excluir</a>&nbsp;&nbsp;<a href='#' id='botaoModal' onClick='abreModal()'>Ver Imagem</a></td>";
		                echo "</tr>";

		            } ?>
				</tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php } } ?>