<?php

if(isset($_GET['source'])) { 

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Clientes
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
                        <th>Imagem Cliente</th>
                        <th>Grupo</th>
                        <th>Ordem de Exibição</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    

                    //Listagem dos clientes                
		            $query = "SELECT CLIENTS_ID, IMG_PATH, GRUPO, POSITION, CREATION_DATE, UPDATE_DATE, UPDATE_USERNAME FROM clients ORDER BY GRUPO, POSITION";

		            $select_clients = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_clients)) {
                        $clients_id = $row['CLIENTS_ID'];
                        $clients_img = $row['IMG_PATH'];
                        $clients_group = $row['GRUPO'];
                        $clients_position = $row['POSITION'];
                        $clients_update_date = $row['UPDATE_DATE'];
                        $clients_update_username = $row['UPDATE_USERNAME'];

                        /* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $clients_update_date = $date->format('d/m/Y H:i');

                        $clients_update_username = $row['UPDATE_USERNAME'];

                        if(isset($clients_img) && !empty($clients_img)) {
                            echo "<td>
                            <img id='myImg' class='myImg' src='../img/clients/{$clients_img}' style='width: 300px;'>
                                </td>";

                        } else {echo "<td>Imagem vazia.</td>";}

                        if(isset($clients_group) && !empty($clients_group)) {echo "<td>{$clients_group}</td>";} else {echo "<td>Grupo vazio.</td>" ;}
                        if(isset($clients_position) && !empty($clients_position)) {echo "<td>{$clients_position}</td>";} else {echo "<td>Ordem de exibição vazia.</td>" ;}
                        if(isset($clients_update_date) && !empty($clients_update_date) && isset($clients_update_username) && !empty($clients_update_username)) {echo "<td>{$clients_update_date} por {$clients_update_username}</td>";} else {echo "<td>===//===" ;}

                        echo "<td><ul class='lista-no-style'>
                        <li class='link-no-style'><a class='link-crud' href='clientes.php?source=editar&c_id={$clients_id}'>Editar</a></li>
                        <li class='link-no-style'><a class='link-crud' href='clientes.php?source=delete&c_id={$clients_id}'>Excluir</a></li>";
		                echo "</ul></td></tr>"; 

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