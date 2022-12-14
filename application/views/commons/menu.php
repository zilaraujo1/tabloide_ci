
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Biblioteca Pedra</a>
<a class="nav-link active" href="<?php echo base_url();?>">Home</a>
 <a class="nav-link" href="<?php echo base_url('index.php/login'); ?>">Login</a>

<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<ul class="navbar-nav px-3">
  <li class="nav-item text-nowrap">
    <a class="nav-link" href="#">Sair</a>
  </li>
</ul>
</nav>
<div class="container-fluid">
  <div class="row">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">
            <span data-feather="home"></span>
            Página Inicial <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/cadastro_users'); ?>">
            <span data-feather="file-text"></span>
            Cadastro de usuário
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file"></span>
            Todos os livros
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/cadastro_livros'); ?>">
            <span data-feather="shopping-cart"></span>
            Cadastrar livros
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/pesquisar'); ?>">
            <span data-feather="users"></span>
            Pesquisar livro
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Novas entradas
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrativo</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/login'); ?>">
            <span data-feather="file-text"></span>
            Controle de acesso da sala de leitura
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Ultimos registros
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Livros pendentes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul>
    </div>
  </nav>
    