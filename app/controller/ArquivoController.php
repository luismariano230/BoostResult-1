<?php   

    /* @Autor: Dalker Pinheiro
    Classe Controller */
    
    include_once "../conexao/Conexao.php";
    include_once "../model/Arquivo.php";
    include_once "../dao/ArquivoDAO.php";


    $arquivo = new Arquivo();
    $arquivoDAO	= new ArquivoDAO();


    $a= filter_input_array(INPUT_POST);

    // Verifica se pesquisaram alguma coisa.
    if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
      $arquivos = $arquivoDAO->buscar("id_arq",$_GET['pesquisa']);  
    }
    else{
      $arquivos = $arquivoDAO->listarTodos(); 
    }


    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $arquivo->setId_arq($a['id_arq']); 
		$arquivo->setId_msg($a['id_msg']); 
		$arquivo->setNome($a['nome']); 
		$arquivo->setArq($a['arq']); 
		$arquivo->setTipo($a['tipo']);
        $arquivoDAO->inserir($arquivo);

        header("Location: ../../arquivo.php?msg=adicionado");
    } 
    // se a requisição for editar
    else if(isset($_POST['editar'])){

        $arquivo->setId_arq($a['id_arq']); 
		$arquivo->setId_msg($a['id_msg']); 
		$arquivo->setNome($a['nome']); 
		$arquivo->setArq($a['arq']); 
		$arquivo->setTipo($a['tipo']);
        $arquivoDAO->atualizar($arquivo);

        header("Location: ../../arquivo.php?msg=editado");
    }
    // se a requisição for deletar
    else if(isset($_GET['deletar'])){

        $arquivo->setId_arq($_GET['deletar']);

        $arquivoDAO->deletar($arquivo);

        header("Location: ../../arquivo.php?msg=apagado");
    }else{
        header("Location: ../../arquivo.php?msg=erro");
    }

   