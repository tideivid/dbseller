<?php
	
	if($_POST){
		if($_POST['op']){
			login($_POST);
		}
	}

	if($_GET['logout']){
		logout();
	}

	function conecta(){
		require_once '../config/conexao.php';
	}

	function desconecta(){
		mysqli_close($GLOBALS['CON']);
	}
	


	function login($dados){
		$email = $dados['email'];
		$senha = sha1($dados['senha']);

		$sql = "SELECT id, nome, email, tipo FROM usuario WHERE email = '".$email."' AND senha ='".$senha."'";
		conecta();
		$result = mysqli_query($GLOBALS['CON'], $sql) or die (mysqli_error());

		$row = mysqli_fetch_array($result);

		if(mysqli_affected_rows($GLOBALS['CON']) == 1 ){
			session_start();
			$_SESSION['login'] = array(
					'id' 	=> $row['id'],
					'nome' 	=> $row['nome'],
					'email' => $row['email'],
					'tipo' 	=> $row['tipo']
				);
			header('Location: ../tarefas');
		}else{
			header('Location: ../login');
		}
		desconecta();
	}

	function logout(){
		session_start();
		$_SESSION['login'] = array();
		session_destroy();
		header('Location: login');

	}

?>