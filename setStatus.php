<!-- sessions -->

<?php

if(isset($_POST['submit'])){

    setcookie('status',$_POST['status'], time() + 86400);

    session_start();
    $_SESSION['name']= $_POST['name'];

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>php tutorial</title>
</head>
<body>

<!--  action="index13.php" insteadeofthis -->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <input type="text" name="name">
    <select name="status" id="">
    <option value="admin">admin</option>
    <option value="user">user</option>
    </select>
    <input type="submit" name="submit" value="submit" >
</form>

</body>
</html>