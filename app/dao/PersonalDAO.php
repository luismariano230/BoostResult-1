<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class PersonalDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_personal){
        try {
			$sql = 'SELECT * FROM personal WHERE id_personal = :id_personal';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_personal",$id_personal);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Personal <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM personal';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Personals <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM personal ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Personals <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM personal WHERE id_personal LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Personals <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Personal $personal){
        try {
			$sql = 'DELETE FROM personal WHERE id_personal = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$personal->getid_personal());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Personal <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Personal $personal){
        try {
			$sql = 'INSERT INTO personal (id_personal, id_user, certf, avaliacao, especialidade) VALUES (:id_personal, :id_user, :certf, :avaliacao, :especialidade)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_personal',$personal->getId_personal()); 
			$consulta->bindValue(':id_user',$personal->getId_user()); 
			$consulta->bindValue(':certf',$personal->getCertf()); 
			$consulta->bindValue(':avaliacao',$personal->getAvaliacao()); 
			$consulta->bindValue(':especialidade',$personal->getEspecialidade());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Personal <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Personal $personal){
        try {
			$sql = 'UPDATE personal SET id_personal = :id_personal, id_user = :id_user, certf = :certf, avaliacao = :avaliacao, especialidade = :especialidade WHERE id_personal = :id_personal';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_personal',$personal->getId_personal()); 
			$consulta->bindValue(':id_user',$personal->getId_user()); 
			$consulta->bindValue(':certf',$personal->getCertf()); 
			$consulta->bindValue(':avaliacao',$personal->getAvaliacao()); 
			$consulta->bindValue(':especialidade',$personal->getEspecialidade());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Personal <br>" . $e . '<br>';
        }
	}
}