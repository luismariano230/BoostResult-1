<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Solicitacao{
		//Atributos
		private $id_solicitacao;
 		private $id_aluno;
 		private $id_personal;
 		private $data;
 		private $status;
 				
		//Métodos Getters e Setters
		public function getId_solicitacao(){
			return $this->id_solicitacao;
		}
		public function getId_aluno(){
			return $this->id_aluno;
		}
		public function getId_personal(){
			return $this->id_personal;
		}
		public function getData(){
			return $this->data;
		}
		public function getStatus(){
			return $this->status;
		}
		
		public function setId_solicitacao($id_solicitacao){
			$this->id_solicitacao=$id_solicitacao;
		}
		public function setId_aluno($id_aluno){
			$this->id_aluno=$id_aluno;
		}
		public function setId_personal($id_personal){
			$this->id_personal=$id_personal;
		}
		public function setData($data){
			$this->data=$data;
		}
		public function setStatus($status){
			$this->status=$status;
		}
		
	}