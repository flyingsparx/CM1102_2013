<?
    $con = mysqli_connect("localhost","will","berlin","cm1102");

    /*
        Create the tables that we need
    */
    mysqli_query($con, "CREATE TABLE IF NOT EXISTS visitor(
                        visitor_id VARCHAR(30),
                        visit_count int(3),
                        last_visit VARCHAR(30)
                        )");
    
    mysqli_query($con, "DELETE FROM visitor");

    echo 'Done!';
    mysqli_close($con);
?>
