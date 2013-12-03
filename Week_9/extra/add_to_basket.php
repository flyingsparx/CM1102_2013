<?

    $con = mysqli_connect("localhost","will","berlin","cm1102");

    $item_id = $_GET["id"];
    $user_id = null;

    if(isset($_COOKIE["shop_cookie"])){
        $user_id = $_COOKIE["shop_cookie"];        
    }
    else{
        $user_id = uniqid();
    }

    mysqli_query($con, "INSERT INTO basket VALUES(
                        '$user_id',
                        $item_id
                        )");
    mysqli_close($con);

   setcookie("shop_cookie", $user_id, time()+10000,"/");
   header('Location: ../store.php');

?>
