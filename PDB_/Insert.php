<?php 
  include 'inc2_/header_after_login.php'; 
  include 'database3.php';
?>
<?php 
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location:/PDB_/Login2.php");
    die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>


    <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $Name = $USN = $gender = $email = $batch = $Cgpa = "";
  $name_err = $usn_err = $gender_err = $email_err = $batch_err = $cgpa_err = "";
  if(empty(trim($_POST["Name"]))){
        $name_err = "Please enter username.";
    } else{
        $Name = trim($_POST["Name"]);
    }

  if(empty(trim($_POST["usn"]))){
        $usn_err = "Please enter username.";
    } else{
        $USN = trim($_POST["usn"]);
    }
    
  if(empty(trim($_POST["email"]))){
        $email_err = "Please enter username.";
    } else{
        $email = trim($_POST["email"]);
    }

  if(empty(trim($_POST["batch"]))){
        $batch_err = "Please enter username.";
    } else{
        $batch = trim($_POST["batch"]);
    }  

  if(empty(trim($_POST["cgpa"]))){
        $cgpa_err = "Please enter username.";
    } else{
        $Cgpa = trim($_POST["cgpa"]);
    }

if(!empty($Name) && !empty($USN)){
    $stmt = $conn->prepare("insert into student(Name, USN, Email, Branch_id, Batch, CGPA, Gender) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisds", $Name, $USN, $email, $branch, $batch, $Cgpa, $gender);
    $execval = $stmt->execute(); 
    echo "<script> window.location.href= 'Insert.php'; </script>";
    $stmt->close();
    $conn->close();
  }else{
    echo "<script> window.location.href= 'Insert.php'; </script>";
  }

  } ?>


<?php 
        $gender = "";
        $value0 = 'F';
        $value1 = 'M';
        if (isset($_POST["table"])) {
                $gender = $_POST["table"];
                      } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="">
    <div class="insmain">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="connect.php" method="post">
              <div class="form-group">
                <label for="Name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="Name"
                  name="Name"
                />
              </div>
              <div class="form-group">
                <label for="USN">USN</label>
                <input
                  type="text"
                  class="form-control"
                  id="usn"
                  name="usn"
                />
              </div>

              <div class="form-group">
                <label>Gender</label>
                    <select project="Select Table:" id="gender" class="mr-20" name="gender">
                        <option value = <?php echo $value0; ?>>Male</option>
                        <option value = <?php echo $value1; ?>>Female</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="branch">Branch</label>
                <div>
                  <label for="ise" class="radio-inline"
                    ><input
                      type="radio"
                      name="branch"
                      value= 1
                      id="ise"
                    />Information Science</label
                  >
                  <label for="cse" class="radio-inline"
                    ><input
                      type="radio"
                      name="branch"
                      value= 2
                      id="cse"
                    />Computer Science</label>
                </div>
              </div>
              <div class="form-group">
                <label for="batch">Batch</label>
                <input
                  type="text"
                  class="form-control"
                  id="batch"
                  name="batch"
                />
              </div>
              <div class="form-group">
                <label for="cgpa">CGPA</label>
                <input
                  type="number"
                  class="form-control"
                  id="cgpa"
                  name="cgpa"
                />
              </div>
              <input type="submit" class="btn btn-dark inss" />
            </form>
          </div>
          <div class="panel-footer text-right">
          </div>
        </div>
      </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
</form>
  </body>
</html>

<?php include 'inc2_/footer2.php'; ?>