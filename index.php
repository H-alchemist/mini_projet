<?php
require_once './mC/ProductController.php';

$controller = new ProductController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->addProduct($_POST['name'], $_POST['price'], $_POST['description']);
    header('Location: index.php'); // Redirect after adding
    exit;
}

// Handle product deletion
if (isset($_GET['delete'])) {
    $controller->deleteProduct($_GET['delete']);
    header('Location: index.php'); // Redirect after deletion
    exit;
}

// Fetch all products to display
$products = $controller->getAllProducts();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gestion de Produits</title>
</head>
<body>
    <div id="app">
        <h1>Liste des Produits</h1>
        <div id="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <span><strong><?php echo htmlspecialchars($product['name']); ?></strong> - <?php echo htmlspecialchars($product['price']); ?>€</span>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <a href="?delete=<?php echo $product['id']; ?>" class="delete-btn">Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Ajouter un produit</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="number" name="price" placeholder="Prix" required>
            <textarea name="description" placeholder="Description"></textarea>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
