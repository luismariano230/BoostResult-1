<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class MensagemDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_msg){
        try {
			$sql = 'SELECT * FROM mensagem WHERE id_msg = :id_msg';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_msg",$id_msg);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Mensagem <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM mensagem';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Mensagems <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM mensagem ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Mensagems <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM mensagem WHERE id_msg LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Mensagems <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Mensagem $mensagem){
        try {
			$sql = 'DELETE FROM mensagem WHERE id_msg = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$mensagem->getid_msg());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Mensagem <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Mensagem $mensagem){
        try {
			$sql = 'INSERT INTO mensagem (id_msg, id_chat, remetente, texto, data) VALUES (:id_msg, :id_chat, :remetente, :texto, :data)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_msg',$mensagem->getId_msg()); 
			$consulta->bindValue(':id_chat',$mensagem->getId_chat()); 
			$consulta->bindValue(':remetente',$mensagem->getRemetente()); 
			$consulta->bindValue(':texto',$mensagem->getTexto()); 
			$consulta->bindValue(':data',$mensagem->getData());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Mensagem <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Mensagem $mensagem){
        try {
			$sql = 'UPDATE mensagem SET id_msg = :id_msg, id_chat = :id_chat, remetente = :remetente, texto = :texto, data = :data WHERE id_msg = :id_msg';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_msg',$mensagem->getId_msg()); 
			$consulta->bindValue(':id_chat',$mensagem->getId_chat()); 
			$consulta->bindValue(':remetente',$mensagem->getRemetente()); 
			$consulta->bindValue(':texto',$mensagem->getTexto()); 
			$consulta->bindValue(':data',$mensagem->getData());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Mensagem <br>" . $e . '<br>';
        }
	}
}