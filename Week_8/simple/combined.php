<html>
<body>

<?
    
    /* Make the connection to database 'cm1102' on server 'localhost' */
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    /* If it doesn't already exist, create a table with some columns */
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS house(
                    number INTEGER(3),
                    street VARCHAR(30),
                    price FLOAT(6,2),    
                    bedrooms INTEGER(2)
                    )");

    /* Insert some data to this new table */
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


    /* Query the database in different ways */

    echo '<h2>Below is a list of bedroom sizes we have available:</h2>';
    $result = mysqli_query($con, "SELECT * FROM house");
    while($house = $result->fetch_object()){ 
        echo $house->bedrooms.', ';
    }
        
    echo '<h2>Below is a list of houses with 3 bedrooms:</h2>';
    $result = mysqli_query($con, "SELECT * FROM house WHERE bedrooms = 3");
    while($house = $result->fetch_object()){ 
        echo $house->number.', '.$house->street.'<br />';
    }
    
    echo '<h2>Below is a list of houses costing less than &pound;500:</h2>';
    $result = mysqli_query($con, "SELECT * FROM house WHERE price < 500");
    while($house = $result->fetch_object()){ 
        echo $house->number.', '.$house->street.'<br />';
    }


    /* Close the connection to the database */
    mysqli_close($con);
?>

</body>
</html>

