<html>
<body>

<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    mysqli_query($con, "CREATE TABLE IF NOT EXISTS house(
                    number INTEGER(3),
                    street VARCHAR(30),
                    price FLOAT(6,2),    
                    bedrooms INTEGER(2)
                    )");

    mysqli_close($con);
?>

</body>
</html>
