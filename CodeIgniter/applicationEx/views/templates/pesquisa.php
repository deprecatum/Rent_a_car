<div class="w-75 mx-auto my-3 container-fluid">
<h1 class="my-4">
Pesquisa de automoveis
</h1>

<?php
$target_controller = 'frota/pesquisa';
$attributes = 'class="form"';
$hidden_fields = array('search_form' => 'true');

//creates the search form tag
echo form_open($target_controller, $attributes, $hidden_fields);
?>
<div class="input-group mb-3">
    <select class="custom-select w-25" name="categoria">
    <option value="modelo">Modelo</option>
        <option value="matricula">Matricula</option>
        <option value="fabricante">Fabricante</option>
    </select>
    <div class="input-group-append w-75">
        <input class="form-control" required type="text" name="search_input" />
    </div>
</div>



</form>

<!--car table-->
<div>
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

</tbody>
</table>
</div>



<!--pagination buttons-->
<?php
$target_controller = 'frota/pesquisa';
$attributes = 'class="d-flex"';


$hidden_fields = array('tab_form' => 'true');

//if search form on, pass data as hidden field
if(isset($hidden_vals)){
    $hidden_fields=$hidden_vals;
}

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

</div> <!--encapsulating div-->