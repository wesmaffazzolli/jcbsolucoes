<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Novidades Cadastradas
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Imagem</th>
                        <th>Destaque</th>
                        <th>Tags</th>
                        <th>Última Atualização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>

		            <?php                                
		            $query = "SELECT * FROM posts";
		            $select_posts = mysqli_query($connection, $query); 

		            while($row = mysqli_fetch_assoc($select_posts)) {
		                $post_id = $row['ID'];    
		                $post_title = $row['TITLE'];
		                $post_author = $row['AUTHOR'];
		                $post_category_id = $row['CATEGORY_ID'];    
		                $post_status = $row['STATUS'];
		                $post_image = $row['IMAGE'];
		                $post_featured = $row['FEATURED'];
		                $post_content = $row['CONTENT'];
		                $post_tags = $row['TAGS'];    
		                $post_creation_date = $row['CREATION_DATE'];
		                $post_update_date = $row['UPDATE_DATE'];
		                $post_update_username = $row['UPDATE_USERNAME'];

		                echo "<tr>";
		                echo "<td>{$post_title}</td>";
		                echo "<td>{$post_author}</td>";
		                
		                //Descrição da categoria ao invés do código
		                $query = "SELECT * FROM categories WHERE ID = $post_category_id ";
		                $select_categories_id = mysqli_query($connection, $query); 
		                while($row = mysqli_fetch_assoc($select_categories_id)) { 
		                $cat_id = $row['ID'];
		                $cat_title = $row['TITLE'];                
		                echo "<td>{$cat_title}</td>"; } 

		                //Descrição do Status
		                if($post_status == 'A') {
		                	$post_status = "Ativo";
		                } else {
		                	$post_status = "Inativo";
		                }
		                echo "<td>{$post_status}</td>";
		                //

		                echo "<td><img width='100' src='../img/novidades/{$post_image}' alt='image'></td>";

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
		                //

		                echo "<td>{$post_tags}</td>";
		                echo "<td>{$post_update_date} por {$post_update_username}</td>";
		                echo "<td><a href='novidades.php?source=editar&p_id={$post_id}'>Editar</a>&nbsp;&nbsp;&nbsp;<a href='novidades.php?source=delete&p_id={$post_id}'>Excluir</a>";
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