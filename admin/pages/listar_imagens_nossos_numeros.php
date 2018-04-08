<?php

if(isset($_GET['source'])) { 

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Lista das Imagens do Slider Nossos Números
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Posição no Slider</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    
                
		            $query = "SELECT ID, STATUS, POSITION, IMG_PATH, UPDATE_DATE, UPDATE_USERNAME ";
                    $query .="FROM nossos_numeros_imagens ";
                    $query .="ORDER BY POSITION ";

		            $select_imagens_inicio = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_imagens_inicio)) {
                        $nossos_numeros_imagens_id = $row['ID'];

                        $nossos_numeros_imagens_status = $row['STATUS'];
                        if($nossos_numeros_imagens_status == 'A') {
                            $nossos_numeros_imagens_status_descr = 'Ativo';
                        } else {
                            $nossos_numeros_imagens_status_descr = 'Inativo';
                        }

                        $nossos_numeros_imagens_position = $row['POSITION'] + 1;
		                $nossos_numeros_imagens_image_path = $row['IMG_PATH'];
                        $nossos_numeros_imagens_update_username = $_SESSION['username'];

                        /* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $nossos_numeros_imagens_update_date = $date->format('d/m/Y H:i');

		                echo "<tr>";

                        if(isset($nossos_numeros_imagens_image_path) && !empty($nossos_numeros_imagens_image_path)) {
    		                echo "<td>
                            <img id='myImg' class='myImg' src='../img/nossos-numeros/{$nossos_numeros_imagens_image_path}' style='width: 300px;'>
                                </td>";

                        } else {echo "<td>Imagem vazia.</td>";}

                        echo "<td>{$nossos_numeros_imagens_status_descr}</td>";

                        echo "<td>{$nossos_numeros_imagens_position}</td>";

                        if(isset($nossos_numeros_imagens_update_date) && !empty($nossos_numeros_imagens_update_date) && isset($nossos_numeros_imagens_update_username) && !empty($nossos_numeros_imagens_update_username)) {echo "<td>{$nossos_numeros_imagens_update_date} por {$nossos_numeros_imagens_update_username}</td>";} else {echo "<td>===//===</td>" ;}

                        echo "<td><ul class='lista-no-style'>
                                <li class='link-no-style'><a class='link-crud' href='nossos_numeros.php?source=editar&img_id={$nossos_numeros_imagens_id}'>Editar</a></li>";

                        if(!empty($nossos_numeros_imagens_image_path)) {
                            if($nossos_numeros_imagens_status == 'A') {
                                echo "<li class='link-no-style'><a class='link-crud' href='nossos_numeros.php?source=trocar_status&img_id={$nossos_numeros_imagens_id}&status={$nossos_numeros_imagens_status}'>Inativar</a></li>";                                
                            } else {
                                echo "<li class='link-no-style'><a class='link-crud' href='nossos_numeros.php?source=trocar_status&img_id={$nossos_numeros_imagens_id}&status={$nossos_numeros_imagens_status}'>Ativar</a></li>";
                            }
                            
                        }      

		                echo "</ul></tr>";

		            } ?>

				</tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

<?php }  ?>