<?php $this->load->view('commons/header')  ?>
<div class="container "> 

    <?php if (isset($foto)) : 
      foreach ($foto as $fotos) :?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-serv" src="<?php echo base_url('uploads/logos/'.$fotos->upload_fotos);?>" alt="First slide">
    </div>
        
        <?php endforeach;
              else :
               echo '<p>Nenhum serviço cadastrado!</p>';
             endif; 
        ?>  

<!--
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
<!--    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="0"></li>
    </ol>
            
     
    <!-- Wrapper for slides -->
 

 <!--   <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url('uploads/logos/'.$fotos->upload_fotos);?>" alt="Foto">
     <div class="carousel-caption">
      </div>
      </div>
    
        <div class="item">
         <img src="<?php echo base_url('uploads/logos/'.$fotos->upload_fotos);?>" alt="Image">
         <div class="carousel-caption">
         </div>  
     
 
       </div> 
     </div>
         <!-- Left and right controls -->
   <!--      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
        
</div>  -->
 
<!--  CARROSSEL ---------------------------------------------------------------------->


<?php if (isset($serv)) : ?>
  <?php foreach($serv as $servs): ?>
  
  <div class="row">
    <div class="col-sm-4">
      <img src="<?php echo base_url('uploads/logos/'.$servs->foto);?>" class="img-responsive" style="width:100%" alt="Image">
      <p><?php echo $servs->descricao; ?></p>
    </div>
   
    <div class="col-sm-4">
      <p><?php echo $servs->tipo ?></p>
   <?php endforeach; else :
            echo '<p>Nenhum serviço cadastrado!</p>';
          endif; 
    ?>  
    </div>
</div>
<br>
      
<?php $this->load->view('commons/footer')  ?>
