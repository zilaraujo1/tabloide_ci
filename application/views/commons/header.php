<!DOCTYPE html>
<html lang="en">
<head>
  <title>HomePageTabloide</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle.css') ?>">
  
    <!--myScript-->
    <script type="text/javascript" src="{{ url_for('static', filename='script/myscript.js')}}"></script>
   <!--MyStyle-->
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    
  

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <b><a class="navbar-brand" href="/">TABLOIDE_CT</a><b>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('/');?>">HOME</a></li>
        
	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">COMÉRCIOS<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ALIMENTOS</a></li>
          <li><a href="#">ARTES E DECORAÇÃO</a></li>
          <li><a href="#">ELETRÔNICOS</a></li>
          <li><a href="#">DIVERSOS</a></li>
        </ul>
    </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/servicos">SERVIÇOS<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/beleza">BELEZA</a></li>
          <li><a href="#">CONSTRUÇÃO</a></li>
          <li><a href="#">LIMPEZA</a></li>
          <li><a href="#">DIVERSOS</a></li>
        </ul>
      </li>
        
	<button type="button" class="btn navbar-btn" data-toggle="modal" data-target="#myModal">QUEM SOMOS</button>

  	<!-- Modal -->
  	<div class="modal fade" id="myModal" role="dialog">
   	 <div class="modal-dialog">
    
     	 <!-- Modal content-->
      	<div class="modal-content">
      	  <div class="modal-header">
         	 <button type="button" class="close" data-dismiss="modal">&times;</button>
         	 <h4 class="modal-title">TABLOIDE DIGITAL CT</h4>
      	 </div>
       	 <div class="modal-body">
        	  <p>Esse site faz parte do Projeto Integrador III dos cursos de Engenharia de Computação, Bacharelado em Ciência de Dados e Tecnologia da Universidade Virtual do Estado de São Paulo. Em formato de Tabloide Digital estaremos divulgando produtos de comércios e serviços do bairro. </p>
        	</div>
       	 <div class="modal-footer">
        	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
      	</div>      
   	 </div>
  	</div>  
	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/cadastro_users'); ?>"><span class="glyphicon glyphicon-log-in"></span>CADASTRE-SE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/login'); ?>"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span>Sair</a></li>
      </ul>
    </div>
  </div>
</nav>





    

</head>
   
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/cdd0c2c5dc.js" crossorigin="anonymous"></script>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url_for('static', filename='script/jquery.js')}}"></script>
    

</body>
</html>