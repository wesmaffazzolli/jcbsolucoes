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
							include "pages/adicionar_timeline.php";
							break;
						case 'editar':
							include "pages/editar_timeline.php";
							break;
						case 'delete':
				            $the_timeline_id = escape($_GET['t_id']);
				            $query = "DELETE FROM timeline WHERE TIMELINE_ID = {$the_timeline_id} ";
				            $delete_timeline_query = mysqli_query($connection, $query);
				            confirmQuery($delete_timeline_query);

						    header("Location: timeline.php?source=listar"); 
						    break;
						case 'trocar_status':
							$the_timeline_id = escape($_GET['t_id']);
				            $the_timeline_status = escape($_GET['status']);

				            if($the_timeline_status == 'A'){
				            	$query = "UPDATE timeline SET ";
					        	$query .= "STATUS = 'I' ";  
					            $query .= "WHERE TIMELINE_ID = '{$the_timeline_id}' ";
				            } else {
					           	$query = "UPDATE timeline SET ";
					        	$query .= "STATUS = 'A' ";  
					            $query .= "WHERE TIMELINE_ID = '{$the_timeline_id}' ";
				            }

				           	$change_timeline_status_query = mysqli_query($connection, $query);
				            confirmQuery($change_timeline_status_query);
				            
						    header("Location: timeline.php?source=listar"); 
							break;
						default:
							include "pages/listar_timeline.php";
							break;
					}
				} else {
					include "pages/listar_timeline.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
