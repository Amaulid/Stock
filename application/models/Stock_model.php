<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_products() {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function stock_in($product_id, $quantity) {
        $this->db->set('quantity', 'quantity+'.$quantity, FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');
    }

    public function stock_out($product_id, $quantity) {
        $this->db->set('quantity', 'quantity-'.$quantity, FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');
    }

}
