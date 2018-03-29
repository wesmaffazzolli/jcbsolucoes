<?php include "includes/admin_header.php"; ?>    
    <div id="wrapper">

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Controle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
				<?php 

				if(isset($_GET['source'])) {
					$option = escape($_GET['source']);

					switch ($option) {
						case 'adicionar':
							include "pages/adicionar_novidade.php";
							break;
						case 'editar':
							include "pages/editar_novidade.php";
							break;
						case 'delete':
				            $the_post_id = escape($_GET['p_id']);
				            $query = "DELETE FROM posts WHERE ID = {$the_post_id} ";
				            $delete_query = mysqli_query($connection, $query);
				            confirmQuery($delete_query);

						    header("Location: novidades.php"); 
						    break;
						case 'trocar_status':
							$the_post_id = escape($_GET['p_id']);
				            $the_status = escape($_GET['status']);

				            if($the_status == 'Ativo'){
				            	$query = "UPDATE posts SET ";
					        	$query .= "STATUS = 'I' ";  
					            $query .= "WHERE ID = '{$the_post_id}' ";
				            } else {
					           	$query = "UPDATE posts SET ";
					        	$query .= "STATUS = 'A' ";  
					            $query .= "WHERE ID = '{$the_post_id}' ";
				            }

				           	$change_status_post_query = mysqli_query($connection, $query);
				            confirmQuery($change_status_post_query);
				            
						    header("Location: novidades.php?source=listar"); 
						break;
						default:
							include "pages/listar_novidades.php";
							break;
					}
				} else {
					include "pages/listar_novidades.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
