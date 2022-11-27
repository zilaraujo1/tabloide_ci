<?php $this->load->view('commons/header')  ?>
<div class="container "> 

    <?php if (isset($serv)) : 
      foreach ($serv as $servs) :?>

  <div id="carouselExampleSlidesOnly" class="carousel slide slide-my" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-serv" src="<?php echo base_url('uploads/logos/'.$servs->foto);?>" alt="First slide">
      </div>
          
    </div>
        <?php endforeach;
              else :
               echo '<p>Nenhum serviço cadastrado!</p>';
             endif; 
        ?>  
  </div>


<div class="row">
<?php if (isset($foto)) : ?>
  <?php foreach($foto as $fotos): ?>
    <div class="col-sm-4 ">
      <img src="<?php echo base_url('uploads/logos/'.$fotos->upload_fotos);?>" class="img-responsive img-service" alt="Image">
      <p><?php echo $servs->descricao; ?></p>
  </div>

    <?php endforeach; else :
            echo '<p>Nenhum serviço cadastrado!</p>';
          endif; 
          ?>  
    
  </div>
    <div class="col-sm-6  ">
    <p><?php echo $dono->descricao; ?></p>
    </div>
    
  <p><?php echo $dono->endereco ?></p>
<br>
      
<?php $this->load->view('commons/footer')  ?>
