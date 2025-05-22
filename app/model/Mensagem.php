<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Mensagem{
		//Atributos
		private $id_msg;
 		private $id_chat;
 		private $remetente;
 		private $texto;
 		private $data;
 				
		//Métodos Getters e Setters
		public function getId_msg(){
			return $this->id_msg;
		}
		public function getId_chat(){
			return $this->id_chat;
		}
		public function getRemetente(){
			return $this->remetente;
		}
		public function getTexto(){
			return $this->texto;
		}
		public function getData(){
			return $this->data;
		}
		
		public function setId_msg($id_msg){
			$this->id_msg=$id_msg;
		}
		public function setId_chat($id_chat){
			$this->id_chat=$id_chat;
		}
		public function setRemetente($remetente){
			$this->remetente=$remetente;
		}
		public function setTexto($texto){
			$this->texto=$texto;
		}
		public function setData($data){
			$this->data=$data;
		}
		
	}