<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Registro_dado{
		//Atributos
		private $id_dados;
 		private $id_aluno;
 		private $altura;
 		private $data;
 		private $peso;
 		private $imc;
 				
		//Métodos Getters e Setters
		public function getId_dados(){
			return $this->id_dados;
		}
		public function getId_aluno(){
			return $this->id_aluno;
		}
		public function getAltura(){
			return $this->altura;
		}
		public function getData(){
			return $this->data;
		}
		public function getPeso(){
			return $this->peso;
		}
		public function getImc(){
			return $this->imc;
		}
		
		public function setId_dados($id_dados){
			$this->id_dados=$id_dados;
		}
		public function setId_aluno($id_aluno){
			$this->id_aluno=$id_aluno;
		}
		public function setAltura($altura){
			$this->altura=$altura;
		}
		public function setData($data){
			$this->data=$data;
		}
		public function setPeso($peso){
			$this->peso=$peso;
		}
		public function setImc($imc){
			$this->imc=$imc;
		}
		
	}