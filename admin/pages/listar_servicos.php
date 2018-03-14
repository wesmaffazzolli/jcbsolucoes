<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Serviços
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Data de Criação</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php                                
		            $query = "SELECT * FROM services";
		            $select_services = mysqli_query($connection, $query); 

		            while($row = mysqli_fetch_assoc($select_services)) {
		                $service_id = $row['ID'];    
		                $service_title = $row['TITLE'];
		                $service_content = substr($row['CONTENT'], 0, 200)."...";
		                $service_creation_date = $row['CREATION_DATE'];
		                $service_update_date = $row['UPDATE_DATE'];
		                $service_update_username = $row['UPDATE_USERNAME'];

		                echo "<tr>";
		                echo "<td>{$service_title}</td>";
		                echo "<td>{$service_content}</td>";
		                echo "<td>{$service_creation_date}</td>";
		                echo "<td>{$service_update_date} por {$service_update_username}</td>";
		                echo "<td><a href='servicos.php?source=editar&p_id={$service_id}'>Editar</a>&nbsp;&nbsp;<a href='servicos.php?source=delete&p_id={$service_id}'>Excluir</a>&nbsp;&nbsp;<a href='servicos.php?source=view_images&p_id={$service_id}'>Ver Imagens</a></td>";
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