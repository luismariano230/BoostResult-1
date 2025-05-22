<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Usuario{
		//Atributos
		private $id_user;

 		private $nome;

 		private $idade;

 		private $telefone;

 		private $email;

 		private $senha;

 		private $sexo;

 		private $tipo;
		private $desc;

 				
		//Métodos Getters e Setters
		public function getId_user(){
			return $this->id_user;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getIdade(){
			return $this->idade;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function getSexo(){
			return $this->sexo;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function getDesc(){
			return $this->tipo;
		}

		
		public function setId_user($id_user){
			$this->id_user=$id_user;
		}

		public function setNome($nome){
			$this->nome=$nome;
		}

		public function setIdade($idade){
			$this->idade=$idade;
		}

		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}

		public function setEmail($email){
			$this->email=$email;
		}

		public function setSenha($senha){
			$this->senha=$senha;
		}

		public function setSexo($sexo){
			$this->sexo=$sexo;
		}

		public function setTipo($tipo){
			$this->tipo=$tipo;
		}

		public function setDesc($desc){
			$this->desc=$desc;
		}

		
	}