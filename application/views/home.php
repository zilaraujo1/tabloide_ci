

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HomePageTabloide</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle.css') ?>">
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
 
</head>
<body>

<nav class="navbar navbar-inverse">
  <?php
if ($msg = get_msg()) :
    echo '<div class="msg-box">' . $msg . '</div>';
endif;
    
?>
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
        <li class="active"><a href="<?php echo base_url('/'); ?>">HOME</a></li>
        
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
        <li><a href="<?php echo base_url('/cadastro_users'); ?>"><span class="glyphicon glyphicon-log-in"></span>CADASTRO</a></li>
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

<div class="container">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url('assets/img/home/logoanuncio.png');?>" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>

        <div class="item">
          <img src="<?php echo base_url('assets/img/home/dehliciaslogo2.png');?>" alt="Image">
          <div class="carousel-caption">
          </div>  

          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/frentedehlicias.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div> 

          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/logo.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div>   
 	  
          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/frente.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div>   

          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/studiotatu.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div>   

          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/Dashtattoo.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div>  

          </div> 
          <div class="item">
            <a href="/servicos/{{ user.id }}"><img src="<?php echo base_url('assets/img/home/logo2.jpg');?>" alt="Image"></a>
          <div class="carousel-caption">
          </div>  

          </div> 
          <div class="item">
          <img src="<?php echo base_url('assets/img/home/logo4.jpg');?>" alt="Image">
          <div class="carousel-caption">
          </div>  

        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    </div>
    <div class="col-sm-4">
    <div class="well">
    <div class="text-center">
    <b><p>Quem Somos</p><b>

    </div>
    </div>

    </div>
    <div class="col-sm-4">
    <div class="well">
    <div class="text-center">
    
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">COMÉRCIOS<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ALIMENTOS</a></li>
          <li><a href="#">ARTES E DECORAÇÃO</a></li>
          <li><a href="#">ELETRÔNICOS</a></li>
          <li><a href="#">DIVERSOS</a></li>
        </ul>
    </li>
    </div>
    </div>

    </div>
    <div class="col-sm-4">
    <div class="well">
    <div class="text-center">
    
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">SERVIÇOS<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/beleza">BELEZA</a></li>
          <li><a href="#">CONSTRUÇÃO</a></li>
          <li><a href="#">LIMPEZA</a></li>
          <li><a href="#">DIVERSOS</a></li>
        </ul>
      </li>
    </div>
     </div>

    </div>
  </div>
</div>
<hr>
</div>

<div class="container text-center">    
  <b><h3>OFERTAS DO MOMENTO</h3><b>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <img src="<?php echo base_url('assets/img/home/bolocopo.jpg');?>" class="img-responsive" style="width:100%" alt="Image">
      <p>Bolo no Copo - R$ 5,00</p>
    </div>
    <div class="col-sm-3"> 
      <img src="<?php echo base_url('assets/img/home/empadas.jpg');?>" class="img-responsive" style="width:100%" alt="Image">
      <p>Empadas - R$ 3,00</p>    
    </div>
    <div class="col-sm-3">
      <div class="well" "container text-center">
       <p>Atelie Deh-Licias</p>
      </div>
      <div class="well" "container text-center">
       <p>Empório CT</p>
      </div>
      <div class="well" "container text-center">
       <p>Divino Sabor</p>
      </div>
    </div>
    <div class="col-sm-3" "container text-center">
      <div class="well">
      <p>PF Studio Pilates</p>
      </div>
      <div class="well" "container text-center">
       <p>Espaço Mulher Esmalteria</p>
      </div>
      <div class="well" "container text-center">
       <p>DeRa Studio</p>
      </div>
    </div>  
     
  <hr>
</div>

<div class="container text-center">    
  <b><h3>OUTROS COMÉRCIOS E SERVIÇOS</h3><b>
  <br>
  <div class="row">
  <?php   if (isset($foto) && sizeof($foto) > 0):  ?>  
          <?php foreach ($foto as $donos):?>
    
    <div class="col-sm-2">
      <a href="<?php echo base_url('servico/'. $donos->id );?>">
      <img src="<?php echo base_url('uploads/logos/'.$donos->foto); ?>" class="img-responsive" style="width:100%" alt="Image">
      <p><?php echo $donos->nome ?></p></a>
    </div>
    <!------------------------ -->    
    <?php endforeach; ?>
                  </table>
                  <?php else: ?>
                    Sem novos comércios
        <?php endif; ?>
   <!-- <div class="col-sm-2"> 
      <a href="/servicos/{{ 3 }}"><img src="{{ url_for('static', filename='image/home/atelierdiego.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
      <p>Atelier Diego Amoroso</p></a>    
    </div>
    <div class="col-sm-2"> 
      <a href="/servicos/{{ 2 }}"><img src="{{ url_for('static', filename='image/home/studiotatu.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
      <p>Dash Studio Tattoo</p></a>
    </div>
    <div class="col-sm-2"> 
      <a href="/servicos/{{ 5 }}"><img src="{{ url_for('static', filename='image/home/divinosabor.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
      <p>Divino Sabor Bolos & Doces</p></a>
    </div> 
    <div class="col-sm-2"> 
      <a href="/servicos/{{ 7 }}"><img src="{{ url_for('static', filename='image/home/logo2.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
      <p>Espaço Mulher Esmalteria</p></a>
    </div> 
     
    <div class="col-sm-2"> 
      <a href="/servicos/{{ 1 }}"><img src="{{ url_for('static', filename='image/home/logo4.jpg')}}" class="img-responsive" style="width:100%" alt="Image">
      <p>DeRa Studio</p></a>
    </div> 
    -->
  </div>
</div><br>


<footer class="container-fluid text-center">
  <b><p>TABLOIDE DIGITAL CT - VENHA FAZER PARTE</p><b>
</footer>
</body>
</html>
