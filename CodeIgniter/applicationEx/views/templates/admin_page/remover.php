<div class="container-fluid">

    <div class="row">


        <div class="col-lg-2 my-4">
            <div class="list-group">
                <a href="<?php echo base_url('index.php/frota/admin') ?>" class="list-group-item">Admin Dashboard</a>
                <a href="<?php echo base_url('index.php/frota/adicionar') ?>" class="list-group-item">Adicionar</a>
                <a href="<?php echo base_url('index.php/frota/editar') ?>" class="list-group-item">Editar</a>
                <a href="<?php echo base_url('index.php/frota/remover') ?>" class="list-group-item">Remover</a>
            </div> <!--list group-->
        </div><!-- /.col-lg-2 -->
        

        <div class="col-lg-9">
            <div class="row">
                <h1 class="my-4">Remover</h1>
            </div>
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

            <div class="row">
                <div class="col-lg-3">
                    <label for="selector">Categoria</label>
                    <select id="form-selector" class="form-control" onchange="remove_form_generator()">
                        <option>Choose...</option>
                        <option value="1">Automovel</option>
                        <option value="2">Cor</option>
                        <option value="3">Fabricante</option>
                        <option value="4">Modelo</option>
                    </select>
                </div> <!--col-lg-3-->
            </div><!--row-->


                    
            <div id="form-wrapper" class="row my-2">
                <?php
                $target_controller = 'frota/receive_dynamic_form';
                $attributes = 'id="dynamic_form" class="form w-100"';
                $hidden_fields = array('form_type' => 'remove_form');
                            
                            //creates the search form tag
                echo form_open($target_controller, $attributes, $hidden_fields);
                ?>
                <div class="row">
                    <div id="form-wrap" class="col-lg-3">
                        <!--auto generated form content goes here-->
                    </div> <!--form-wrap-->

                    <div id="search-container" class="col-lg-9" style="display:none">
                        <h2>Procurar carros a remover</h2>

                        <div class="input-group mb-3">
                            <select id='select_filter' class="custom-select w-25" name="categoria">
                                <option>Choose</option>
                                <option value="1">Modelo</option>
                                <option value="2">Matricula</option>
                                <option value="3">Fabricante</option>
                            </select>
                            <div class="input-group-append w-75">
                                <input class="form-control" type="text" id="keyword_input"/>
                                <input class="form-control w-25" type="button" value="Search" onclick="request_car_data_filtered()"/>
                            </div><!--input-group-append-->
                        </div><!--input-group mb-3-->


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
                                    <th scope="col">Editar?</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                    <!--auto generated content goes here-->
                                </tbody>
                            </table>
                        </div><!--car table-->
                    </div><!--search-container-->
                </div><!--row-->
                </form> <!--php_form-->
            </div><!--form-wrapper-->

        </div><!--col-lg-9-->

    </div><!--row-->
</div><!--container-->
<script src="<?php echo base_url('assets/JS/generate_admin_search_table.js'); ?>"></script>
<script src="<?php echo base_url('assets/JS/form_generator.js'); ?>"></script>







