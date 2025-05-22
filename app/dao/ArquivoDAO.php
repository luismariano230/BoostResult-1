<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class ArquivoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_arq){
        try {
			$sql = 'SELECT * FROM arquivo WHERE id_arq = :id_arq';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_arq",$id_arq);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Arquivo <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM arquivo';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Arquivos <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM arquivo ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Arquivos <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM arquivo WHERE id_arq LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Arquivos <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Arquivo $arquivo){
        try {
			$sql = 'DELETE FROM arquivo WHERE id_arq = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$arquivo->getid_arq());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Arquivo <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Arquivo $arquivo){
        try {
			$sql = 'INSERT INTO arquivo (id_arq, id_msg, nome, arq, tipo) VALUES (:id_arq, :id_msg, :nome, :arq, :tipo)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_arq',$arquivo->getId_arq()); 
			$consulta->bindValue(':id_msg',$arquivo->getId_msg()); 
			$consulta->bindValue(':nome',$arquivo->getNome()); 
			$consulta->bindValue(':arq',$arquivo->getArq()); 
			$consulta->bindValue(':tipo',$arquivo->getTipo());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Arquivo <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Arquivo $arquivo){
        try {
			$sql = 'UPDATE arquivo SET id_arq = :id_arq, id_msg = :id_msg, nome = :nome, arq = :arq, tipo = :tipo WHERE id_arq = :id_arq';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_arq',$arquivo->getId_arq()); 
			$consulta->bindValue(':id_msg',$arquivo->getId_msg()); 
			$consulta->bindValue(':nome',$arquivo->getNome()); 
			$consulta->bindValue(':arq',$arquivo->getArq()); 
			$consulta->bindValue(':tipo',$arquivo->getTipo());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Arquivo <br>" . $e . '<br>';
        }
	}
}