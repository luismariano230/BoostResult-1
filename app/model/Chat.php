<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Chat{
		//Atributos
		private $id_chat;
 		private $id_solicitacao;
 		private $data;
 				
		//Métodos Getters e Setters
		public function getId_chat(){
			return $this->id_chat;
		}
		public function getId_solicitacao(){
			return $this->id_solicitacao;
		}
		public function getData(){
			return $this->data;
		}
		
		public function setId_chat($id_chat){
			$this->id_chat=$id_chat;
		}
		public function setId_solicitacao($id_solicitacao){
			$this->id_solicitacao=$id_solicitacao;
		}
		public function setData($data){
			$this->data=$data;
		}
		
	}