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
                        <th>Título</th>
                        <th>Texto</th>
                        <th>Imagem</th>
                        <th>Status</th>
                        <th>Posição no Slider</th>
                        <th>URL Botão "Saiba Mais"</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    
                
		            $query = "SELECT INICIO_ID, TITLE, DESCR, STATUS, POSITION, IMG_PATH, URL, UPDATE_DATE, UPDATE_USERNAME ";
                    $query .="FROM inicio ";
                    $query .="ORDER BY POSITION ";

		            $select_imagens_inicio = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_imagens_inicio)) {
                        $home_id = $row['INICIO_ID'];
                        $home_title = substr($row['TITLE'], 0, 255);
                        $home_descr = substr($row['DESCR'], 0, 255)."...";
                        $home_url = $row['URL'];

                        $home_status = $row['STATUS'];
                        if($home_status == 'A') {
                            $home_status_descr = 'Ativo';
                        } else {
                            $home_status_descr = 'Inativo';
                        }

                        $home_position = $row['POSITION'] + 1;
		                $home_image_path = $row['IMG_PATH'];
                        $home_update_username = $_SESSION['username'];

                        /* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $home_update_date = $date->format('d/m/Y H:i');

		                echo "<tr>";
		                if(isset($home_title) && !empty($home_title)) {echo "<td>{$home_title}</td>";} else {echo "<td>Título vazio.</td>" ;}
                        if(isset($home_descr) && !empty($home_descr)) {echo "<td>{$home_descr}</td>";} else {echo "<td>Texto vazio.</td>" ;}
                        if(isset($home_image_path) && !empty($home_image_path)) {
    		                echo "<td>
                            <img id='myImg' class='myImg' src='../img/intro-carousel/{$home_image_path}' alt='{$home_title} - {$home_descr}' style='width: 300px;'>
                                </td>";

                        } else {echo "<td>Imagem vazia.</td>";}

                        echo "<td>{$home_status_descr}</td>";

                        echo "<td>{$home_position}</td>";

                        if(isset($home_url) && !empty($home_url)) {echo "<td><a class='link-crud' href='http://{$home_url}'>Ver redirecionamento</a></td>";} else {echo "<td>Sem direcionamento.</td>" ;}

                        if(isset($home_update_date) && !empty($home_update_date) && isset($home_update_username) && !empty($home_update_username)) {echo "<td>{$home_update_date} por {$home_update_username}</td>";} else {echo "<td>===//===</td>" ;}

                        echo "<td><ul class='lista-no-style'>
                                <li class='link-no-style'><a class='link-crud' href='imagens_inicio.php?source=editar&h_id={$home_id}'>Editar</a></li>";

                        if(!empty($home_image_path)) {
                            if($home_status == 'A') {
                                echo "<li class='link-no-style'><a class='link-crud' href='imagens_inicio.php?source=trocar_status&h_id={$home_id}&status={$home_status}'>Inativar</a></li>";                                
                            } else {
                                echo "<li class='link-no-style'><a class='link-crud' href='imagens_inicio.php?source=trocar_status&h_id={$home_id}&status={$home_status}'>Ativar</a></li>";
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