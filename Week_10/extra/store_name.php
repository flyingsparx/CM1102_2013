<?

    $name = $_POST["name"];

    $con = mysqli_connect("localhost","will","berlin","cm1102");
    $result = mysqli_query($con, "SELECT * FROM visitor WHERE visitor_name='$name'");

    if(mysqli_num_rows($result) > 0){
        header('Location: ../visitors.php?error=that user already exists');
        exit();
    }
    else if(strcmp($name, "") == 0){
        header('Location: ../visitors.php?error=please enter a name');  
        exit(); 
    }
    else{
        $current_date = date("Y-m-d H:i:s");
        mysqli_query($con, "INSERT INTO visitor VALUES(
                            '$name',
                            0,
                            '$current_date'
                            )");
        header('Location: ../visitors.php');
        setcookie("awesome_cookie", $name, time()+60*60*24, "/");
    }

?>
