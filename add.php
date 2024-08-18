
<?php 

include('config/db_connect.php');

$errors = array('name'=>'', 'email'=>'', 'job'=> '', 'salary'=>'');
    // if(isset($_GET['submit'])){ // submit, wich one name}

    if(isset($_POST['submit'])){ // submit, wich one name
        //XSS warning beloww.
        // echo $_POST['email']; if i get like this it's appear an xss situation
        
        // check name
        if(empty($_POST['name'])){
            $errors['name'] = 'an name is required <br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = 'name must be letters and spaces only';
            } 
        }
        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'an email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a valid email address';
            } 
        }
        // check job
        if(empty($_POST['job'])){
            $errors['job'] = 'a job is required <br />';
        } else {
            $job = $_POST['job'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $job)){
                $errors['job'] = 'job must be letters and spaces only';
            }    
        }
        // check salary
        if(empty($_POST['salary'])){
            $errors['salary'] = 'at least one salary is required <br />';
        }else {
            $salary = $_POST['salary'];
            if(!preg_match('/^(\d+)(,\s*\d+)*$/', $salary)){
                $errors['salary'] = 'Salary must be a comma-separated list of numbers';
            }
        }

        if(array_filter($errors)){
            // echo 'errors in the form'; 
        }else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $job = mysqli_real_escape_string($conn, $_POST['job']);
            $salary = mysqli_real_escape_string($conn, $_POST['salary']);

            //  create sql
            $sql = "INSERT INTO employeeInfo(name, email, jobTitle, salary) VALUES('$name','$email','$job','$salary') ";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: index.php'); //redirecting
            }else{
                // error
                echo 'query error: ' . mysqli_error($conn);
            }
        }
        // end of post check
    }
?> 

<!DOCTYPE html>
<html>

    <?php include('templates/header.php');?>

    <section class="black container grey-text">
        <h4 class=" N/A-text center">Add an employee's informations</h4>
        <form action="add.php" class="black" method="POST">
            <label for="">Your Name:</label>
            <input class="white-text" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <div class="deep-orange-text"><?php echo $errors['name']; ?></div>
            <label for="">Your Email:</label>
            <input class="white-text" type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="deep-orange-text"><?php echo $errors['email']; ?></div>
            <label for="">Job Title:</label>
            <input class="white-text" type="text" name="job" value="<?php echo htmlspecialchars($job); ?>">
            <div class="deep-orange-text"><?php echo $errors['job']; ?></div>
            <label for="">Salary:</label>
            <input class="white-text" type="text" name="salary" value="<?php echo htmlspecialchars($salary); ?>">
            <div class="deep-orange-text"><?php echo $errors['salary']; ?></div>
            <div class= "center">
                <input type="submit" name="submit" value="submit" class=" btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php');?>

</html>

