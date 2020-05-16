<?php
$db=mysqli_connect('localhost','root','','dbmsproject');
if (isset($_GET['id'])) {



    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM product WHERE pid = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        die ('Product does not exist!');
    }


    


} else {
    // Simple error to display if the id wasn't specified
    die ('Product does not exist!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="images/<?=$product['pimage']?>" width="500" height="500" alt="<?=$product['pname']?>">
    <div>
        <h1 class="name"><?=$product['pname']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['stock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['pid']?>">
            <input type="submit" value="Add To Cart" name="addbtn">
        </form>
        <div class="description">
            <?=$product['description']?>
        </div>
    </div>
</div>

<?=template_footer()?>