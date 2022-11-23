<?php $this->load->view('commons/header')  ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../static/uploads/logos/{{ dono.fotob }}" alt="Foto">
        <div class="carousel-caption">
        </div>
      </div>
      

      <div class="item">
        <img src="../static/uploads/logos/{{ dono.foto }}" alt="sem FOTO">
        <div class="carousel-caption">
        </div> 

       </div>
    
       <div class="item">
        <img src="../static/uploads/logos/{{ dono.fotoc }}" alt="Image">
        <div class="carousel-caption">
        </div>      
       
       </div>
       <div class="item">
        <img src="../static/uploads/logos/{{ dono.fotod }}" alt="Image">
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
    
  <h3><?php echo $servs->id ?></h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="../static/uploads/servicos/{{ serv.foto }}" class="img-responsive" style="width:100%" alt="Image">
      <p>{{ serv.tipo }}</p>
    </div>
    <div class="col-sm-4"> 
      <img src="../static/uploads/servicos/{{ serv.fotob }}" class="img-responsive" style="width:100%" alt="image">
      <p>{{ serv.tipo }}</p>    
    
       
    </div>
    <div class="col-sm-4">
      <p>{{ dono.descricao }}</p>
     
    </div>
</div><br>
{% endblock %}
<footer class="container-fluid text-center">
  <p>{{ dono.endereco }}</p>
</footer>

</body>
</html>