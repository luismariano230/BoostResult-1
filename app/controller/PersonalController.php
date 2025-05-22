<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Personal.php";
    include_once "../dao/PersonalDAO.php";


    $personal = new Personal();
    $personalDAO	= new PersonalDAO();


    $p= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $personals = $personalDAO->buscar("id_personal",$_GET['pesquisa']);  
    }
    else{
      $personals = $personalDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $personal->setId_personal($p['id_personal']); 
		$personal->setId_user($p['id_user']); 
		$personal->setCertf($p['certf']); 
		$personal->setAvaliacao($p['avaliacao']); 
		$personal->setEspecialidade($p['especialidade']);
        $personalDAO->inserir($personal);

        header("Location: ../../personal.php?msg=adicionado");
    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $personal->setId_personal($p['id_personal']); 
		$personal->setId_user($p['id_user']); 
		$personal->setCertf($p['certf']); 
		$personal->setAvaliacao($p['avaliacao']); 
		$personal->setEspecialidade($p['especialidade']);
        $personalDAO->atualizar($personal);

        header("Location: ../../personal.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $personal->setId_personal($_GET['deletar']);

        $personalDAO->deletar($personal);

        header("Location: ../../personal.php?msg=apagado");
    }else{
        header("Location: ../../personal.php?msg=erro");
    }

   