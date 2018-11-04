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

        <div class="col-lg-9">
            <h1 class="my-4">Adicionar</h1>
            <?php
                if($result==='sucesso'){
                    echo '<div class="alert alert-success" role="alert">
                        Sucesso
                    </div>';
                }else if($result==='falha'){
                    echo '<div class="alert alert-danger" role="alert">
                        Falha
                    </div>';
                }
            ?>
            <div class="w-25">
                <label for="selector">Categoria</label>
                <select id="form-selector" class="form-control" onchange="add_form_generator()">
                    <option>Choose...</option>
                    <option value="1">Automovel</option>
                    <option value="2">Cor</option>
                    <option value="3">Fabricante</option>
                    <option value="4">Modelo</option>
                </select>

                <div id="form-wrapper">
                <?php
                    $target_controller = 'frota/receive_dynamic_form';
                    $attributes = 'id="dynamic_form" class="form"';
                    $hidden_fields = array('form_type' => 'add_form');
                    
                    //creates the search form tag
                    echo form_open($target_controller, $attributes, $hidden_fields);
                ?>
                <div id="form-wrap">
                <!--auto generated form content goes here-->
                </div>
                </form>
                </div><!--form-wrap-->

            </div> <!--select wrapper-->

            <div class="w-75">

            </div>
        </div>
    </div><!--row-->
</div><!--container-->
<script src="<?php echo base_url('assets/JS/form_generator.js'); ?>"></script>