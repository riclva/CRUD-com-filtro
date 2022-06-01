<?php 

     class Professor {

          private $id;
          private $nome;
          private $materia;
          private $sexo;


          public function __get($atributo) {

              return $this->$atributo;     	   
          }

          public function __set($atributo, $valor) {

              $this->$atributo = $valor;     	   
          }

     }

?>