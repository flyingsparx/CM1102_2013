<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Basket</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    </head>
    <body>
        <h1>This is your shopping basket</h1>
        
        <?
            $basket = array();
            if(isset($_COOKIE["shop_cookie"])){
                $user_id = $_COOKIE["shop_cookie"];
                $result = mysqli_query($con, "SELECT * FROM basket WHERE user_id='$user_id'");
                while($product = $result->fetch_object()){
                    $product_id = $product->product_id;
                    $item = mysqli_query($con, "SELECT * FROM product WHERE id=$product_id");
                    $basket[] = $item->fetch_object();
                }                
            }
            if(count($basket) == 0){
                echo '<p>Your shopping basket is empty! <a href="product_list.php">View products</a>.';
            }
            else{
                echo '<p><a href="product_list.php">Continue shopping</a></p>';
            }
        ?>
        
       
        <ul>
            <?
                for($i = 0; $i < count($basket); $i++){
                    echo "<li>";
                    echo "<h2>".$basket[$i]->name."</h2>";
                    echo "<img src='".$basket[$i]->image."'/>";
                    echo "<p><a href='remove_from_basket.php?id=".$basket[$i]->id."'>Remove from basket</a></p>";
                    echo "</li>";
                }

            ?>
        </ul>
    </body>
</html>

<?
    mysqli_close($con);
?>
