<html>
<body>

<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    mysqli_query($con,"INSERT INTO house VALUES (
                20,
                'Rhymney Street',
                580.99,
                3
                )");
    mysqli_query($con,"INSERT INTO house VALUES (
                36,
                'Senghennydd Road',
                350.00,
                2
                )");    
    mysqli_query($con,"INSERT INTO house VALUES (
                87,
                'Rhymney Street',
                278.50,
                1
                )");
    mysqli_query($con,"INSERT INTO house VALUES (
                41,
                'Cathays Terrace',
                1180.99,
                5
                )");

    mysqli_close($con);
?>

</body>
</html>
