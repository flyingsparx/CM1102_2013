<html>
<body>

<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");  

    if(!$con){
        echo "There was an error connecting to this database.";
    }

    else{
        echo "Success!";
        mysqli_close($con);
    }

?>

</body>
</html>
