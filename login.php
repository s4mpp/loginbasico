<?php
try
{
	//Verificar se recebeu algum POST
	if($_POST)
	{
		session_start();

		//Se o e-mail esta vazio
		if(empty($_POST['email']))
		{
			throw new Exception('Digite seu e-mail', true);
		}

		//Se a senha está vazia
		if(empty($_POST['senha']))
		{
			throw new Exception('Digite sua senha', true);
		}

		//Tentando buscar o suuario no banco
		require "config.php";
		$conf = new Conf();
		$email = $_POST['email'];
		$pass = md5($_POST['pass']);
		$conf->select("users", array("email"=>$email,"pass"=>$pass));
		$_SESSION = $conf->resultArray();

		//Obtendo o reusltado
		$result = $conf->resultRowCount();

		//Verificando resultado
		if(!$result)
		{
			throw new Exception('Usuário ou senha inválidos. Verifique', true);
		}

		//Se chegou até aqui, esta tudo correto. Podemos fazer o login.
		header('Location: DGP.php');
		exit;
	}
}
catch(Exception $e)
{
	//Qualquer erro que ocorrer nas verificações acima, sera mostrado aqui.
	echo 'Erro no login: '.$e->getMessage();
}
