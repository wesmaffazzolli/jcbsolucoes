<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Novidades
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
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Imagem</th>
                        <th>Destaque</th>
                        <th>Criado em</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php                                
		            $query = "SELECT * FROM posts ORDER BY FEATURED = 'DP' DESC, FEATURED, STATUS, CREATION_DATE DESC, UPDATE_DATE DESC";
		            $select_posts = mysqli_query($connection, $query); 

		            while($row = mysqli_fetch_assoc($select_posts)) {

		                $post_id = $row['ID'];

		                if(strlen($row['TITLE']) > 30) {
		                	$post_title = substr($row['TITLE'], 0, 30)."...";
		                } else {
		                	$post_title = $row['TITLE'];
		                }

		               	if(strlen($row['AUTHOR']) > 20) {
		                	$post_author = substr($row['AUTHOR'], 0, 20)."...";
		                } else {
		                	$post_author = $row['AUTHOR'];
		                }

		                $post_category_id = $row['CATEGORY_ID'];    
		                $post_status = $row['STATUS'];
		                $post_image = $row['IMAGE'];
		                $post_featured = $row['FEATURED'];
		                $post_content = $row['CONTENT'];    

						/* Format Date */
		                $date = new DateTime($row['CREATION_DATE']);
                        $post_creation_date = $date->format('d/m/Y H:i');

		               	/* Format Date */
                        $date = new DateTime($row['UPDATE_DATE']);
                        $post_update_date = $date->format('d/m/Y H:i');

		                $post_update_username = $row['UPDATE_USERNAME'];


		                /* Preenchimento das linhas e colunas */
		                echo "<tr>";
		                if(isset($post_title) && !empty($post_title)) {echo "<td>{$post_title}</td>";} else {echo "<td>Título vazio.</td>" ;}
		                if(isset($post_author) && !empty($post_author)) {echo "<td>{$post_author}</td>";} else {echo "<td>Autor vazio.</td>" ;}
		                
		                if(isset($post_category_id) && !empty($post_category_id)) {
		                //Descrição da categoria ao invés do código
		                $query = "SELECT * FROM categories WHERE ID = $post_category_id ";
		                $select_categories_id = mysqli_query($connection, $query); 
		                while($row = mysqli_fetch_assoc($select_categories_id)) { 
			                $cat_id = $row['ID'];
			                $cat_title = $row['TITLE'];                
			                echo "<td>{$cat_title}</td>"; } 
			            }else {echo "<td>Sem categoria.</td>" ;} 

		                if(isset($post_status) && !empty($post_status)) {
		                //Descrição do Status
		                if($post_status == 'A') {
		                	$post_status = "Ativo";
		                } else {
		                	$post_status = "Inativo";
		                }
		                echo "<td>{$post_status}</td>";
		                } else {echo "<td>Status vazio.</td>" ;}
		            
    		                echo "<td>
                            <img id='myImg' class='myImg' src='../img/novidades/{$post_image}' alt='{$post_title} - {$post_content}' style='width: 200px;'>
                                </td>";

		                if(isset($post_featured) && !empty($post_featured)) {
		                //Descrição do Destaque Principal
		                if($post_featured == 'DP') {
		                	$post_featured = "Destaque Principal";
		                } else if($post_featured == 'D1') {
		                	$post_featured = "Destaque 1";
		                } else if($post_featured == 'D2') {
		                	$post_featured = "Destaque 2";
		                } else {
		                	$post_featured = "Sem destaque";
		                }
		                echo "<td>{$post_featured}</td>";
		                } else {echo "<td>Destaque vazio.</td>" ;}

		            	echo "<td>{$post_creation_date}</td>";

		            	if(isset($post_update_date) && !empty($post_update_date) && isset($post_update_username) && !empty($post_update_username)) {
		            		echo "<td>{$post_update_date} por {$post_update_username}</td>";	
		            	} else {
		            		echo "<td>===//===</td>";
		            	}
		                
		                echo "<td><ul class='lista-no-style'>
	                	<li class='link-no-style'><a class='link-crud' href='novidades.php?source=editar&p_id={$post_id}'>Editar</a>";
                        echo "<li class='link-no-style'><a class='link-crud' href='novidades.php?source=delete&p_id={$post_id}'>Excluir</a>";    	

                        if($post_status == 'Ativo'){
                        	echo "<li class='link-no-style'><a class='link-crud' href='novidades.php?source=trocar_status&p_id={$post_id}&status={$post_status}'>Inativar</a></li>";                       
                        } else {
                        	echo "<li class='link-no-style'><a class='link-crud' href='novidades.php?source=trocar_status&p_id={$post_id}&status={$post_status}'>Ativar</a></li>";                  
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