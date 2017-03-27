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

		$nome  	= $dados['nome'];
		$email 	= $dados['email'];
		$senha	= md5($dados['senha']);
		$tipo	= $dados['tipo'];


		$sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES('".$nome."','".$email."','".$senha."','".$tipo."')";
		
		conecta();
		mysqli_query($GLOBALS['CON'], $sql);

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
		$sql = "SELECT id, nome, email, tipo FROM usuario ORDER BY id DESC";
		
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$usuario = array();

		if(mysqli_affected_rows($GLOBALS['CON']) > 0 ){
			while ($row = mysqli_fetch_array($result)) {
				array_push($usuario, array(
					'id'	=>$row['id'], 
					'nome'	=>$row['nome'], 
					'email'	=>$row['email'],
					'tipo'	=>$row['tipo']
				));
			}
		}
		echo json_encode($usuario);
		desconecta();
	}

	function editar($dados){
		$id		= $dados['id'];
		$nome  	= $dados['nome'];
		$email 	= $dados['email'];
		if(isset($dados['senha'])){
			$senha = sha1($dados['senha']);	
		}
		$tipo	= $dados['tipo'];

		$sql = "UPDATE usuario SET nome='".$nome."', email = '".$email."',";
		if(isset($dados['senha'])){
			$sql .= " senha ='".$senha."',";
		}
		$sql .= " tipo = '".$tipo."' WHERE id =".$id;
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

		$sql = "DELETE FROM usuario WHERE id =".$id;

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