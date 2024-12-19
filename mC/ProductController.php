<?php
require_once 'productModel.php';

class ProductController {
    private $db;

    public function __construct() {
        
        $this->db = new PDO('pgsql:host=localhost;dbname=produit', 'postgres', 'hamza');
    }

    // Fetch all products
    public function getAllProducts() {
        $stmt = $this->db->prepare('SELECT * FROM products');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new product
    public function addProduct($name, $price, $description) {
        $stmt = $this->db->prepare('INSERT INTO products (name, price, description) VALUES (?, ?, ?)');
        $stmt->execute([$name, $price, $description]);
    }

    // Delete a product by ID
    public function deleteProduct($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
    }
}
?>
