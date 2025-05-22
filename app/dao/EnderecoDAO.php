<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class EnderecoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_endereco){
        try {
			$sql = 'SELECT * FROM endereco WHERE id_endereco = :id_endereco';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_endereco",$id_endereco);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Endereco <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM endereco';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Enderecos <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM endereco ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Enderecos <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM endereco WHERE id_endereco LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Enderecos <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Endereco $endereco){
        try {
			$sql = 'DELETE FROM endereco WHERE id_endereco = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$endereco->getid_endereco());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Endereco <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Endereco $endereco){
        try {
			$sql = 'INSERT INTO endereco (id_endereco, id_user, pais, estado, cidade) VALUES (:id_endereco, :id_user, :pais, :estado, :cidade)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_endereco',$endereco->getId_endereco()); 
			$consulta->bindValue(':id_user',$endereco->getId_user()); 
			$consulta->bindValue(':pais',$endereco->getPais()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':cidade',$endereco->getCidade());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Endereco <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Endereco $endereco){
        try {
			$sql = 'UPDATE endereco SET id_endereco = :id_endereco, id_user = :id_user, pais = :pais, estado = :estado, cidade = :cidade WHERE id_endereco = :id_endereco';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_endereco',$endereco->getId_endereco()); 
			$consulta->bindValue(':id_user',$endereco->getId_user()); 
			$consulta->bindValue(':pais',$endereco->getPais()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':cidade',$endereco->getCidade());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Endereco <br>" . $e . '<br>';
        }
	}
}