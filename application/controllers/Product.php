<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Product_model');

    }

    public function index()
    {
        //logic untuk menampilkan data produk di sini
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $data['products'] = $query->result();
        $this->load->view('product_view', $data);
    }

    public function add() {
        $this->load->view('product_add_view');
    }

    public function save() {
        // Code to add a new product
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $product = $this->Product_model->get_product_by_name($name);
        if ($product) {
            // If the product already exists, update its quantity
            $new_quantity = $product->quantity + $quantity;
            $this->Product_model->update_product_quantity($product->id, $new_quantity);
        } else {
            // If the product doesn't exist, insert a new record
            $data = array(
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            );
            $this->Product_model->add_product($data);
        }
        redirect('product');
    }    

    public function edit($id) {
        $data['product'] = $this->Product_model->get_product($id);
        $this->load->view('product_edit_view', $data);
    }

    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity')
        );

        $this->Product_model->update_product($id, $data);
        redirect(base_url('product'));
    }


    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect(base_url('product'));
    }

    public function search()
    {
        $product_name = $this->input->get('term');
        $data = $this->Product_model->search($product_name);
        $response = array();
        foreach($data as $row)
        {
            $response[] = array("label"=>$row->name,"price"=>$row->price,"quantity"=>$row->quantity);
        }
        echo json_encode($response);
    }
    
    

}
