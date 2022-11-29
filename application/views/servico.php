<?php $this->load->view('commons/header')  ?>

<h1 class="empresa"><?php echo $dono->nome ?></h1>

<div class="container "> 

    <?php if (isset($serv)) : 
      foreach ($serv as $servs) :?>

  <div id="carouselExampleSlidesOnly" class="carousel slide slide-my" data-ride="carousel">
    <div class="carousel-inner">
      <div class="img-serv">
        <img class="d-block  " src="<?php echo base_url('uploads/servicos/'.$servs->foto);?>" alt="First slide">
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
    <div class="col-sm-4 col-md-3 ">
      <img src="<?php echo base_url('uploads/logos/'.$fotos->upload_fotos);?>" class="img-responsive img-service" alt="Image">
      <p><?php echo $servs->descricao; ?></p>
  </div>

    <?php endforeach; else :
            echo '<p>Nenhum serviço cadastrado!</p>';
          endif; 
          ?>  
    
    <div class="col-sm-12 col-md-4 desc">
    <h1 class="info">Saiba mais</h1>
    <p><i><?php echo $dono->descricao; ?></i></p>
    
   
    </div>
    <div class="col-sm-4 col-md-4 aside">
    <img src="<?php echo base_url('uploads/logos/'.$dono->foto);?>" class="img-responsive img-contato" alt="Image">
      
      
      <p>Endereço: <?php echo $dono->endereco ?></p>
      
      </div>
      <div class="col-sm-4 col-md-4 aside">
      <h1 class="info">Atendimento</h1>

      <img src="<?php echo base_url('assets/img/home/service.webp');?>" class="img-responsive img-contato" alt="Image">
        
        
      <p>contato: <?php echo $dono->telefone ?></p>
      <p> funcionamento: <?php echo $dono->hora_func ?></p>
        </div>
    </div>

    </div>
  </div>
    <br>
          
    <?php $this->load->view('commons/footer')  ?>
  </div> 
        
