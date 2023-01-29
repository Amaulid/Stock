<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_in_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    $this->load->database();
}

public function stock_in($product_id, $quantity)
{
    $this->db->set('quantity', 'quantity+'.$quantity, FALSE);
    $this->db->where('id', $product_id);
    $this->db->update('products');
}
}
