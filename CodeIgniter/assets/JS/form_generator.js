//adicionar
//this function generates a form inside adicionar, fetching only the necessary data 
function add_form_generator() {

    select_value = document.getElementById('form-selector').value;

    var form = document.getElementById('form-wrap');
    form.innerHTML = "";

    var ajax_package = {
        'select_value': select_value,
        'what_form': 'add_form',
    };
    

    switch (select_value) {
        case '1': {
            //form do automovel
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
                data: ajax_package,
                success: function (data) {
                    add_automovel_form(data);
                },//success
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            }); //end ajax

            break;
        }//case 1
        case '2': {//form da cor
            add_cor_form();
            break;
        } //case 2
        case '3': { //fabricante 
            add_fabricante_form();
            break;
        } //case 3
        case '4': {
            //modelo
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
                data: ajax_package,
                success: function (data) {
                    add_modelo_form(data);
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }

            });

            break;
        }//case modelo
    }//switch
}

//generate a form with the necessary data to add a automovel
function add_automovel_form(data) {
    var form = document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "automovel");
    form.appendChild(hidden_field);


    modelo_select_box(data);
    cor_select_box(data);

    //matricula input
    var matricula_label = document.createElement("label");
    matricula_label.setAttribute("for", "input_matricula");
    matricula_label.innerHTML = "Introduza matricula (XX-XX-XX)";
    form.appendChild(matricula_label);

    var matricula_input = document.createElement("input");
    matricula_input.setAttribute("class", "form-control");
    matricula_input.setAttribute("id", "input_matricula");
    matricula_input.setAttribute("type", "text");
    matricula_input.setAttribute("name", "matricula_input");
    matricula_input.setAttribute("pattern", "[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}");
    matricula_input.setAttribute("required", "");

    form.appendChild(matricula_input);
    //end matricula input


    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

function add_cor_form() {
    var form = document.getElementById('form-wrap');
    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "cor");
    form.appendChild(hidden_field);



    var cor_label = document.createElement("label");
    cor_label.setAttribute("for", "input_cor");
    cor_label.innerHTML = "Introduza cor";
    form.appendChild(cor_label);

    var cor_input = document.createElement("input");
    cor_input.setAttribute("pattern", "form-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}");
    cor_input.setAttribute("class", "form-control");
    cor_input.setAttribute("id", "input_cor");
    cor_input.setAttribute("type", "text");
    cor_input.setAttribute("name", "cor_input");
    cor_input.setAttribute("required", "");


    form.appendChild(cor_input);

    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

//generates a submit_form for fabricante
function add_fabricante_form() {

    var form = document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "fabricante");
    form.appendChild(hidden_field);



    var fabricante_label = document.createElement("label");
    fabricante_label.setAttribute("for", "input_fabricamte");
    fabricante_label.innerHTML = "Introduza Fabricante";
    form.appendChild(fabricante_label);

    var fabricante_input = document.createElement("input");
    fabricante_input.setAttribute("pattern", "[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}");
    fabricante_input.setAttribute("class", "form-control");
    fabricante_input.setAttribute("id", "input_fabricamte");
    fabricante_input.setAttribute("type", "text");
    fabricante_input.setAttribute("name", "fabricante_input");
    fabricante_input.setAttribute("required", "");
    form.appendChild(fabricante_input);

    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

//generate submit_form for modelo
function add_modelo_form(data) {
    var form = document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "modelo");
    form.appendChild(hidden_field);


    fabricante_select_box(data);


    var label_modelo = document.createElement("label");
    label_modelo.setAttribute("for", "modelo_input");
    label_modelo.innerHTML = "Introduza o Modelo";
    form.appendChild(label_modelo);

    var modelo_input = document.createElement("input");
    modelo_input.setAttribute("pattern", "[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}");
    modelo_input.setAttribute("type", "text");
    modelo_input.setAttribute("name", "modelo_input");
    modelo_input.setAttribute("required", "");
    modelo_input.setAttribute("class", "form-control");

    form.appendChild(modelo_input);

    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

function hide_modelos() {

    $("#select_modelo").children().hide();
    class_name = "." + document.getElementById('fabricante_select').value;
    console.log(class_name);

    $(class_name).show();
}




//editar
//edit generator
function edit_form_generator() {


    select_value = document.getElementById('form-selector').value;

    var form = document.getElementById('form-wrap');
    form.innerHTML = "";

    var ajax_package = {
        'select_value': select_value,
        'what_form': 'edit_form',
    };

    if(select_value>0&&select_value<5){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
        data: ajax_package,
        success: function (data) {

            switch (select_value) {
                case '1': {
                    //form do automovel
                    edit_automovel_form(data);
                    break;
                }//case 1
                case '2': {//form da cor
                    edit_cor_form(data);
                    break;
                } //case 2
                case '3': { //fabricante 
                    edit_fabricante_form(data);
                    break;
                } //case 3
                case '4': {
                    //modelo
                    edit_modelo_form(data);
                    break;
                }//case modelo
            }//switch
        },//success
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
        }
    }); //end ajax
    } //if
}

function edit_automovel_form(data) {

    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "automovel");
    form.appendChild(hidden_field);

    //disponivel select box
    var label_disponivel=document.createElement('label');
    label_disponivel.setAttribute('for','disponibilidade_select');
    label_disponivel.innerHTML='Selecione Disponibilidade';
    form.appendChild(label_disponivel);

    var disponivel=document.createElement('select');
    disponivel.setAttribute('id','disponibilidade_select');
    disponivel.setAttribute('name','disponibilidade');
    disponivel.setAttribute('class','form-control');


    var option0=document.createElement('option');
    option0.setAttribute('value',0);
    option0.innerText='Não Mudar';
    disponivel.appendChild(option0);


    var option1=document.createElement('option');
    option1.setAttribute('value',1);
    option1.innerText='Disponivel';
    disponivel.appendChild(option1);

    var option2=document.createElement('option');
    option2.setAttribute('value',2);
    option2.innerText='Não Disponivel';
    disponivel.appendChild(option2);
    form.appendChild(disponivel);
    //end disponivel select box


    //modelo select box
    var lista_modelos = data['modelos'];

    var label_modelo = document.createElement("label");
    label_modelo.setAttribute("for", "select_modelo");
    label_modelo.innerHTML = "Selecione Modelo";
    form.appendChild(label_modelo);

    var select_modelo = document.createElement("select");
    select_modelo.setAttribute("required", "");
    select_modelo.setAttribute("name", "select_modelo");
    select_modelo.setAttribute("id", "select_modelo");
    select_modelo.setAttribute("class", "form-control");

    var option0 = document.createElement("option");
    option0.value = 0;
    option0.text = 'Não Mudar';
    select_modelo.appendChild(option0);

    fabricantes = Object.keys(lista_modelos);

    //set an id according to the models fabricante, so they can be hidden and unhidden
    for (var i = 0; i < fabricantes.length; i++) {

        //fabricante=lista_fabricantes[i]['nome'];
        fabricante = fabricantes[i];
        fab_group = document.createElement('optgroup');
        fab_group.setAttribute('label', fabricante);

        for (var x = 0; x < lista_modelos[fabricante].length; x++) {

            var option = document.createElement("option");
            option.setAttribute("class", fabricante.replace(/\s/g, "_"));
            option.value = lista_modelos[fabricante][x]['modelo_id'];
            option.text = lista_modelos[fabricante][x]['modelo'];
            fab_group.appendChild(option);
        }

        select_modelo.appendChild(fab_group);
    }

    form.appendChild(select_modelo);
    //modelo select box end


    //cor select box
    var lista_cores=data['cores'];
    var label_label = document.createElement("label");
    label_label.setAttribute("for", "select_cores");
    label_label.innerHTML = "Selecione Cor";
    form.appendChild(label_label);

    var select_cor = document.createElement("select");
    select_cor.setAttribute("required", "");
    select_cor.setAttribute("name", "select_cores");
    select_cor.setAttribute("id", "select_cores");
    select_cor.setAttribute("class", "form-control");

    var option0 = document.createElement("option");
    option0.value = 0;
    option0.text = 'Não mudar';
    select_cor.appendChild(option0);

    for (var i = 0; i < lista_cores.length; i++) {
        var option = document.createElement("option");

        option.value = lista_cores[i]['id'];
        option.text = lista_cores[i]['nome'];
        select_cor.appendChild(option);
    }
    form.appendChild(select_cor);
    //cor select box end


    //matricula input
    var matricula_label = document.createElement("label");
    matricula_label.setAttribute("for", "input_matricula");
    matricula_label.innerHTML = "Introduza matricula (XX-XX-XX)";
    form.appendChild(matricula_label);

    var matricula_input = document.createElement("input");
    matricula_input.setAttribute("class", "form-control");
    matricula_input.setAttribute("id", "input_matricula");
    matricula_input.setAttribute("type", "text");
    matricula_input.setAttribute("name", "matricula_input");
    matricula_input.setAttribute("pattern", "[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}");

    form.appendChild(matricula_input);

    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

function edit_cor_form(data) {
    
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "cor");
    form.appendChild(hidden_field);

    cor_select_box(data);

    var cor_label = document.createElement("label");
    cor_label.setAttribute("for", "input_cor");
    cor_label.innerHTML = "Introduza cor";
    form.appendChild(cor_label);

    var cor_input = document.createElement("input");
    cor_input.setAttribute("class", "form-control");
    cor_input.setAttribute("id", "input_cor");
    cor_input.setAttribute("type", "text");
    cor_input.setAttribute("name", "cor_input");
    cor_input.setAttribute("required", "");


    form.appendChild(cor_input);


    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

function edit_fabricante_form(data) {
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "fabricante");
    form.appendChild(hidden_field);

    fabricante_select_box(data);

    var fabricante_label = document.createElement("label");
    fabricante_label.setAttribute("for", "fabricante_input");
    fabricante_label.innerHTML = "Introduza fabricante";
    form.appendChild(fabricante_label);

    var fabricante_input = document.createElement("input");
    fabricante_input.setAttribute("class", "form-control");
    fabricante_input.setAttribute("id", "input_cor");
    fabricante_input.setAttribute("type", "text");
    fabricante_input.setAttribute("name", "fabricante_input");
    fabricante_input.setAttribute("required", "");


    form.appendChild(fabricante_input);

    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}

function edit_modelo_form(data) {
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "modelo");
    form.appendChild(hidden_field);
    
    modelo_select_box(data);


    var label_modelo = document.createElement("label");
    label_modelo.setAttribute("for", "modelo_input");
    label_modelo.innerHTML = "Introduza o Modelo";
    form.appendChild(label_modelo);

    var modelo_input = document.createElement("input");
    modelo_input.setAttribute("type", "text");
    modelo_input.setAttribute("name", "modelo_input");
    modelo_input.setAttribute("required", "");
    modelo_input.setAttribute("class", "form-control");

    form.appendChild(modelo_input);


    var submit=document.createElement('input');
    submit.setAttribute('value','Enviar');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-primary my-3');
    form.appendChild(submit);
}







//remover
//remove generator
function remove_form_generator() {


    select_value = document.getElementById('form-selector').value;

    var form = document.getElementById('form-wrap');
    form.innerHTML = "";

    var ajax_package = {
        'select_value': select_value,
        'what_form': 'remove_form',
    };

    
    if(select_value==1){
        //form do automovel
        remove_automovel_form();
    }
    else if(select_value>1&&select_value<5){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
            data: ajax_package,
            success: function (data) {
                
                //console.log(data);
                switch (select_value) {
                    case '2': {//form da cor
                        remove_cor_form(data);
                        break;
                    } //case 2
                    case '3': { //fabricante 
                        remove_fabricante_form(data);
                        break;
                    } //case 3
                    case '4': {
                        //modelo
                        remove_modelo_form(data);
                        break;
                    }//case modelo
                }//switch
            },//success
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        }); //end ajax
    } //if
}

function remove_automovel_form() {
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "automovel");
    form.appendChild(hidden_field);

    var submit=document.createElement('input');
    submit.setAttribute('value','Remover');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-danger my-3');
    form.appendChild(submit);
}

function remove_cor_form(data) {
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "cor");
    form.appendChild(hidden_field);

    cor_select_box(data);


    var submit=document.createElement('input');
    submit.setAttribute('value','Remover');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-danger my-3');
    form.appendChild(submit);
}

function remove_fabricante_form(data) {
    
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "fabricante");
    form.appendChild(hidden_field);

    fabricante_select_box(data);

    var submit=document.createElement('input');
    submit.setAttribute('value','Remover');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-danger my-3');
    form.appendChild(submit);
}


function remove_modelo_form(data) {
    var form=document.getElementById('form-wrap');

    var hidden_field = document.createElement("input");
    hidden_field.setAttribute("type", "hidden");
    hidden_field.setAttribute("name", "form_value");
    hidden_field.setAttribute("value", "modelo");
    form.appendChild(hidden_field);


    modelo_select_box(data);


    var submit=document.createElement('input');
    submit.setAttribute('value','Remover');
    submit.setAttribute('id','submit_button');
    submit.setAttribute('type','submit');
    submit.setAttribute('class','btn btn-danger my-3');
    form.appendChild(submit);
}





//funções para gerar as select boxes pois são sempre iguais em qualquer pagina
function fabricante_select_box(data){
    var form=document.getElementById('form-wrap');

    var lista_fabricantes = data['fabricantes'];

    var label_fabricante = document.createElement("label");
    label_fabricante.setAttribute("for", "fabricante_select");
    label_fabricante.innerHTML = "Selecione Fabricante";
    form.appendChild(label_fabricante);

    var select_fabricante = document.createElement("select");
    select_fabricante.setAttribute("required", "");
    select_fabricante.setAttribute("name", "fabricante_select");
    select_fabricante.setAttribute("id", "fabricante_select");
    select_fabricante.setAttribute("class", "form-control");


    for (var i = 0; i < lista_fabricantes.length; i++) {

        var option = document.createElement("option");
        option.value = lista_fabricantes[i]['id'];
        option.text = lista_fabricantes[i]['nome'];
        select_fabricante.appendChild(option);
    }

    form.appendChild(select_fabricante);
}


function cor_select_box(data){
    var lista_cores=data['cores'];

    var form=document.getElementById('form-wrap');

    var label_label = document.createElement("label");
    label_label.setAttribute("for", "select_cores");
    label_label.innerHTML = "Selecione Cor";
    form.appendChild(label_label);

    var select_cor = document.createElement("select");
    select_cor.setAttribute("required", "");
    select_cor.setAttribute("name", "select_cores");
    select_cor.setAttribute("id", "select_cores");
    select_cor.setAttribute("class", "form-control");



    for (var i = 0; i < lista_cores.length; i++) {
        var option = document.createElement("option");

        option.value = lista_cores[i]['id'];
        option.text = lista_cores[i]['nome'];
        select_cor.appendChild(option);
    }

    form.appendChild(select_cor);
}



function modelo_select_box(data){
    var form=document.getElementById('form-wrap');
    
    var lista_modelos = data['modelos'];

    //modelo select box
    var label_modelo = document.createElement("label");
    label_modelo.setAttribute("for", "select_modelo");
    label_modelo.innerHTML = "Selecione Modelo";
    form.appendChild(label_modelo);

    var select_modelo = document.createElement("select");
    select_modelo.setAttribute("required", "");
    select_modelo.setAttribute("name", "select_modelo");
    select_modelo.setAttribute("id", "select_modelo");
    select_modelo.setAttribute("class", "form-control");
    


    fabricantes = Object.keys(lista_modelos);

    //set an id according to the models fabricante, so they can be hidden and unhidden
    for (var i = 0; i < fabricantes.length; i++) {

        //fabricante=lista_fabricantes[i]['nome'];
        fabricante = fabricantes[i];
        fab_group = document.createElement('optgroup');
        fab_group.setAttribute('label', fabricante);

        for (var x = 0; x < lista_modelos[fabricante].length; x++) {

            var option = document.createElement("option");

            option.setAttribute("class", fabricante.replace(/\s/g, "_"));

            option.value = lista_modelos[fabricante][x]['modelo_id'];
            option.text = lista_modelos[fabricante][x]['modelo'];
            fab_group.appendChild(option);
        }

        select_modelo.appendChild(fab_group);
    }
    //end modelo select box

    form.appendChild(select_modelo);
}