<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    /*
        Create the tables that we need
    */
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS product(
                    id INTEGER(15),
                    name VARCHAR(30),
                    image VARCHAR(50),    
                    price FLOAT(6,2)
                    )");
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS basket(
                    user_id VARCHAR(50),
                    product_id INTEGER(15)
                    )");


    /*
        Insert some products to the product table
    */
    mysqli_query($con, "DELETE FROM product");
    mysqli_query($con, "INSERT INTO product VALUES(
                    1,
                    'Football',
                    'images/football.jpg',
                    15.89
                    )");
    mysqli_query($con, "INSERT INTO product VALUES(
                    2,
                    'Apple',
                    'images/apple.jpg',
                    2.34
                    )");
    mysqli_query($con, "INSERT INTO product VALUES(
                    3,
                    'Broom',
                    'images/broom.jpg',
                    25.00
                    )");
    mysqli_query($con, "INSERT INTO product VALUES(
                    4,
                    'Rubber duck',
                    'images/duck.jpg',
                    214.58
                    )");
    

    echo 'Done!';
    mysqli_close($con);
?>
