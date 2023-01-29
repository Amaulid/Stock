<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    $this->load->database();
}

public function get_all_products()
{
    $this->db->select('*');
    $this->db->from('products');
    $query = $this->db->get();
    return $query->result();
}

public function add_product($data)
    {
        $this->db->insert('products', $data);
    }

function get_product_by_name($name) 
{
    $this->db->where('name', $name);
    $query = $this->db->get('products');
    return $query->row();
}
function update_product_quantity($id, $quantity) 
{
    $this->db->set('quantity', $quantity);
    $this->db->where('id', $id);
    $this->db->update('products');
}


public function get_product($id) 
{
    $this->db->where('id', $id);
    $query = $this->db->get('products');
    return $query->row();
}

public function update_product($id, $data) 
{
    $this->db->where('id', $id);
    $this->db->update('products', $data);
}


public function delete_product($id) 
{
    $this->db->where('id', $id);
    $this->db->delete('products');
}

public function get_by_name($name)
{
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('name', $name);
    $query = $this->db->get();
    return $query->row();
}

public function search($product_name)
{
    $this->db->like('name', $product_name);
    $query = $this->db->get('products');
    return $query->result();
}

}