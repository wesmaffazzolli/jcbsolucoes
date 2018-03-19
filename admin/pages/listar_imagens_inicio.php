<?php

if(isset($_GET['source'])) { 

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Lista das Imagens do Início
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Texto</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Posição no Slider</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    

                    //Listagem das imagens do início                    
		            $query = "SELECT INICIO_ID, TITLE, DESCR, STATUS, POSITION, IMG_PATH ";
                    $query .="FROM inicio ";
                    $query .="ORDER BY POSITION ";

		            $select_imagens_inicio = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_imagens_inicio)) {
                        $home_id = $row['INICIO_ID'];
                        $home_title = $row['TITLE'];
                        $home_descr = $row['DESCR'];

                        $home_status = $row['STATUS'];
                        if($home_status == 'A') {
                            $home_status_descr = 'Ativo';
                        } else {
                            $home_status_descr = 'Inativo';
                        }

                        $home_position = $row['POSITION'];
		                $home_image_path = $row['IMG_PATH'];

		                echo "<tr>";
		                if(isset($home_title) && !empty($home_title)) {echo "<td>{$home_title}</td>";} else {echo "<td>Título vazio.</td>" ;}
                        if(isset($home_descr) && !empty($home_descr)) {echo "<td>{$home_descr}</td>";} else {echo "<td>Texto vazio.</td>" ;}
                        if(isset($home_image_path) && !empty($home_image_path)) {
    		                echo "<td>
                                    <img id='myImg' class='myImg' src='../img/intro-carousel/{$home_image_path}' alt='{$home_title}' style='width: 300px;'>

                                        <span id='myId' value='{$home_position}'></span>

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

                        } else {echo "<td>Imagem vazia.</td>";}

                        echo "<td>{$home_status_descr}</td>";

                        echo "<td>{$home_position}</td>";

                        echo "<td>
                                <a href='imagens_inicio.php?source=editar&h_id={$home_id}'>Editar</a>
                                &nbsp;&nbsp;";

                        if(!empty($home_image_path)) {
                            if($home_status == 'A') {
                                echo "<a href='imagens_inicio.php?source=trocar_status&h_id={$home_id}&status={$home_status}'>Inativar</a>
                                &nbsp;&nbsp;";                                
                            } else {
                                echo "<a href='imagens_inicio.php?source=trocar_status&h_id={$home_id}&status={$home_status}'>Ativar</a>
                                &nbsp;&nbsp;";
                            }
                            
                            echo "<a href='#' id='botaoModal'>Ver Imagem</a></td>";
                        }      

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

<?php }  ?>