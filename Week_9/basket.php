<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Basket</title>
        <link rel="stylesheet" type="text/css" href="extra/stylesheet.css" />
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
                echo '<p>Your shopping basket is empty! <a href="store.php">View products</a>.';
            }
            else{
                echo '<p><a href="store.php">Continue shopping</a></p>';
            }
        ?>
        
       
        <ul>
            <?
                $total_price = 0.0;
                for($i = 0; $i < count($basket); $i++){
                    echo "<li>";
                    echo "<h2>".$basket[$i]->name."</h2>";
                    echo "<p><i>&pound;".$basket[$i]->price."</i></p>";
                    echo "<img src='".$basket[$i]->image."'/>";
                    echo "<p><a href='extra/remove_from_basket.php?id=".$basket[$i]->id."'>Remove from basket</a></p>";
                    echo "</li>";
                    $total_price = $total_price + $basket[$i]->price;
                }

            ?>
        </ul>
    <p>TOTAL COST = &pound;<? echo $total_price; ?> <button id="pay">Checkout</button></p>

    <script>
        var pay_button = document.getElementById("pay");
        pay_button.onclick = pay;

        function pay(){
            window.location = "pay.php";
        }
    </script>

    </body>
</html>

<?
    mysqli_close($con);
?>
