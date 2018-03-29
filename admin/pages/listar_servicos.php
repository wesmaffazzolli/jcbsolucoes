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
		                $service_content = substr($row['CONTENT'], 0, 255);

                        /* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $service_update_date = $date->format('d/m/Y H:i');

		                $service_update_username = $row['UPDATE_USERNAME'];

		                echo "<tr>";
		                echo "<td>{$service_title}</td>";
		                echo "<td>{$service_content}</td>";
                        if(isset($service_update_date) && !empty($service_update_date) && isset($service_update_username) && !empty($service_update_username)){
                            echo "<td>{$service_update_date} por {$service_update_username}</td>";
                        } else {echo "<td>===//===</td>";}
		                
		                echo "<td><ul class='lista-no-style'>
                        <li class='link-no-style'><a class='link-crud' href='servicos.php?source=editar&p_id={$service_id}'>Editar</a></li>
                        <li class='link-no-style'><a class='link-crud' href='servicos.php?source=delete&p_id={$service_id}'>Excluir</a></li>
                        </ul></td>";
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