<?php

class frota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('DB_handler');
        $this->load->library(array('form_validation', 'session'));
    }

    public function mock_receiver(){
        $mock_data=array(
            'somedata'=>1,
            'otherdata'=>'ok',
        );

        echo json_encode($mock_data);
    }

    //recebe os resultados das paginas adicionar/editar/remover, executa as funções necessarias e retorna para a pagina com o resultado
    public function receive_dynamic_form()
    {
        //in theory codeigniter escapes special caracters, so no need for manual cleaning
        //$data = $this->security->xss_clean($data);
        if (!$this->verify_login()) {
            redirect('frota/pesquisa');
        }

        $form_data = $this->input->post();
        if ($form_data['form_type'] === 'add_form') {

            if ($form_data['form_value'] == 'automovel') {

                $data = array(
                    'modelo_id' => $form_data['select_modelo'],
                    'cor_id' => $form_data['select_cores'],
                    'disponibilidade' => 1,
                    'matricula' => strtoupper($form_data['matricula_input']),
                );

                $table = 'automoveis';

            } else if ($form_data['form_value'] == 'cor') {

                $data = array(
                    'nome' => $form_data['cor_input'],
                );

                $table = 'cores';

            } else if ($form_data['form_value'] == 'fabricante') {

                $data = array(
                    'nome' => $form_data['fabricante_input'],
                );

                $table = 'fabricantes';

            } else if ($form_data['form_value'] == 'modelo') {

                $data = array(
                    'fabricante-id' => $form_data['fabricante_select'],
                    'nome' => $form_data['modelo_input'],
                );

                $table = 'modelos';
            }


            $result = $this->DB_handler->insert_data($table, $data);

            if ($result) {
                redirect('frota/adicionar/sucesso');
            } else {
                redirect('frota/adicionar/falha');
            }

        } else if ($form_data['form_type'] === 'edit_form') {

            if ($form_data['form_value'] == 'automovel') {
                $data_keys=array_keys($form_data);
                
                //cycle thru the keys and find the ids kept in the auto-generated checkboxes
                for($i=0;$i<count($data_keys);$i++){
                    if( strpos($data_keys[$i],'checkbox')!==false ){
                        $car_ids[]=$form_data[$data_keys[$i]];
                    }
                }

                if($form_data['disponibilidade']!=0){
                    $data['disponibilidade']=$form_data['disponibilidade'];
                }

                if($form_data['select_modelo']!=0){
                    $data['modelo_id']=$form_data['select_modelo'];
                }

                if($form_data['select_cores']!=0){
                    $data['cor_id']=$form_data['select_cores'];
                }

                if($form_data['matricula_input']!=''){
                    $data['matricula']=strtoupper($form_data['matricula_input']);
                }

                $table = 'automoveis';

                for($y=0;$y<count($car_ids);$y++){
                    $where=array(
                        'id'=>$car_ids[$y],
                    );
                    $result=$this->DB_handler->update_data($table,$data,$where);
                    if (!$result) {
                        redirect('frota/editar/falha');
                    }
                }
                
                
                
                redirect('frota/editar/sucesso');
                

            } else if ($form_data['form_value'] == 'cor') {

                $data = array(
                    'nome' => $form_data['cor_input'],
                );

                $table = 'cores';

                $where=array(
                    'id'=>$form_data['select_cores'],
                );

            } else if ($form_data['form_value'] == 'fabricante') {

                $data = array(
                    'nome' => $form_data['fabricante_input'],
                );

                $table = 'fabricantes';

                $where=array(
                    'id'=>$form_data['fabricante_select'],
                );

            } else if ($form_data['form_value'] == 'modelo') {

                $data = array(
                    'nome' => $form_data['modelo_input'],
                );

                $table = 'modelos';

                $where=array(
                    'id'=>$form_data['select_modelo'],
                );
            }
            
            $this->DB_handler->update_data($table,$data,$where);

            if ($result) {
                redirect('frota/editar/sucesso');
            } else {
                redirect('frota/editar/falha');
            }
        } else if ($form_data['form_type'] === 'remove_form') {
            echo var_dump($form_data);  

            if ($form_data['form_value'] == 'automovel') {
                $data_keys=array_keys($form_data);
                
                //cycle thru the keys and find the ids kept in the auto-generated checkboxes
                for($i=0;$i<count($data_keys);$i++){
                    if( strpos($data_keys[$i],'checkbox')!==false ){
                        $car_ids[]=$form_data[$data_keys[$i]];
                    }
                }

                $table = 'automoveis';

                for($y=0;$y<count($car_ids);$y++){
                    $where=array(
                        'id'=>$car_ids[$y],
                    );
                    $result=$this->DB_handler->remove_data($table,$where);
                    if (!$result) {
                        redirect('frota/remover/falha');
                    }
                }
                
                
                
                redirect('frota/remover/sucesso');
                

            } else if ($form_data['form_value'] == 'cor') {

                $table = 'cores';

                $where=array(
                    'id'=>$form_data['select_cores'],
                );

            } else if ($form_data['form_value'] == 'fabricante') {

                $table = 'fabricantes';

                $where=array(
                    'id'=>$form_data['fabricante_select'],
                );

            } else if ($form_data['form_value'] == 'modelo') {

                $table = 'modelos';

                $where=array(
                    'id'=>$form_data['select_modelo'],
                );
            }
            
            $result=$this->DB_handler->remove_data($table,$where);

            
            if ($result) {
                redirect('frota/remover/sucesso');
            } else {
                redirect('frota/remover/falha');
            }
        }else{ //acesso invalido
            redirect('frota/admin');
        }

    }

    public function receive_ajax()
    {

        if (!$this->verify_login()) {
            redirect('frota/pesquisa');
        }

        //returns the appropriate data according to the value received from the select in the page
        $selector = $this->input->post();

        if ($selector['what_form'] == 'add_form') { //form do adicionar
            switch ($selector['select_value']) {
                case '1':
                    { //automovel

                        //sorts modelos according to fabricante
                        $modelos_unsorted = $this->DB_handler->get_modelos_with_fabricantes();

                        foreach ($modelos_unsorted as $row) {
                            $fabricante = $row['fabricante'];

                            if (!isset($modelos[$fabricante])) {
                                $modelos[$fabricante] = array();
                            }

                            array_push($modelos[$fabricante], array(
                                'modelo' => $row['modelo'],
                                'modelo_id' => $row['modelo_id'],
                            ));

                        };



                        $return_data = array(
                            "modelos" => $modelos,
                            //"fabricantes"=>$this->DB_handler->get_fabricantes(),
                            "cores" => $this->DB_handler->get_cores(),
                        );

                        echo json_encode($return_data);
                        break;
                    }
                case '4':
                    { //modelos


                        $return_data = array(
                            "fabricantes" => $this->DB_handler->get_fabricantes(),
                        );

                        echo json_encode($return_data);
                        break;
                    }
            }
        } else if ($selector['what_form'] == 'edit_form') { //form do editar
            switch ($selector['select_value']) {
                case '1':
                    { //automovel

                        //sorts modelos according to fabricante
                        $modelos_unsorted = $this->DB_handler->get_modelos_with_fabricantes();

                        foreach ($modelos_unsorted as $row) {
                            $fabricante = $row['fabricante'];

                            if (!isset($modelos[$fabricante])) {
                                $modelos[$fabricante] = array();
                            }

                            array_push($modelos[$fabricante], array(
                                'modelo' => $row['modelo'],
                                'modelo_id' => $row['modelo_id'],
                            ));

                        };



                        $return_data = array(
                            "modelos" => $modelos,
                            //"fabricantes"=>$this->DB_handler->get_fabricantes(),
                            "cores" => $this->DB_handler->get_cores(),
                        );

                        echo json_encode($return_data);
                        break;
                    }
                case '2':
                {
                    $return_data = array(
                        "cores" => $this->DB_handler->get_cores(),
                    );

                    echo json_encode($return_data);
                    break;
                }
                case '3':
                {
                    $return_data = array(
                        "fabricantes" => $this->DB_handler->get_fabricantes(),
                    );

                    echo json_encode($return_data);
                    break;
                }
                case '4':
                { //modelos
                                            
                    //sorts modelos according to fabricante
                    $modelos_unsorted = $this->DB_handler->get_modelos_with_fabricantes();

                    foreach ($modelos_unsorted as $row) {
                        $fabricante = $row['fabricante'];

                        if (!isset($modelos[$fabricante])) {
                            $modelos[$fabricante] = array();
                        }

                        array_push($modelos[$fabricante], array(
                            'modelo' => $row['modelo'],
                            'modelo_id' => $row['modelo_id'],
                        ));

                    };

                    $return_data = array(
                        "modelos" => $modelos,
                    );

                    echo json_encode($return_data);
                    break;
                }
            }
        } else if ($selector['what_form'] == 'remove_form') { //form do remover
            switch ($selector['select_value']) {
                case '2':
                {
                    $return_data = array(
                        "cores" => $this->DB_handler->get_cores(),
                    );

                    echo json_encode($return_data);
                    break;
                }
                case '3':
                {
                    $return_data = array(
                        "fabricantes" => $this->DB_handler->get_fabricantes(),
                    );

                    echo json_encode($return_data);
                    break;
                }
                case '4':
                { //modelos
                                            
                    //sorts modelos according to fabricante
                    $modelos_unsorted = $this->DB_handler->get_modelos_with_fabricantes();

                    foreach ($modelos_unsorted as $row) {
                        $fabricante = $row['fabricante'];

                        if (!isset($modelos[$fabricante])) {
                            $modelos[$fabricante] = array();
                        }

                        array_push($modelos[$fabricante], array(
                            'modelo' => $row['modelo'],
                            'modelo_id' => $row['modelo_id'],
                        ));

                    };

                    $return_data = array(
                        "modelos" => $modelos,
                    );

                    echo json_encode($return_data);
                    break;
                }
            }
        } else if($selector['what_form'] == 'table_data'){
            switch($selector['select_value']){
                case '0':{
                    echo json_encode($this->DB_handler->get_cars());
                    break;
                }
                case '1':{
                    //modelo
                    echo json_encode($this->DB_handler->get_cars_filtered($selector['keyword'],'modelo'));
                    break;
                }
                case '2':{
                    //matricula
                    echo json_encode($this->DB_handler->get_cars_filtered($selector['keyword'],'matricula'));
                    break;
                }
                case '3':{
                    //fabricante
                    echo json_encode($this->DB_handler->get_cars_filtered($selector['keyword'],'fabricante'));
                    break;
                }
            }
        }else{ //acesso invalido
            redirect('frota/admin');
        }

    }


    public function test(){
            echo var_dump($this->DB_handler->get_modelos_with_fabricantes())    ;
        }


    public function verify_login()
    {
        //check if all the data is correct, if user is logged in, and the token is based from the id stored in the db


        if ($this->session->userdata('logged_in')) {
            $data=array('email' => $this->session->userdata['email']);
            $result = $this->DB_handler->get_user($data);
            if (isset($result)) {
                if (password_verify($result->id, $this->session->userdata['token'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false; //not logged in or invalid credentials
        }
    }

    public function index()
    {
        redirect('frota/pesquisa');
    }


    public function login()
    {
        if ($this->verify_login()) {
            redirect('frota/admin');
        }


        $rules = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'pass',
                'label' => 'Pass',
                'rules' => 'required',
            ),
        );
        $this->form_validation->set_rules($rules);



        //form retry switch
        $retry = false;

        if ($this->form_validation->run() == false) {
            $retry = true;
        } else {

            //sanitize input and check is user exists in db
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('pass'));

            $data=array(
                'email' => $email, 
                'password' => $password
            );

            $result = $this->DB_handler->get_user($data);

            if (isset($result)) {

                //credentials find, start session
                $user = array(
                    'email' => $email,
                    'logged_in' => 'true',
                    'token' => password_hash($result->id, PASSWORD_BCRYPT)
                );


                $this->session->set_userdata($user);

                redirect('frota/admin');
            } else {

                //credentials not found, retry form
                $retry = true;
            }
        }

        if ($retry) {
            $this->load->view('templates/html_start');
            $this->load->view('templates/header');
            $this->load->view('templates/login');
            $this->load->view('templates/html_end');
        }
    }


    public function logout()
    {
        $user = array(
            'email' => '',
            'logged_in' => 'false',
            'token' => ''
        );

        $this->session->unset_userdata($user);
        $this->session->sess_destroy();

        redirect('publico');
    }



    public function admin()
    {
            if (!$this->verify_login()) {
                redirect('frota/pesquisa');
            }

        $this->verify_login();

        $car_list = $this->DB_handler->get_cars();

        if ($this->input->post('tab_form')) {
            $data['tab'] = $this->input->post('tab');
        } else {
            $data['tab'] = 0;
        }

        $data['cars'] = $car_list;

        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/admin_page/admin_dashboard', $data);
        $this->load->view('templates/html_end');
    }


    /*
    public function pesquisa($tab = 0)
    {
        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        //theses view are here so the error can be displayed after them


        $car_list = array();


        //if user inputted a search, filter db
        if ($this->input->post('search_form')) {
            $car_list = $this->DB_handler->get_cars_filtered($this->input->post('search_input'), $this->input->post('categoria'));

            if (count($car_list) == 0) {
                //in case the search returns nothing, display error
                $message_type['error'] = 'true';
                $this->load->view('templates/alert_message', $message_type);

            } else {
                $message_type['success'] = 'true';
                $this->load->view('templates/alert_message', $message_type);
                //pass the search form values to the pagination form, so when the page is changed the search form values persist and db can be filtered
                //the alternative is store the form values or database result in a variable inside the controller
                //or ajax

                $data['hidden_vals'] = array(
                    'search_form' => 'true',
                    'search_input' => $this->input->post('search_input'),
                    'categoria' => $this->input->post('categoria'),
                    'tab_form' => 'true'
                );
            }
        }

        //filter failed so get db normally
        if (count($car_list) == 0) {
            if (isset($data['hidden_fields'])) {
                unset($data['hidden_fields']);
            }
            $car_list = $this->DB_handler->get_cars();
        }

        //preserve/repass tab position
        if ($this->input->post('tab_form')) {
            $data['tab'] = $this->input->post('tab');
        } else {
            $data['tab'] = 0;
        }


        $data['cars'] = $car_list;
        $this->load->view('templates/pesquisa', $data);
        $this->load->view('templates/html_end');
    }*/ 

    public function pesquisa(){
        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/pesquisa_ajax');
        $this->load->view('templates/html_end');
    }


    //admin console
    public function adicionar($result=0)
    {
        if (!$this->verify_login()) {
            redirect('frota/pesquisa');
        }

        $data=array(
            'result'=>$result,
        );

        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/admin_page/adicionar',$data);
        $this->load->view('templates/html_end');
    }



    public function editar($result=0)
    {
        if (!$this->verify_login()) {
            redirect('frota/pesquisa');
        }

        $data=array(
            'result'=>$result,
        );

        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/admin_page/editar',$data);
        $this->load->view('templates/html_end');
    }



    public function remover($result=0)
    {
        if (!$this->verify_login()) {
            redirect('frota/pesquisa');
        }

        $data=array(
            'result'=>$result,
        );

        $this->load->view('templates/html_start');
        $this->load->view('templates/header');
        $this->load->view('templates/admin_page/remover',$data);
        $this->load->view('templates/html_end');
    }
}

?>