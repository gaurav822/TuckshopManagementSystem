<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM product ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>PRODUCTS</h2>
    <p>Essential gadgets for everyday use</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="images/<?=$product['pimage']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['pname']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
        
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>