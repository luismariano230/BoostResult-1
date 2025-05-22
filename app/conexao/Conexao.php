<?php

class Conexao {
   
   public static $instance;

   private function __construct() {
       
   }

   public static function getConexao() {
       if (!isset(self::$instance)) {
           $servidor = "mysql-boostresult.alwaysdata.net";
           $usuario = "411254";
           $senha = "boostresult_userpass";
           $nomeDoBanco = "boostresult_db";

           try {
               self::$instance = new PDO(
                   "mysql:dbname=$nomeDoBanco;host=$servidor",
                   $usuario,
                   $senha,
                   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
               );

               self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
               self::$instance->exec("SET CHARACTER SET utf8");

               echo "Conexão realizada com sucesso.";
           } catch (PDOException $e) {
               
               echo "Erro ao conectar: " . $e->getMessage();
               self::$instance = null; 
           }
       }

       return self::$instance;
   }
}