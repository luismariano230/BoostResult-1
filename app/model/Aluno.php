<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Aluno{
		//Atributos
		private $id_aluno;
 		private $id_user;
 				
		//Métodos Getters e Setters
		public function getId_aluno(){
			return $this->id_aluno;
		}
		public function getId_user(){
			return $this->id_user;
		}
		
		public function setId_aluno($id_aluno){
			$this->id_aluno=$id_aluno;
		}
		public function setId_user($id_user){
			$this->id_user=$id_user;
		}
		
	}