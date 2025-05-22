<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class SolicitacaoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_solicitacao){
        try {
			$sql = 'SELECT * FROM solicitacao WHERE id_solicitacao = :id_solicitacao';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_solicitacao",$id_solicitacao);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Solicitacao <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM solicitacao';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Solicitacaos <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM solicitacao ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Solicitacaos <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM solicitacao WHERE id_solicitacao LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Solicitacaos <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Solicitacao $solicitacao){
        try {
			$sql = 'DELETE FROM solicitacao WHERE id_solicitacao = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$solicitacao->getid_solicitacao());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Solicitacao <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Solicitacao $solicitacao){
        try {
			$sql = 'INSERT INTO solicitacao (id_solicitacao, id_aluno, id_personal, data, status) VALUES (:id_solicitacao, :id_aluno, :id_personal, :data, :status)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_solicitacao',$solicitacao->getId_solicitacao()); 
			$consulta->bindValue(':id_aluno',$solicitacao->getId_aluno()); 
			$consulta->bindValue(':id_personal',$solicitacao->getId_personal()); 
			$consulta->bindValue(':data',$solicitacao->getData()); 
			$consulta->bindValue(':status',$solicitacao->getStatus());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Solicitacao <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Solicitacao $solicitacao){
        try {
			$sql = 'UPDATE solicitacao SET id_solicitacao = :id_solicitacao, id_aluno = :id_aluno, id_personal = :id_personal, data = :data, status = :status WHERE id_solicitacao = :id_solicitacao';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_solicitacao',$solicitacao->getId_solicitacao()); 
			$consulta->bindValue(':id_aluno',$solicitacao->getId_aluno()); 
			$consulta->bindValue(':id_personal',$solicitacao->getId_personal()); 
			$consulta->bindValue(':data',$solicitacao->getData()); 
			$consulta->bindValue(':status',$solicitacao->getStatus());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Solicitacao <br>" . $e . '<br>';
        }
	}
}