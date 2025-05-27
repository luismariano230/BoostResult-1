<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class Imagem_usuarioDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_img){
        try {
			$sql = 'SELECT * FROM imagem_usuario WHERE id_img = :id_img';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_img",$id_img);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Imagem_usuario <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM imagem_usuario';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Imagem_usuarios <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM imagem_usuario ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Imagem_usuarios <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM imagem_usuario WHERE id_img LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Imagem_usuarios <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Imagem_usuario $imagem_usuario){
        try {
			$sql = 'DELETE FROM imagem_usuario WHERE id_img = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$imagem_usuario->getid_img());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Imagem_usuario <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Imagem_usuario $imagem_usuario){
        try {
			$sql = 'INSERT INTO imagem_usuario (id_img, id_user, nome_arquivo, tipo, imagem) VALUES (:id_img, :id_user, :nome_arquivo, :tipo, :imagem)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_img',$imagem_usuario->getId_img()); 
			$consulta->bindValue(':id_user',$imagem_usuario->getId_user()); 
			$consulta->bindValue(':nome_arquivo',$imagem_usuario->getNome_arquivo()); 
			$consulta->bindValue(':tipo',$imagem_usuario->getTipo()); 
			$consulta->bindValue(':imagem',$imagem_usuario->getImagem());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Imagem_usuario <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Imagem_usuario $imagem_usuario){
        try {
			$sql = 'UPDATE imagem_usuario SET id_img = :id_img, id_user = :id_user, nome_arquivo = :nome_arquivo, tipo = :tipo, imagem = :imagem WHERE id_img = :id_img';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_img',$imagem_usuario->getId_img()); 
			$consulta->bindValue(':id_user',$imagem_usuario->getId_user()); 
			$consulta->bindValue(':nome_arquivo',$imagem_usuario->getNome_arquivo()); 
			$consulta->bindValue(':tipo',$imagem_usuario->getTipo()); 
			$consulta->bindValue(':imagem',$imagem_usuario->getImagem());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Imagem_usuario <br>" . $e . '<br>';
        }
	}
}