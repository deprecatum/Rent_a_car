<?php

class DB_handler extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
    }


    public function get_cars()
    {
        //fetch data from all databases and join


        //output 4 cars
        //$this->db->limit('4','4');
        //tab defines the offset


        $this->db->select('automoveis.id as automovel_id, automoveis.matricula as matricula, cores.nome as cor, fabricantes.nome as fabricante, modelos.nome as modelo, automoveis.disponibilidade');
        $this->db->from('automoveis');
        $this->db->join('cores', 'cores.id = automoveis.cor_id');
        $this->db->join('modelos', 'modelos.id = automoveis.modelo_id');
        $this->db->join('fabricantes', 'fabricantes.id = modelos.fabricante-id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_cars_filtered($keyword, $category)
    {
        // $keyword is the user input, used to filter the database output
        // and $category is the column where you compare the $keyword with the values
        //limit removed so results can be counted for tabs

        $this->db->select('automoveis.id as automovel_id,automoveis.matricula as matricula, cores.nome as cor, fabricantes.nome as fabricante, modelos.nome as modelo, automoveis.disponibilidade');
        $this->db->from('automoveis');
        $this->db->join('cores', 'cores.id = automoveis.cor_id');
        $this->db->join('modelos', 'modelos.id = automoveis.modelo_id');
        $this->db->join('fabricantes', 'fabricantes.id = modelos.fabricante-id');

        if ($category == 'modelo') {

            $this->db->where('modelos.nome', $keyword);

            //$this->db->limit(4,$tab*4);

            $query = $this->db->get()->result();

            return $query;

        } else if ($category == 'matricula') {

            $this->db->where('automoveis.matricula', $keyword);

            //$this->db->limit(4,$tab*4);

            $query = $this->db->get()->result();

            return $query;

        } else if ($category == 'fabricante') {


            $this->db->where('fabricantes.nome', $keyword);

            //$this->db->limit(4,$tab*4);

            $query = $this->db->get()->result();

            return $query;
        }

    }

    
    public function get_fabricantes()
    {
        $query = $this->db->get('fabricantes');
        return $query->result_array();
    }

    public function get_modelos()
    {
        $query = $this->db->get('modelos');
        return $query->result_array();
    }

    public function get_cores()
    {
        $query = $this->db->get('cores');
        return $query->result_array();
    }

    public function get_automoveis()
    {
        $query = $this->db->get('automoveis');
        return $query->result_array();
    }

    public function get_modelos_with_fabricantes()
    {
        $this->db->select('fabricantes.nome as fabricante, modelos.nome as modelo, modelos.id as modelo_id');
        $this->db->from('modelos');
        $this->db->join('fabricantes', 'fabricantes.id = modelos.fabricante-id');

        return $this->db->get()->result_array();
    }

    public function insert_data($table, $data){
        return $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where){

        $this->db->set($data);

        $this->db->where($where);

        return $this->db->update($table);
    }

    public function remove_data($table, $where){
        return $this->db->delete($table, $where);
    }

    public function get_user($data){
        return $this->db->get_where('users', $data)->row();
    }
}

?>