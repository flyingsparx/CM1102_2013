<html>
<body>

<?
    $con = mysqli_connect("localhost","will","berlin","cm1102"); 

    
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
    
    mysqli_close($con);             
?>

</body>
</html>
