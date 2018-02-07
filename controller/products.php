<?php

class ControllerProducts extends Controller
{
    public function index()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
        $results = $loader->model('products', 'getProducts', array());
        foreach ($results as $result) {
            $data['products'][] = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'product_type' => $result['product_type'],
                'category' => $result['category'],
                'description' => $result['description'],
                'image' => 'image/' . $result['image']
            );
        }
        $loader = new Loader($this->registry);
        $loader->view('products', $data);
    }

    public function delete()
    {
        $loader = new Loader($this->registry);
        $loader->model('products', 'deleteProduct', func_get_args());
        header('Location: /uran/?products');
    }

    public function edit()
    {
        if (func_get_args()) {
            $id = func_get_args()[0];
        } else return;

        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
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
        $loader->view('productsedit', $data);
    }

    public function change()
    {
        if (func_get_args()) {
            $id = func_get_args()[0];
        } else return;

        $loader = new Loader($this->registry);
        $post = $this->registry->get('request')->post;
        $loader->model('products', 'editProduct', array($post['product_type_id'], $post['category_id'], $post['name'], $post['description'], $id));
        header('Location: /uran/?products');
    }

    public function search()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
        $post = $this->registry->get('request')->post;
        $results = $loader->model('products', 'searchProducts', array('%' . $post['search'] . '%'));
        foreach ($results as $result) {
            $data['products'][] = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'product_type' => $result['product_type'],
                'category' => $result['category'],
                'description' => $result['description'],
                'image' => 'image/' . $result['image']
            );
        }
        $loader = new Loader($this->registry);
        $loader->view('products', $data);
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
        header('Location: /uran/?products&change=' . $post['product_id']);
    }

    public function addProductAjax()
    {
        $post = $this->registry->get('request')->post;
        $loader = new Loader($this->registry);
        $loader->model('products', 'editProduct', array($post['product_type_id'], $post['category_id'], $post['name'], $post['description'], $post['id']));

        echo json_encode(array('name'=>$post['name'], 'description'=>$post['description']));
    }

}