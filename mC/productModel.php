<?php
class productModel {
    private $model;

    public function __construct() {
        // Initialize the model
        $this->model = new ProductModel();
    }

    // Fetch all products
    public function getAllProducts() {
        return $this->model->getAllProducts();
    }

    // Add a new product
    public function addProduct($name, $price, $description) {
        $this->model->addProduct($name, $price, $description);
    }

    // Delete a product by ID
    public function deleteProduct($id) {
        $this->model->deleteProduct($id);
    }
}
?>
