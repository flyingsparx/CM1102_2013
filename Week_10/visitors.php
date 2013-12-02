<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    
    $name = null;
    if(isset($_COOKIE["awesome_cookie"])){
         $name = $_COOKIE["awesome_cookie"];
         
         $result = mysqli_query($con, "SELECT * FROM visitor WHERE visitor_name='$name'");
         $row = $result->fetch_object();
         
         $last_visit = $row->last_visit;
         $visit_count = $row->visit_count;

         $new_last_visit = date("Y-m-d H:i:s");
         $new_visit_count = $visit_count + 1;
         mysqli_query($con, "UPDATE visitor SET
                            visit_count = $new_visit_count,
                            last_visit = '$new_last_visit'
                            WHERE visitor_name = '$name'
                            ");
                        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Visitors</title>
        <link rel="stylesheet" type="text/css" href="extra/stylesheet.css" />
    </head>
    <body>
        <h1>Who has visited this page?</h1>
        
        <?
            if(!isset($_COOKIE["awesome_cookie"])){
        ?>
            <h2>Please enter your name</h2>
            <p class="error"><? echo $_GET["error"]; ?></p>

            <form action="extra/store_name.php" method="POST">
                <input type="text" placeholder="Your name" name="name" />
                <br />
                <input type="submit" value="Continue" />
            </form>
            
        <?        
            }
            else{
        ?>
    
        
            <h2>Hello, <? echo $name; ?>!</h2>
            <p>Your previous visit was on <? echo $last_visit; ?>.</p>
            <p><a href="extra/logout.php">Logout</a></p>
            <table>
                <tr>
                    <th>Visitor</th>
                    <th>Visit count</th>
                    <th>Latest visit</th>
                </tr>
                        
                <?
                $result = mysqli_query($con, "SELECT * FROM visitor");
                while($visitor = $result->fetch_object()){
                    echo '<tr>';
                    echo '<td>'.$visitor->visitor_name.'</td>';
                    echo '<td>'.$visitor->visit_count.'</td>';
                    echo '<td>'.$visitor->last_visit.'</td>';
                    echo '</tr>';
                }
            }
        ?>
        </table>
    </body>
</html>

<?
    mysqli_close($con);
?>
