<?php 

   $acao = 'consultar';

   require_once '../../teacher_manager/tarefa_controller.php';      

  // echo '<pre>';
  // print_r($array);
  // echo '</pre>';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="manager.css">
	
      <script>
        
           function editar(id) {

                
              document.getElementById('painel_' + id).style.display = 'inline';
              document.getElementById('painel').style.display = 'none';
              document.getElementsByClassName("mostrador").style.visibility = "hidden";
              
           }

           function remover(id) {
               location.href = 'tarefa_controller.php?acao=excluir&id=' + id;
           
           }

           function filtrar() {
               location.href = 'professor_registro.php?acao=filtrar';          
           }

      </script>

  </head>
	
	<body>
         
        



         <? foreach ($array as $key => $registro) { ?>
         	

         	 <div class="" id="painel_<?= $registro->id ?>" style="display: none;">

           <form method="POST" action="tarefa_controller.php?acao=editar" style="background-color: gray; padding-bottom: 1.1em;">
           	   <div class="form-group">
         		  <p class="lead" align="center" style="color: white;">Editar Registro</p>
         		  <div class="titulos">
               	  	 Nome
               	  </div> 
         		  <input type="text" name="nome" class="form-control" style="margin-top: 0em; width: 20%; margin-left: 1em;" placeholder="Digite aqui o nome do professor" value="<?= $registro->nome ?>">
         	   </div>
               <br>
               <div class="form-group">
               	  <div class="titulos">
               	  	 Matéria
               	  </div> 
               	  <select class="form-control" style="margin-left: 1em; width: 20%;" name="materia">
	         	   	   <option><?= $registro->materia ?></option>
                   
                   <? if ($registro->materia != 'Matemática') { ?>
                   <option>Matemática</option>
	         	   	   <? } ?>
                   
                   <? if ($registro->materia != 'Física') { ?>
                   <option>Física</option>
	         	   	   <? } ?>

                   <? if ($registro->materia != 'Química') { ?>
                      <option>Química</option>
                   <? } ?>
                  
                   <? if ($registro->materia != 'Educação Física') { ?>
	         	   	   <option>Educação Física</option>
	         	   	   <? } ?>

                   <? if ($registro->materia != 'Português') { ?>
                   <option>Português</option>
	         	   	   <? } ?>
                   
                   <? if ($registro->materia != 'Inglês') { ?>
                   <option>Inglês</option>
         	         <? } ?>
                </select>
               </div>
         	   <br>
               <div class="form-group">
               	  <div class="titulos">
               	  	 Sexo
               	  </div> 
               	  <select class="form-control" style="margin-left: 1em; width: 20%;" name="sexo">
         	   	     <option><?= $registro->sexo ?></option>
                   <? if ($registro->sexo != 'Masculino') { ?>
                      <option>Masculino</option>
                   <? } ?>
                   <? if ($registro->sexo != 'Feminino') { ?>
                      <option>Feminino</option>
                   <? } ?>
         	   	     
         	      </select>
               </div>
         	   
         	     <input type="hidden" name="id_edit" value="<?= $registro->id ?>" >

         	   <button class="btn btn-dark" style="margin-left: 1em;">Editar</button>
             
           </form> 
           
           
         	 
          
           
         </div>
           
          

         <? } ?>




         <div class="container" id="painel">
         	
          

           <form method="POST" action="tarefa_controller.php?acao=inserir">
           	   <div class="form-group">
         		  <p class="lead" align="center">Registrar Professor</p>
         		  <div class="titulos">
               	  	 Nome
               	  </div> 
         		  <input type="text" name="nome" class="form-control" style="margin-top: 0em; width: 60%; margin-left: 1em;" placeholder="Digite aqui o nome do professor">
         	   </div>
               <br>
               <div class="form-group">
               	  <div class="titulos">
               	  	 Matéria
               	  </div> 
               	  <select class="form-control" style="margin-left: 1em; width: 60%;" name="materia">
	         	   	   <option>Matemática</option>
	         	   	   <option>Física</option>
	         	   	   <option>Química</option>
	         	   	   <option>Educação Física</option>
	         	   	   <option>Português</option>
	         	   	   <option>Inglês</option>
         	      </select>
               </div>
         	   <br>
               <div class="form-group">
               	  <div class="titulos">
               	  	 Sexo
               	  </div> 
               	  <select class="form-control" style="margin-left: 1em; width: 60%;" name="sexo">
         	   	     <option>Masculino</option>
         	   	     <option>Feminino</option>
         	      </select>
               </div>
         	   
         	

         	   <button class="btn btn-dark" style="margin-left: 1em;">Cadastrar</button>
           </form> 

           
         	 
            
           
         </div>
           

         

          <br>
        
          <div class="container">
              <br>
             <p align="center" class="lead">Filtros</p>

             <form method="POST" action="professor_registro.php?acao=filtrar">
                 
                 <input type="text" style="width: 25%; margin-left: 2.5em; display: inline; " name="nome_filtrado" value="Todos" class="form-control">

                 <select style="width: 25%; margin-left: 2.5em;" class="form-control" name="sexo_filtrado">
                     <option>Todos</option>
                     <option>Masculino</option>
                     <option>Feminino</option>
                 </select>

                 <select style="width: 25%; margin-left: 2.5em;" class="form-control" name="materia_filtrada">
                     <option>Todos</option>
                     <option>Matemática</option>
                     <option>Física</option>
                     <option>Química</option>
                     <option>Educação Física</option>
                     <option>Português</option>
                     <option>Inglês</option>
                 </select>

                 <button style="width: 25%; margin-left: 2.5em;" class="btn btn-warning">Filtrar</button>

             </form>




          </div>
          

        <div class="mostrador">
            
            <? foreach ($array as $key => $registro) { ?>
              
              <div style="margin-left: 10em; margin-top: 2em; visibility: visible;">
                 
                          <div class="card" style="height: 4em; width: 70%; background-color: lightgray; font-family: cursive;">
                          <?= $registro->nome ?>
                    <br>
                    
                    <? if ($registro->sexo == 'Feminino') { ?>
                        <div>
                         Professora de <?= $registro->materia ?> 
                      </div>
                    <? } ?> 

                    <? if ($registro->sexo == 'Masculino') { ?>
                        <div>
                         Professor de <?= $registro->materia ?> 
                      </div>
                    <? } ?> 
                    
                          
                        
                     </div>
                 
                 
                 <button class="btn btn-dark" style="width: 10%; margin-left: 36.9em;" onclick="editar(<?= $registro->id ?>)">Editar</button>
                 <button class="btn btn-dark" style="width: 10%;" onclick="remover(<?= $registro->id ?>)">Excluir</button>
              </div>
            

           <? } ?> 

        </div>

         

	</body>
</html>