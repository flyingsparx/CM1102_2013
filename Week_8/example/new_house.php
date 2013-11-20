<?

    /*
    First, let's get the data out of our form from house.php
    
    We use the $_POST array as the data was told to use the POST method in
    the HTML form.
    */
    $number = $_POST['number'];
    $street = $_POST['street'];
    $price = $_POST['price'];
    $bedrooms = $_POST['bedrooms'];

    /* Connect to the database as before */
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    /* Insert our new data */
    mysqli_query($con, "INSERT INTO house VALUES(
                        $number,
                        '$street',
                        $price,
                        $bedrooms
                        )");

    /* Close the database connection */
    mysqli_close($con);

    /* Redirect user back to house.php */
    header('Location: house.php');

?>
