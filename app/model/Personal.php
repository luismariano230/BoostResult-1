<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Personal{
		//Atributos
		private $id_personal;
 		private $id_user;
 		private $certf;
 		private $avaliacao;
 		private $especialidade;
 				
		//Métodos Getters e Setters
		public function getId_personal(){
			return $this->id_personal;
		}
		public function getId_user(){
			return $this->id_user;
		}
		public function getCertf(){
			return $this->certf;
		}
		public function getAvaliacao(){
			return $this->avaliacao;
		}
		public function getEspecialidade(){
			return $this->especialidade;
		}
		
		public function setId_personal($id_personal){
			$this->id_personal=$id_personal;
		}
		public function setId_user($id_user){
			$this->id_user=$id_user;
		}
		public function setCertf($certf){
			$this->certf=$certf;
		}
		public function setAvaliacao($avaliacao){
			$this->avaliacao=$avaliacao;
		}
		public function setEspecialidade($especialidade){
			$this->especialidade=$especialidade;
		}
		
	}