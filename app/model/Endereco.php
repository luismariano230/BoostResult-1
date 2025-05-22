<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Endereco{
		//Atributos
		private $id_endereco;
 		private $id_user;
 		private $pais;
 		private $estado;
 		private $cidade;
 				
		//Métodos Getters e Setters
		public function getId_endereco(){
			return $this->id_endereco;
		}
		public function getId_user(){
			return $this->id_user;
		}
		public function getPais(){
			return $this->pais;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function getCidade(){
			return $this->cidade;
		}
		
		public function setId_endereco($id_endereco){
			$this->id_endereco=$id_endereco;
		}
		public function setId_user($id_user){
			$this->id_user=$id_user;
		}
		public function setPais($pais){
			$this->pais=$pais;
		}
		public function setEstado($estado){
			$this->estado=$estado;
		}
		public function setCidade($cidade){
			$this->cidade=$cidade;
		}
		
	}