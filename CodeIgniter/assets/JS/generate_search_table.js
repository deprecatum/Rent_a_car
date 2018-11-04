
//document.getElementById('table_body').onload=function(){request_car_data()};

//window.onload=function(){request_car_data()};

function request_car_data_filtered(){

    var select_value=document.getElementById('select_filter').value;

        

    if(select_value>0&&select_value<4){
        var search_input = document.getElementById('keyword_input').value;
        var ajax_package = {
            'what_form': 'table_data',
            'select_value':select_value,
            'keyword':search_input,
        }

        //if()
            $.ajax({                
                type: "POST",
                dataType: "json",
                url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
                data: ajax_package,
                success: function (data) {
                    if(data.length>0){
                        modify_table(data);
                    }
                },//success
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            });
        
    }

        
    



}

function request_car_data(){

    var ajax_package = {
            'what_form': 'table_data',
            'select_value':'0',
    }

    $.ajax({                
         type: "POST",
            dataType: "json",
            url: "http://[::1]/codeigniter/index.php/frota/receive_ajax",
            data: ajax_package,
            success: function (data) {
                modify_table(data);
            },//success
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
    });
}

function modify_table(data){
    var tbody=document.getElementById('table_body');
    tbody.innerHTML='';

    for(var i=0;i<data.length;i++){
        
        var row = document.createElement('tr');


        var fabricante=document.createElement('td');
        fabricante.innerHTML=data[i]['fabricante'];
        row.appendChild(fabricante);

        var modelo=document.createElement('td');
        modelo.innerHTML=data[i]['modelo'];
        row.appendChild(modelo);

        var cor=document.createElement('td');
        cor.innerHTML=data[i]['cor'];
        row.appendChild(cor);
        
        var matricula=document.createElement('td');
        matricula.innerHTML=data[i]['matricula'];
        row.appendChild(matricula);
        
        var disponibilidade=document.createElement('td');
        disponibilidade.innerHTML=data[i]['disponibilidade'];
        row.appendChild(disponibilidade);

        //console.log(data[i]);
        tbody.appendChild(row);
    }
    //console.log(data);
    //tr for each car
    //td for each val
}

