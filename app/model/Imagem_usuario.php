<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Imagem_usuario{
		//Atributos
		private $id_img;
 		private $id_user;
 		private $nome_arquivo;
 		private $tipo;
 		private $imagem;
 				
		//Métodos Getters e Setters
		public function getId_img(){
			return $this->id_img;
		}
		public function getId_user(){
			return $this->id_user;
		}
		public function getNome_arquivo(){
			return $this->nome_arquivo;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function getImagem(){
			return $this->imagem;
		}
		
		public function setId_img($id_img){
			$this->id_img=$id_img;
		}
		public function setId_user($id_user){
			$this->id_user=$id_user;
		}
		public function setNome_arquivo($nome_arquivo){
			$this->nome_arquivo=$nome_arquivo;
		}
		public function setTipo($tipo){
			$this->tipo=$tipo;
		}
		public function setImagem($imagem){
			$this->imagem=$imagem;
		}
		
	}