<?php $this->load->view('commons/header')  ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
 <?php echo print_r($foto) ?>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url('uploads/logos/'.$foto) ?>" alt="Foto">
        <div class="carousel-caption">
          </div>
 
        
        </div>
     
  
        
       <div class="item">
        <img src="<?php echo base_url('uploads/logos/'.$dono->foto);?>" alt="Image">
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
  
<div class="container text-center"> 
<?php if (isset($serv)) : ?>
  <h3><?php echo $serv->descricao; ?> </h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="<?php echo base_url('uploads/servicos/'.$serv->foto);?>" class="img-responsive" style="width:100%" alt="Image">
      <p><?php echo $serv->tipo; ?></p>
    </div>
    <div class="col-sm-4"> 
      <img src="<?php echo base_url('uploads/servicos/'.$serv->fotob);?>" class="img-responsive" style="width:100%" alt="image">
      <p><?php echo $serv->tipo; ?></p>    

       
    </div>
    <div class="col-sm-4">
      <p><?php echo ($serv->descricao); ?></p>
   <?php  else :
            echo '<p>Nenhum serviço cadastrado!</p>';
          endif; 
    ?>  
    </div>
</div><br>

<?php $this->load->view('commons/footer')  ?>
