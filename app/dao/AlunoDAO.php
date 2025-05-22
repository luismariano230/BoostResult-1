<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class AlunoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_aluno){
        try {
			$sql = 'SELECT * FROM aluno WHERE id_aluno = :id_aluno';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_aluno",$id_aluno);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Aluno <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM aluno';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Alunos <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM aluno ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Alunos <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM aluno WHERE id_aluno LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Alunos <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Aluno $aluno){
        try {
			$sql = 'DELETE FROM aluno WHERE id_aluno = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$aluno->getid_aluno());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Aluno <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Aluno $aluno){
        try {
			$sql = 'INSERT INTO aluno (id_user) VALUES (:id_user)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_user',$aluno->getId_user());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Aluno <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Aluno $aluno){
        try {
			$sql = 'UPDATE aluno SET id_aluno = :id_aluno, id_user = :id_user WHERE id_aluno = :id_aluno';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_aluno',$aluno->getId_aluno()); 

			$consulta->bindValue(':id_user',$aluno->getId_user());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Aluno <br>" . $e . '<br>';
        }
	}
}