<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_in extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        //logic untuk menambah stok di sini
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');

        $this->db->set('quantity', 'quantity+'.$quantity, FALSE);
        $this->db->where('id', $product_id);
        $this->db->update('products');
    }
}
