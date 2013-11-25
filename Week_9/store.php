<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop products</title>
        <link rel="stylesheet" type="text/css" href="extra/stylesheet.css" />
    </head>
    <body>
        <h1>Please browse through our products</h1>
        
        <?
            $basket = array();
            if(isset($_COOKIE["shop_cookie"])){
                $result = mysqli_query($con, "SELECT * FROM basket WHERE user_id='".$_COOKIE['shop_cookie']."'");
                while($product = $result->fetch_object()){
                    $basket[] = $product->product_id;
                }                

                echo '<p><a href="basket.php">Your basket ('.count($basket).')</a></p>';
            }
        ?>
        
        <ul>
            <?
            $result = mysqli_query($con, "SELECT * FROM product ORDER BY id ASC");
            while($product = $result->fetch_object()){
                echo '<li>';
                echo '<h2>'.$product->name.'</h2>';
                echo "<p><i>&pound;".$product->price."</i></p>";
                echo '<img src="'.$product->image.'" />';
                if(in_array($product->id, $basket)){
                    echo '<p>This item is in your basket</p>';
                }
                else{
                    echo '<p><a href="extra/add_to_basket.php?id='.$product->id.'">Add to basket</a></p>';
                }
                echo '</li>';
            };
            ?>
        </ul>
    </body>
</html>

<?
    mysqli_close($con);
?>
