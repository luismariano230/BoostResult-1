<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Aluno.php";
    include_once "../dao/AlunoDAO.php";


    $aluno = new Aluno();
    $alunoDAO	= new AlunoDAO();
    


    $a= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $alunos = $alunoDAO->buscar("id_aluno",$_GET['pesquisa']);  
    }
    else{
      $alunos = $alunoDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

		$aluno->setId_user($a['id_user']);
        $alunoDAO->inserir($aluno);

    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $aluno->setId_aluno($a['id_aluno']); 

		$aluno->setId_user($a['id_user']);
        $alunoDAO->atualizar($aluno);

        header("Location: ../../aluno.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $aluno->setId_aluno($_GET['deletar']);

        $alunoDAO->deletar($aluno);

        header("Location: ../../aluno.php?msg=apagado");
    }else{
        header("Location: ../../aluno.php?msg=erro");
    }

   