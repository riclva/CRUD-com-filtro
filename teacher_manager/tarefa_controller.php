<?php 

      require '../../teacher_manager/conexao.php';
      require '../../teacher_manager/professor.model.php';
      require '../../teacher_manager/professor.service.php';

      $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

      if ($acao == 'inserir') {
            $professor = new Professor();
            $professor->__set('nome', $_POST['nome']);
            $professor->__set('materia', $_POST['materia']);
            $professor->__set('sexo', $_POST['sexo']);

            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $professorService->inserir();

            header('Location: professor_registro.php');   
      } else if ($acao == 'consultar') {
            $professor = new Professor();
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $array = $professorService->consultar();
      } else if ($acao == 'editar') {
           
            $professor = new Professor();
            $professor->__set('id', $_POST['id_edit']);
            $professor->__set('nome', $_POST['nome']);
            $professor->__set('materia', $_POST['materia']);
            $professor->__set('sexo', $_POST['sexo']);
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $professorService->editar();
            header('Location: professor_registro.php'); 
      } else if ($acao == 'filtrar') {
            $professor = new Professor();
            $professor->__set('nome', $_POST['nome_filtrado']);
            $professor->__set('materia', $_POST['materia_filtrada']);
            $professor->__set('sexo', $_POST['sexo_filtrado']);
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $array = $professorService->filtrar();


      } else if ($acao == 'excluir') {
            $professor = new Professor();
            $professor->__set('id', $_GET['id']);

            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor); 
            $professorService->deletar();
            header('Location: professor_registro.php');
      }


      
  
?>