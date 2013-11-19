<!DOCTYPE html>
<html>

    <head>
        <title>Estate Agency</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    </head>

    <body>
        <h1>Estate Agency</h1>
        
        <h2>Our current houses</h2>
        <table>
            <tr>
                <th>House number</th>
                <th>Street name</th>
                <th>Price (per month)</th>
                <th>Num. bedrooms</th>
            </tr>

            <?   
            $con = mysqli_connect("localhost","will","berlin","cm1102"); 
            $result = mysqli_query($con, "SELECT * FROM house");
            while($house = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$house->number.'</td>';
                echo '<td>'.$house->street.'</td>';
                echo '<td>&pound;'.$house->price.'</td>';            
                echo '<td>'.$house->bedrooms.'</td>';
                echo '</tr>';
            }
            mysqli_close($con);
            ?>
        </table>


        <h2>Create a new house</h2>
        <form method="POST" action="new_house.php">
            <label>Number</label><input type="text" name="number" /><br />
            <label>Street</label><input type="text" name="street" /><br />
            <label>Price &pound;</label><input type="number" min="0.01" step="0.01" name="price" /><br />
            <label>Bedrooms</label><input type="number" name="bedrooms" /><br /><br />        
            <input type="submit" value="Create house" />
        </form>

    </body>
</html>
