<?php

if(isset($_GET['source'])) { 

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Lista de histórias da Timeline
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Ano</th>
                        <th>Status</th>
                        <th>Texto</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php    

                    //Seleciona o maior ano das timelines
                    $query_max_year = "SELECT MAX(A.YEAR) AS MAX_YEAR FROM timeline A";
                    $select_max_year_timeline = mysqli_query($connection, $query_max_year); 
                    while($row = mysqli_fetch_assoc($select_max_year_timeline)) {
                        $timeline_max_year = $row['MAX_YEAR'];
                    }

                    //Seleciona o menor ano das timelines
                    $query_min_year = "SELECT MIN(A.YEAR) AS MIN_YEAR FROM timeline A";
                    $select_min_year_timeline = mysqli_query($connection, $query_min_year); 
                    while($row = mysqli_fetch_assoc($select_min_year_timeline)) {
                        $timeline_min_year = $row['MIN_YEAR'];
                    }                    

                    //Listagem das imagens do início                    
		            $query = "SELECT * FROM timeline ORDER BY YEAR";

		            $select_timeline = mysqli_query($connection, $query); 
		            while($row = mysqli_fetch_assoc($select_timeline)) {
                        $timeline_id = $row['TIMELINE_ID'];
                        $timeline_title = $row['TITLE'];
                        $timeline_year = $row['YEAR'];
                        $timeline_status = $row['STATUS'];
                        $timeline_content = $row['CONTENT'];

                        /* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $timeline_update_date = $date->format('d/m/Y H:i');

                        $timeline_update_username = $row['UPDATE_USERNAME'];

                        //Descrição do Status
                        if($timeline_status == 'A') {
                            $timeline_status_descr = 'Ativo';
                        } else {
                            $timeline_status_descr = 'Inativo';
                        }

		                echo "<tr>";
		                if(isset($timeline_title) && !empty($timeline_title)) {echo "<td>{$timeline_title}</td>";} else {echo "<td>Título vazio.</td>" ;}
                        if(isset($timeline_year) && !empty($timeline_year)) {echo "<td>{$timeline_year}</td>";} else {echo "<td>Ano vazio.</td>" ;}
                        if(isset($timeline_status_descr) && !empty($timeline_status_descr)) {echo "<td>{$timeline_status_descr}</td>";} else {echo "<td>Status vazio.</td>" ;}
                        if(isset($timeline_content) && !empty($timeline_content)) {echo "<td>{$timeline_content}</td>";} else {echo "<td>Texto vazio.</td>" ;}

                        if(isset($timeline_update_date) && !empty($timeline_update_date) && isset($timeline_update_username) && !empty($timeline_update_username)) {echo "<td>{$timeline_update_date} por {$timeline_update_username}</td>";} else {echo "<td>===//===</td>" ;}                        

                        echo "<td><ul class='lista-no-style'>";

                        echo"<li class='link-no-style'><a class='link-crud' href='timeline.php?source=editar&t_id={$timeline_id}'>Editar</a></li>";

                        if($timeline_year != $timeline_max_year && $timeline_year != $timeline_min_year) {                        
                        echo "<li class='link-no-style'><a class='link-crud' href='timeline.php?source=delete&t_id={$timeline_id}'>Excluir</a></li>";

                            if($timeline_status == 'A') {
                                echo "<li class='link-no-style'><a class='link-crud' href='timeline.php?source=trocar_status&t_id={$timeline_id}&status={$timeline_status}'>Inativar</a></li>";                                
                            } else {
                                echo "<li class='link-no-style'><a class='link-crud' href='timeline.php?source=trocar_status&t_id={$timeline_id}&status={$timeline_status}'>Ativar</a></li>";
                            }
                        }
                        echo "</ul></td>";
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