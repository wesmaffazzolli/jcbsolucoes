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
						case 'editar':
							include "pages/editar_plano_de_fundo.php";
							break;
						default:
							include "pages/nao_encontrado.php";
							break;
					}
				} else {
					include "pages/nao_encontrado.php";
				}

				?>
			</div>
			<!-- /#Row conteúod -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
