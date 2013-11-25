<?
    $item_id = $_GET["id"];
    $user_id = null;

    if(isset($_COOKIE["shop_cookie"])){
        $user_id = $_COOKIE["shop_cookie"];        
    }
    else{
        header('Location: ../product_list.php');    
    }

    $con = mysqli_connect("localhost","will","berlin","cm1102");
    mysqli_query($con, "DELETE FROM basket WHERE 
                        user_id = '$user_id' 
                        ");

    mysqli_close($con);

    echo '<h1>Thank you!</h1><p>Your payment was successful. <a href="../store.php">Return to store</a>.</p>';
?>
