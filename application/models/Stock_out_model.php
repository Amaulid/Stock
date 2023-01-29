<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_out_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    $this->load->database();
}

public function stock_out($product_id, $quantity)
{
    $this->db->set('quantity', 'quantity-'.$quantity, FALSE);
    $this->db->where('id', $product_id);
    $this->db->update('products');
}
}
