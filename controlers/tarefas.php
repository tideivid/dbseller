<?php

		if($_POST){
			switch ($_POST['op']) {
				case 'cadastrar':
						cadastrar($_POST);
					break;
				case 'editar':
						editar($_POST);
					break;
				case 'listar':
						listar();
			}	
		}

		if($_GET){
			switch ($_GET['op']) {
				case 'status':
						atualiza_lista($_GET);
					break;	
					case 'excluir':
						excluir($_GET);
					break;
			}	
		}

	function conecta(){
		require_once '../config/conexao.php';
	}

	function desconecta(){
		mysqli_close($GLOBALS['CON']);
	}


	function cadastrar($dados){
		$titulo  	= $dados['titulo'];
		$prazo  	= $dados['prazo'];
		$descricao 	= $dados['descricao'];
		$usuario	= $dados['id_usuario'];

		$sql = "INSERT INTO tarefa (titulo, prazo, descricao, usuario) VALUES('".$titulo."','".$prazo."','".$descricao."',".$usuario.")";
	    
	    conecta();
	    $result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

	    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
	    		$d = array(
					'sucesso' => TRUE
				);
	    }else{
	    		$d = array(
					'sucesso' => FALSE
				);
	    }

	    echo json_encode($d);
		desconecta();
	}

	function listar(){
		session_start();
		$sql = "SELECT id, titulo, prazo, descricao, usuario, status FROM tarefa WHERE usuario = ".$_SESSION['login']['id']." ORDER BY id DESC";
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

		$tarefa = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			while ($row = mysqli_fetch_array($result)) {
				array_push($tarefa, array(
					'id'		=>$row['id'], 
					'titulo'	=>$row['titulo'], 
					'prazo'		=>$row['prazo'], 
					'descricao'	=>$row['descricao'], 
					'usuario'	=>$row['usuario'],
					'status' 	=>$row['status']
				));
			}
		}
		echo json_encode($tarefa);
		desconecta();
	}

	function editar($dados){
		$id			= $dados['id'];
		$titulo  	= $dados['titulo'];
		$prazo  	= $dados['prazo'];
		$descricao 	= $dados['descricao'];
		$usuario	= $dados['id_usuario'];

		$sql = "UPDATE tarefa SET titulo='".$titulo."', prazo='".$prazo."', descricao = '".$descricao."', usuario = ".$usuario." WHERE id =".$id;
	    
	    conecta();
	    $result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

	    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
	    		$d = array(
					'sucesso' => TRUE
				);
	    }else{
	    		$d = array(
					'sucesso' => FALSE
				);
	    }

	    echo json_encode($d);
		desconecta();

	}

	function excluir($dados){

		$id	 = $dados['id'];

		$sql = "DELETE FROM tarefa WHERE id =".$id;
	    
	    conecta();
	    $result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

	    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
	    		$d = array(
					'sucesso' => TRUE
				);
	    }else{
	    		$d = array(
					'sucesso' => FALSE
				);
	    }

	    echo json_encode($d);
		desconecta();
	}

	function atualiza_lista($dados){

		$id			= $dados['id'];
		$status		= $dados['status'];

		$sql = "UPDATE tarefa SET status = '".$status."' WHERE id =".$id;
	    
	    conecta();
	    $result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error($GLOBALS['CON']));

	    if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
	    		$d = array(
					'sucesso' => TRUE
				);
	    }else{
	    		$d = array(
					'sucesso' => FALSE
				);
	    }

	    echo json_encode($d);
		desconecta();

	}

?>