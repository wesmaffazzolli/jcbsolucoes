<div class="panel panel-default">
    <div class="panel-heading">
        Listar Categorias
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
				<tbody>
		            <?php                                
					    $query = "SELECT * FROM categories";
					    $select_categories = mysqli_query($connection, $query); 

					    while($row = mysqli_fetch_assoc($select_categories)) {
					        $cat_id = $row['ID'];    
					        $cat_title = $row['TITLE'];

					        echo "<tr>";    
					        echo "<td>{$cat_title}</td>";
					        echo "<td><ul class='lista-no-style'><li class='link-no-style'><a class='link-crud' href='categorias.php?source=editar&p_id={$cat_id}'>Editar</a></li>
                            <li class='link-no-style'><a class='link-crud' href='categorias.php?source=delete&p_id={$cat_id}'>Excluir</a></li>
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