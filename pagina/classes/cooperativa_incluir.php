<?php 
	include 'RepositorioCooperativa.php';
        include 'RepositorioUsuario.php';
        
           $usuario = new Usuario(
            null,
            filter_input(INPUT_POST,'email'),
            filter_input(INPUT_POST,'senha'),
            md5(filter_input(INPUT_POST,'senha')),
            filter_input(INPUT_POST,'nivel')
            );
           
            if(filter_input(INPUT_POST,'senha') !== null){
       $id = $repositorioUsuario -> cadastrarUsuario($usuario,null);
       }
	$cooperativa = new Cooperativa(
            NULL,
            filter_input(INPUT_POST,'nome'),
            filter_input(INPUT_POST,'endereco'),
            filter_input(INPUT_POST,'cidade'),
            filter_input(INPUT_POST,'uf'),
            filter_input(INPUT_POST,'telefone'),
            0,  
            $id
            );
		
	$repositorioCooperativa->cadastrarCooperativa($cooperativa,NULL);
        $escopo = "Cooperativa";
        $mensagem = "Cadastrada com sucesso!";
         include 'util/alerta.php';
?>