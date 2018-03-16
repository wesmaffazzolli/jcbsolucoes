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

                    //Listagem das imagens do início                    
		            $query = "SELECT CLIENTES_ID, IMG_PATH, GRUPO, POSITION, UPDATE_DATE, UPDATE_USERNAME FROM clientes ORDER BY GRUPO, POSITION";

		            $select_clients = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_clients)) {
                        $clients_id = $row['CLIENTES_ID'];
                        $clients_img = $row['IMG_PATH'];
                        $clients_group = $row['GRUPO'];
                        $clients_position = $row['POSITION'];
                        $clients_update_date = $row['UPDATE_DATE'];
                        $clients_update_username = $row['UPDATE_USERNAME'];

		                echo "<tr>";
                        if(isset($clients_img)) {
    		                echo "<td>
                                    <img id='myImg' class='myImg' src='../img/clients/{$clients_img}' style='width: 300px;'>

                                        <span id='myId' value='{$clients_position}'></span>

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

                        if(isset($clients_group)) {echo "<td>{$clients_group}</td>";} else {echo "<td>Grupo vazio.</td>" ;}
                        if(isset($clients_position)) {echo "<td>{$clients_position}</td>";} else {echo "<td>Ordem de exibição vazia.</td>" ;}
                        if(isset($clients_update_date) && isset($clients_update_username)) {echo "<td>{$clients_update_date} por {$clients_update_username}</td>";} else {echo "<td>Última atualização vazia.</td>" ;}

                            echo "<td><a href='clientes.php?source=editar&c_id={$clients_id}>Editar</a>
                                    &nbsp;&nbsp;";
                            echo "<td><a href='clientes.php?source=delete&c_id={$home_id}'>Excluir</a>
                                    &nbsp;&nbsp;";
                            echo "<a href='#' id='botaoModal'>Ver Imagem</a></td>"; 

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