
<?php 

include('config/db_connect.php');

// write query for all employee
$sql = 'SELECT id, name, email, jobTitle, salary FROM employeeInfo ORDER BY id';

// make query & get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?> 

<!DOCTYPE html>
<html>

    <?php include('templates/header.php');?>

    <h4 class="black center grey-text">Employees</h4>
    <div class="black container">
        <div class="row">
            <?php foreach($employees as $employee): ?>
                <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="img/anonympe.jpg" class="employee ">
                    <div class="card-content center">
                        <h6> <?php echo htmlspecialchars($employee['name']); ?> </h6>
                        <div> <?php echo htmlspecialchars($employee['jobTitle']); ?> </div>
                    </div>
                    <div class="grey card-action right-align">
                        <a class="white-text" href="details.php?id=<?php echo $employee['id'] ?>">more info</a>
                    </div>
                </div>
                </div>
            <?php endforeach; ?>

                <!-- <?php if(count($employees)>= 2): ?>
                <p>there 2 more emploees</p>
                <?php else:?>
                    <p>there are less than 3 employee</p>
                <?php endif; ?> -->
        </div>
    </div>

    <?php include('templates/footer.php');?>

</html

