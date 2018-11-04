<?php
if( isset($error) ){
    echo '<div class="alert alert-danger" role="alert">
  Pesquisa sem sucesso
</div>';
}else if( isset($success) ){
    echo '<div class="alert alert-success" role="alert">
    Pesquisa com sucesso
  </div>';
}
?>