<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Chat.php";
    include_once "../dao/ChatDAO.php";


    $chat = new Chat();
    $chatDAO	= new ChatDAO();


    $c= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $chats = $chatDAO->buscar("id_chat",$_GET['pesquisa']);  
    }
    else{
      $chats = $chatDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $chat->setId_chat($c['id_chat']); 
		$chat->setId_solicitacao($c['id_solicitacao']); 
		$chat->setData($c['data']);
        $chatDAO->inserir($chat);

        header("Location: ../../chat.php?msg=adicionado");
    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $chat->setId_chat($c['id_chat']); 
		$chat->setId_solicitacao($c['id_solicitacao']); 
		$chat->setData($c['data']);
        $chatDAO->atualizar($chat);

        header("Location: ../../chat.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $chat->setId_chat($_GET['deletar']);

        $chatDAO->deletar($chat);

        header("Location: ../../chat.php?msg=apagado");
    }else{
        header("Location: ../../chat.php?msg=erro");
    }

   