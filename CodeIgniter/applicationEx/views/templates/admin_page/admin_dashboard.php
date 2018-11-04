<div class="container-fluid">

    <div class="row">

        <div class="col-lg-2 my-4">
          <div class="list-group">
            <a href="<?php echo base_url('index.php/frota/admin')?>" class="list-group-item">Admin Dashboard</a>
            <a href="<?php echo base_url('index.php/frota/adicionar')?>" class="list-group-item">Adicionar</a>
            <a href="<?php echo base_url('index.php/frota/editar')?>" class="list-group-item">Editar</a>
            <a href="<?php echo base_url('index.php/frota/remover')?>" class="list-group-item">Remover</a>
          </div>
        </div><!-- /.col-lg-2 -->

<!--
<i class="fas fa-edit"></i> edit icon
<i class="far fa-trash-alt"></i> deletes
-->
<div  class="col-lg-9"><!--car and button wrapper-->
<h1 class="my-4">Dashboard</h1>
<div><!--car table-->
<table class="table table-dark rounded">
  <thead>
    <tr>
      <th scope="col">Fabricante</th>
      <th scope="col">Modelo</th>
      <th scope="col">Cor</th>
      <th scope="col">Matricula</th>
      <th scope="col">Disponibilidade</th>
    </tr>
  </thead>
  <tbody>


    <?php
    $car_quantity = count($cars);
    $start_pos=$tab*4;

    if($start_pos+4>$car_quantity){
        $end_pos=$car_quantity;
    }else{
        $end_pos=$start_pos+4;
    }
    
    for($i=$start_pos;$i<$end_pos;$i++){
        echo "<tr>
        <td>".$cars[$i]->fabricante."</td>
        <td>".$cars[$i]->modelo."</td>
        <td>".$cars[$i]->cor."</td>
        <td>".$cars[$i]->matricula."</td>
        <td>".$cars[$i]->disponibilidade."</td>
    </tr>";
    }

    
     
    ?>
</tbody>
</table>
</div>



<!--pagination buttons-->
<?php
$target_controller = 'frota/admin';
$attributes = 'class="d-flex"';


$hidden_fields = array('tab_form' => 'true');



//creates the tab form tag
echo form_open($target_controller, $attributes, $hidden_fields);
echo '<div class="btn-group mx-auto" role="group" aria-label="First group">';

$tab_quantity = ceil(count($cars) / 4);

if ($tab < 6) {

    echo "<button name='tab' class='btn btn-secondary' value='0'>Inicio</button>";
    for ($i = 0; $i < 10; $i++) {
        if ($i == $tab) {
            echo "<button name='tab' class='btn btn-secondary active' value=$i>$i</button>";
        } else {
            echo "<button name='tab' class='btn btn-secondary' value=$i>$i</button>";
        }
        if ($i == $tab_quantity-1) {
            break;
        }
    }
    echo "<button name='tab' class='btn btn-secondary' value='".($tab_quantity-1)."'>Fim</button>";

} else {

    echo "<button name='tab' class='btn btn-secondary' value='0'>Inicio</button>";
    for ($i = $tab - 5; $i < $tab + 5; $i++) {

        if ($i == $tab) {
            echo "<button name='tab' class='btn btn-secondary active' value=$i>$i</button>";
        } else {
            echo "<button name='tab' class='btn btn-secondary' value=$i>$i</button>";
        }
        if ($i == $tab_quantity-1) {
            break;
        }
    }
    echo "<button name='tab' class='btn btn-secondary' value='".($tab_quantity-1)."'>Fim</button>";
}


?>
</div>
</form> <!--buttongroup-->
</div><!--table and button wrapper-->





    </div>