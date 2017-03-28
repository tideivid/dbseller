<?php   require_once '../../assets/template/header.php'; ?>
	 <div id="wrapper">
	 <?php   require_once '../../assets/template/menu.php'; ?>
	 	<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-status">
                    	<h1>Usuários</h1>
                        <div class="opcoes">
                             <button type="button" class="btn btn-default reset" data-toggle="modal" data-target="#modal_cadastro_usuario">Adicionar</button>
                        </div>
                        <table id="lista_usuarios">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Email</td>
                                    <td>Tipo</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
	 	</div>
          <!-- Modal -->
        <?php require_once '../../assets/template/modal.php'; ?>
	 </div>

<?php   require_once '../../assets/template/footer.php'; ?>