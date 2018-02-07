<?php

class ControllerProductsadd extends Controller
{
    public function index()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
        $data['product'] = array();
        if (func_get_args()) {
            $result = $loader->model('products', 'getProduct', func_get_args());
            $data['product'] = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'product_type_id' => $result['product_type_id'],
                'product_type' => $result['product_type'],
                'category_id' => $result['category_id'],
                'category' => $result['category'],
                'description' => $result['description'],
                'image' => 'image/' . $result['image']
            );
        }

        $results = $loader->model('products', 'getProductTypes', array());
        foreach ($results as $result) {
            $data['product_types'][] = array(
                'id' => $result['id'],
                'name' => $result['name']);
        }
        $results = $loader->model('products', 'getCategories', array());
        foreach ($results as $result) {
            $data['categories'][] = array(
                'id' => $result['id'],
                'name' => $result['name']);
        }
        $loader = new Loader($this->registry);
        $loader->view('productsadd', $data);
    }

    public function add()
    {
        $loader = new Loader($this->registry);
        $post = $this->registry->get('request')->post;
        $loader->model('products', 'addProduct', array(
            $post['product_type_id'],
            $post['category_id'],
            $post['name'],
            $post['description']
        ));
        $id = $this->registry->get('db')->getLastId();
        header('Location: /uran/?products-add&index=' . $id);
    }

    public function imageChange()
    {
        $uploadfile = DIR_IMAGE . basename($_FILES['userfile']['name']);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            chmod($uploadfile, 0755);
        } else {
            echo "Файл не загружен!\n";
            return;
        }

        $loader = new Loader($this->registry);
        $post = $this->registry->get('request')->post;
        $loader->model('products', 'editProductImage', array(basename($_FILES['userfile']['name']), $post['id']));
        header('Location: /uran/?products');
    }

}