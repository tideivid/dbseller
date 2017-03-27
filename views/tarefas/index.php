<?php   require_once '../../assets/template/header.php'; ?>
	 <div id="wrapper">
	 <?php   require_once '../../assets/template/menu.php'; ?>
	 	<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-status">
                    	<h1>Tarefas</h1>
                        <div class="opcoes">
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_cadastro">Adicionar</button>
                        </div>
                        <ul class="lista_tarefas sortable" id="lista1">
                        </ul>
                    </div>
                    <div class="col-lg-4 col-status">
                    	<h1>Andamento</h1>
                        <ul class="lista_tarefas sortable" id="lista2">
                        </ul>
                    </div>   
                    <div class="col-lg-4 col-status">
                    	<h1>Concluido</h1>
                        <ul class="lista_tarefas sortable" id="lista3">
                        </ul>
                    </div>
                </div>
            </div>
	 	</div>
          <!-- Modal -->
        <?php require_once '../../assets/template/modal.php'; ?>
	 </div>

<?php   require_once '../../assets/template/footer.php'; ?>