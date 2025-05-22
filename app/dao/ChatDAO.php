<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class ChatDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_chat){
        try {
			$sql = 'SELECT * FROM chat WHERE id_chat = :id_chat';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_chat",$id_chat);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Chat <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM chat';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Chats <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM chat ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Chats <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM chat WHERE id_chat LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Chats <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Chat $chat){
        try {
			$sql = 'DELETE FROM chat WHERE id_chat = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$chat->getid_chat());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Chat <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Chat $chat){
        try {
			$sql = 'INSERT INTO chat (id_chat, id_solicitacao, data) VALUES (:id_chat, :id_solicitacao, :data)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_chat',$chat->getId_chat()); 
			$consulta->bindValue(':id_solicitacao',$chat->getId_solicitacao()); 
			$consulta->bindValue(':data',$chat->getData());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Chat <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Chat $chat){
        try {
			$sql = 'UPDATE chat SET id_chat = :id_chat, id_solicitacao = :id_solicitacao, data = :data WHERE id_chat = :id_chat';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_chat',$chat->getId_chat()); 
			$consulta->bindValue(':id_solicitacao',$chat->getId_solicitacao()); 
			$consulta->bindValue(':data',$chat->getData());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Chat <br>" . $e . '<br>';
        }
	}
}