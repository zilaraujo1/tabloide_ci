<?php $this->load->view('commons/header'); ?>



<div class="container">
<h2><?php echo $titulo ?></h2>
  <?php
if ($msg = get_msg()) :
    echo '<div class="msg-box alert alert-danger">' . $msg . '</div>';
endif;
    
?>
<form action="<?=base_url('Paginas/salva_user')?>" method="POST">
    
    <div class="form-group">
       
        <label for="empresa">CNPJ</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o cnpj da empresa">  
        
    </div>
    <div class="form-group">
       
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="entre com um email válido">  
        
    </div>
   
 
    <div class="form-group">
       
        <label for="password1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="entre com sua senha">  
         
    </div>
    
    <br><br>
   
    <button type="submit" class="btn btn-primary">Submit</button>
    
</form>

</div>


<?php $this->load->view('commons/footer'); ?>