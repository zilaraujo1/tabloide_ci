<?php $this->load->view('commons/header'); ?>



<div class="container">
<h2><?php echo $titulo ?></h2>
  <?php
if ($msg = get_msg()) :
    echo '<div class="msg-box">' . $msg . '</div>';
endif;
    
?>
<form action="<?=base_url('Paginas/salva_user')?>" method="POST">
    
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        <label for="empresa">CNPJ</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o cnpj da empresa">  
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="entre com um email válido">  
        </div>
    </div>
   
 
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
        <label for="password1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="entre com sua senha">  
         </div>
    </div>
    
    <br/>
    <div class="col-md-6 offset-md-3">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

</div>


<?php $this->load->view('commons/footer'); ?>