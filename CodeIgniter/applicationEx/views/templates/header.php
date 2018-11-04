<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/publico/sobre') ?>">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/frota/pesquisa') ?>">Frota Automovel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/publico/contacto') ?>">Contacto</a>
      </li>
    </ul>
    <div>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <?php
      if( isset($_SESSION['logged_in']) ){
        echo '<li class="nav-item">
        <a class="nav-link" href="';
        echo base_url('index.php/frota/admin');
        echo '">Painel Admin</a>
        </li>';
        echo '<li class="nav-item">
        <a class="nav-link" href="';
        echo base_url('index.php/frota/logout');
        echo '">Logout</a>
        </li>';
      }else{
        echo '<li class="nav-item">
        <a class="nav-link" href="';
        echo base_url('index.php/frota/login');
        echo '">Login</a>
        </li>';
      }
    ?>
     
    </ul>
</div>
  </div>
</nav>