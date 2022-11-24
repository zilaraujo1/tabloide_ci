<?php $this->load->view('commons/header'); ?>


<title><?php echo $titulo ; ?></title>
<?php
if ($msg = get_msg()) :
    echo '<div class="msg-box">' . $msg . '</div>';
endif;
    
?>

<div class="container">
<form action="autentica_login" method="POST">
    <h3>Login</h3>
    
    <div class="form-group">
      <div class="col-md-6 offset-md-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Entre com um email válido">  
    </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-6 offset-md-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Entre com sua senha">  
      </div>
      </div>
    
    <br/>
    <div class="col-md-6 offset-md-3">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>
<br>
</div>
