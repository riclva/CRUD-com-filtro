<?php 

    class ProfessorService {

         private $conexao;
         private $professor;

         

         public function __construct(Conexao $conexao, Professor $professor) {
                $this->conexao = $conexao->conectar();
                $this->professor = $professor;   
         }


         public function inserir() {
               
               $query = 'insert into professor(nome, materia, sexo)VALUES(:nome, :materia, :sexo)';
               $stmt = $this->conexao->prepare($query);
               $stmt->bindValue(':nome', $this->professor->__get('nome'));
               $stmt->bindValue(':materia', $this->professor->__get('materia'));
               $stmt->bindValue(':sexo', $this->professor->__get('sexo'));
               $stmt->execute();
            

          
                        
         }  

         public function consultar() {
               	$query = 'select * from professor';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
         }

         public function filtrar() {
               
               $query = null;  

       if ($this->professor->__get('nome') == 'Todos' && $this->professor->__get('materia') == 'Todos' && $this->professor->__get('sexo') == 'Todos') {
               
                 $query = 'select * from professor';

               } else if ($this->professor->__get('nome') == 'Todos' && $this->professor->__get('materia') == 'Todos' && $this->professor->__get('sexo') != 'Todos') {
                 $query = 'select * from professor where sexo = :sexo';
               } else if ($this->professor->__get('nome') == 'Todos' && $this->professor->__get('sexo') == 'Todos' && $this->professor->__get('materia') != 'Todos') {
                 $query = 'select * from professor where materia = :materia';
               } else if ($this->professor->__get('sexo') == 'Todos' && $this->professor->__get('materia') == 'Todos' && $this->professor->__get('nome') != 'Todos') {
                 $query = 'select * from professor where nome = :nome';
               } else if ($this->professor->__get('nome') == 'Todos' && $this->professor->__get('sexo') != 'Todos' && $this->professor->__get('materia') != 'Todos') {
                 $query = 'select * from professor where sexo = :sexo and materia = :materia';
               } else if ($this->professor->__get('sexo') == 'Todos' && $this->professor->__get('nome') != 'Todos' && $this->professor->__get('materia') != 'Todos') {
                 $query = 'select * from professor where nome = :nome and materia = :materia';
               } else if ($this->professor->__get('materia') == 'Todos' && $this->professor->__get('nome') != 'Todos' && $this->professor->__get('sexo') != 'Todos') {
                 $query = 'select * from professor where nome = :nome and sexo = :sexo';
               }

               
                $stmt = $this->conexao->prepare($query);
                            
     
               if ($query == 'select * from professor where sexo = :sexo') {
               
                $stmt->bindValue(':sexo', $this->professor->__get('sexo'));
                 

               } else if ($query == 'select * from professor where materia = :materia') {
                 
                $stmt->bindValue(':materia', $this->professor->__get('materia'));

               } else if ($query == 'select * from professor where nome = :nome') {
                 
                $stmt->bindValue(':nome', $this->professor->__get('nome'));

               } else if ($query == 'select * from professor where sexo = :sexo and materia = :materia') {
                 
                $stmt->bindValue(':sexo', $this->professor->__get('sexo'));
                $stmt->bindValue(':materia', $this->professor->__get('materia'));

               } else if ($query == 'select * from professor where nome = :nome and materia = :materia') {
                 
                $stmt->bindValue(':nome', $this->professor->__get('nome')); 
                $stmt->bindValue(':materia', $this->professor->__get('materia'));

               } else if($query == 'select * from professor where nome = :nome and sexo = :sexo') {
                 
                $stmt->bindValue(':nome', $this->professor->__get('nome'));  
                $stmt->bindValue(':sexo', $this->professor->__get('sexo'));

               } 

                
                
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
          
           
                
              
           }  
   
         public function editar() {
                
                $query = 'update professor set materia = :materia where id = :id';
                $query2 = 'update professor set nome = :nome where id = :id';
                $query3 = 'update professor set sexo = :sexo where id = :id';

                $stmt1 = $this->conexao->prepare($query);
                $stmt1->bindValue(':materia', $this->professor->__get('materia'));
                $stmt1->bindValue(':id', $this->professor->__get('id'));

                $stmt2 = $this->conexao->prepare($query2);
                $stmt2->bindValue(':nome', $this->professor->__get('nome'));
                $stmt2->bindValue(':id', $this->professor->__get('id'));

                $stmt3 = $this->conexao->prepare($query3);
                $stmt3->bindValue(':sexo', $this->professor->__get('sexo'));
                $stmt3->bindValue(':id', $this->professor->__get('id'));
               
                $stmt1->execute();
                $stmt2->execute();
                $stmt3->execute();

         }

         public function deletar() {
                $query = 'delete from professor where id = :id';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $this->professor->__get('id'));
                $stmt->execute();
         }   

    }     


?>