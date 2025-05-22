<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class Registro_dadoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_dados){
        try {
			$sql = 'SELECT * FROM registro_dados WHERE id_dados = :id_dados';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_dados",$id_dados);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Registro_dado <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM registro_dados';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Registro_dados <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM registro_dados ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Registro_dados <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM registro_dados WHERE id_dados LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Registro_dados <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Registro_dado $registro_dado){
        try {
			$sql = 'DELETE FROM registro_dados WHERE id_dados = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$registro_dado->getid_dados());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Registro_dado <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Registro_dado $registro_dado){
        try {
			$sql = 'INSERT INTO registro_dados (id_dados, id_aluno, altura, data, peso, imc) VALUES (:id_dados, :id_aluno, :altura, :data, :peso, :imc)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_dados',$registro_dado->getId_dados()); 
			$consulta->bindValue(':id_aluno',$registro_dado->getId_aluno()); 
			$consulta->bindValue(':altura',$registro_dado->getAltura()); 
			$consulta->bindValue(':data',$registro_dado->getData()); 
			$consulta->bindValue(':peso',$registro_dado->getPeso()); 
			$consulta->bindValue(':imc',$registro_dado->getImc());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Registro_dado <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Registro_dado $registro_dado){
        try {
			$sql = 'UPDATE registro_dados SET id_dados = :id_dados, id_aluno = :id_aluno, altura = :altura, data = :data, peso = :peso, imc = :imc WHERE id_dados = :id_dados';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_dados',$registro_dado->getId_dados()); 
			$consulta->bindValue(':id_aluno',$registro_dado->getId_aluno()); 
			$consulta->bindValue(':altura',$registro_dado->getAltura()); 
			$consulta->bindValue(':data',$registro_dado->getData()); 
			$consulta->bindValue(':peso',$registro_dado->getPeso()); 
			$consulta->bindValue(':imc',$registro_dado->getImc());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Registro_dado <br>" . $e . '<br>';
        }
	}
}