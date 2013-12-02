<?

    setcookie("awesome_cookie", null, time()-1000, "/");
    header('Location: ../visitors.php');
?>
