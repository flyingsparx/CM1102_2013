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
        <h1>Pay for your items</h1>
        
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
                echo '<p>Not finished yet? <a href="store.php">Continue shopping</a></p>';
            }
        ?>

       <p>Changed your mind? <a href="basket.php">Edit your basket</a></p>

       <table>
            <tr>
                <th>Image</th>
                <th>Item name</th>
                <th>Price</th>
            </tr>
            <?
                $total_price = 0.0;
                for($i = 0; $i < count($basket); $i++){
                    echo "<tr>";
                    echo "<td><img src='".$basket[$i]->image."' style='height:80px;' /></td>";
                    echo "<td>".$basket[$i]->name."</td>";
                    echo "<td>&pound;".$basket[$i]->price."</td>";
                    echo "</tr>";
                    $total_price = $total_price + $basket[$i]->price;
                }
            ?>
        </table>
        <p>TOTAL COST = &pound;<? echo $total_price; ?> <button id="pay">Confirm payment</button></p>

    <script>
        var pay_button = document.getElementById("pay");
        pay_button.onclick = pay;

        function pay(){
            window.location = "extra/make_payment.php";
        }
    </script>
    </body>
</html>

<?
    mysqli_close($con);
?>
