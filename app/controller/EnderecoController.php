<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Endereco.php";
    include_once "../dao/EnderecoDAO.php";


    $endereco = new Endereco();
    $enderecoDAO	= new EnderecoDAO();


    $e= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $enderecos = $enderecoDAO->buscar("id_endereco",$_GET['pesquisa']);  
    }
    else{
      $enderecos = $enderecoDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $endereco->setId_endereco($e['id_endereco']); 
		$endereco->setId_user($e['id_user']); 
		$endereco->setPais($e['pais']); 
		$endereco->setEstado($e['estado']); 
		$endereco->setCidade($e['cidade']);
        $enderecoDAO->inserir($endereco);

        header("Location: ../../endereco.php?msg=adicionado");
    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $endereco->setId_endereco($e['id_endereco']); 
		$endereco->setId_user($e['id_user']); 
		$endereco->setPais($e['pais']); 
		$endereco->setEstado($e['estado']); 
		$endereco->setCidade($e['cidade']);
        $enderecoDAO->atualizar($endereco);

        header("Location: ../../endereco.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $endereco->setId_endereco($_GET['deletar']);

        $enderecoDAO->deletar($endereco);

        header("Location: ../../endereco.php?msg=apagado");
    }else{
        header("Location: ../../endereco.php?msg=erro");
    }

   