<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Imagem_usuario.php";
    include_once "../dao/Imagem_usuarioDAO.php";


    $imagem_usuario = new Imagem_usuario();
    $imagem_usuarioDAO	= new Imagem_usuarioDAO();


    $i= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $imagem_usuarios = $imagem_usuarioDAO->buscar("id_img",$_GET['pesquisa']);  
    }
    else{
      $imagem_usuarios = $imagem_usuarioDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $imagem_usuario->setId_img($i['id_img']); 
		$imagem_usuario->setId_user($i['id_user']); 
		$imagem_usuario->setNome_arquivo($i['nome_arquivo']); 
		$imagem_usuario->setTipo($i['tipo']); 
		$imagem_usuario->setImagem($i['imagem']);
        $imagem_usuarioDAO->inserir($imagem_usuario);

        header("Location: ../../imagem_usuario.php?msg=adicionado");
    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $imagem_usuario->setId_img($i['id_img']); 
		$imagem_usuario->setId_user($i['id_user']); 
		$imagem_usuario->setNome_arquivo($i['nome_arquivo']); 
		$imagem_usuario->setTipo($i['tipo']); 
		$imagem_usuario->setImagem($i['imagem']);
        $imagem_usuarioDAO->atualizar($imagem_usuario);

        header("Location: ../../imagem_usuario.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $imagem_usuario->setId_img($_GET['deletar']);

        $imagem_usuarioDAO->deletar($imagem_usuario);

        header("Location: ../../imagem_usuario.php?msg=apagado");
    }else{
        header("Location: ../../imagem_usuario.php?msg=erro");
    }

   