<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){
    
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $sql = "DELETE FROM employeeInfo WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // success
        header('Location: index.php ');
    }else{
        // fail
        echo 'query error ' . mysqli_error($conn);
    }

}

// check get request id param
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM employeeInfo WHERE id = $id ";
    
    //  get the query result
    $result = mysqli_query($conn, $sql);

    // fetch the result in array format
    $employee = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>

    <div class="container center grey-text">

        <?php if($employee): ?>
            <h4><?php echo htmlspecialchars($employee['name']); ?></h4>
            <p>JOB TITLE => <?php echo htmlspecialchars($employee['jobTitle']); ?></p>
            <h5>Job Description:</h5>
            <p>BLABLABALBALABDLABABLABLBALBALABLBALABLABLABALABLA </p>
        

            <!-- DELETE FORM -->
             <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo  $employee['id']; ?>">
                <input type="submit" name="delete" value="delete" class="btn brand z-depth-0 ">
             </form>
        <?php else: ?>
            <h5>No Such Employee Exists!</h5>
        <?php endif; ?>
    </div>

    <?php include('templates/footer.php');?>
</html>