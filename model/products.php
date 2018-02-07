<?php

class ModelProducts extends Model
{
    public function getProducts()
    {
        $query = $this->registry->get('db')->query("SELECT p.id, pt.name product_type, c.name category, p.name, p.description, p.image FROM product p LEFT JOIN product_type pt ON p.product_type_id = pt.id LEFT JOIN category c ON p.category_id = c.id");
        return $query->rows;
    }

    public function getProduct()
    {
        $query = $this->registry->get('db')->query("SELECT p.id, p.product_type_id, pt.name product_type, p.category_id, c.name category, p.name, p.description, p.image FROM product p LEFT JOIN product_type pt ON p.product_type_id = pt.id LEFT JOIN category c ON p.category_id = c.id WHERE p.id = ?", func_get_args());
        return $query->row;
    }

    public function deleteProduct()
    {
        $query = $this->registry->get('db')->query("DELETE FROM product WHERE id = ?", func_get_args());
        return $query->row;
    }

    public function getProductTypes()
    {
        $query = $this->registry->get('db')->query("SELECT * FROM product_type");
        return $query->rows;
    }

    public function getCategories()
    {
        $query = $this->registry->get('db')->query("SELECT * FROM category");
        return $query->rows;
    }

    public function addProduct()
    {
        $query = $this->registry->get('db')->query("INSERT INTO product (product_type_id, category_id, name, description) VALUES (?, ?, ?, ?)", func_get_args());
        return $query->rows;
    }

    public function editProduct()
    {

        $query = $this->registry->get('db')->query("UPDATE product SET product_type_id = ?, category_id = ?, name = ?, description = ? WHERE id = ?", func_get_args());
        return $query->rows;
    }

    public function editProductImage()
    {

        $query = $this->registry->get('db')->query("UPDATE product SET image = ? WHERE id = ?", func_get_args());
        return $query->rows;
    }

    public function searchProducts()
    {
        $query = $this->registry->get('db')->query("SELECT p.id, pt.name product_type, c.name category, p.name, p.description, p.image FROM product p LEFT JOIN product_type pt ON p.product_type_id = pt.id LEFT JOIN category c ON p.category_id = c.id WHERE p.name LIKE ?", func_get_args());
        return $query->rows;
    }

}