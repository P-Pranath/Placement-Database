<?php include 'inc2_/header_after_login.php'; 
      include 'database3.php';
?>

<?php 
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location:/PDB_/Login2.php");
    die();
}
?>


<?php 
$submittedValue = "";
        $value0 = "";
        $value1 = "student";
        $value2 = "placement";
        $value3 = "company";
        if (isset($_POST["table"])) {
            $submittedValue = $_POST["table"];
        }
?>

<div id="wrap">
  <div id="main" class="container clear-top">
<form class="wrap" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <div class="filter">
         <h5>Select the table:</h5>
      <select project="Select Table:" id="table" class="f1" name="table">
          <option> </option>
          <option value = <?php echo $value1; ?>>Student</option>
          <option value = <?php echo $value2; ?>>Placement</option>
          <option value = <?php echo $value3; ?>>Company</option>
      <input type="submit" value="Submit" class="btn2" />
   </select>

</div>

<div class="cent"> 
      <?php 
      if ($submittedValue == $value1) {
         $sql = "SELECT * FROM $submittedValue";
         $result = mysqli_query($conn, $sql);
         $num = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)){ ?>
                     <table class="table table-borderless table-dark text-align-left">  
                          <tr>  
                               <td><?php echo $row["Name"];?></td>  
                               <td><?php echo $row["USN"];?></td> 
                               <td><?php echo $row["Batch"];?></td>
                               <td><?php echo $row["CGPA"];?></td>
                               <td><?php echo $row["Gender"];?></td> 
                               <td><?php echo $row["Email"];?></td>  
                          </tr>  
                     </table>
      <?php }
      }else if($submittedValue == $value2) {
         $sql = "SELECT * FROM $submittedValue";
         $result = mysqli_query($conn, $sql);
         $num = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){ 

            $qS = "student";
            $que0 = "SELECT * FROM $qS WHERE $qS.USN = '$row[USN_P]' ";
            $qur0 = mysqli_query($conn, $que0);
            $ans0 = mysqli_fetch_assoc($qur0);

            $variable = "company";
            $que = "SELECT * FROM $variable WHERE $variable.CID = $row[Cid_1]";
            $qur = mysqli_query($conn, $que);
            $ans = mysqli_fetch_assoc($qur);

            $que2 = "SELECT * FROM $variable WHERE $variable.CID = $row[Cid_2]";
            $qur2 = mysqli_query($conn, $que2);
            $ans2 = mysqli_fetch_assoc($qur2);

            $que3 = "SELECT * FROM $variable WHERE $variable.CID = $row[Cid_3]";
            $qur3 = mysqli_query($conn, $que3);
            $ans3 = mysqli_fetch_assoc($qur3);
            ?>

            <table class="table table-borderless table-dark">  
                          <tr>
                               <td><?php echo $ans0["Name"];?></td>  
                               <td><?php echo $row["USN_P"];?></td>
                               <td><?php echo $ans["C_name"];?></td>
                               <td><?php echo $row["ctc1"];?></td> 
                               <td><?php echo $ans2["C_name"];?></td>
                               <td><?php echo $row["ctc2"];?></td>
                               <td><?php echo $ans3["C_name"];?></td>
                               <td><?php echo $row["ctc3"];?></td>     
                          </tr>  
                     </table>
      <?php }
      }else if($submittedValue == $value3) {
         $sql = "SELECT * FROM $submittedValue";
         $result = mysqli_query($conn, $sql);
         $num = mysqli_num_rows($result);
         while($row = mysqli_fetch_assoc($result)){ 
            ?>
            <table class="table table-borderless table-dark">  
                          <tr>  
                               <td><?php echo $row["C_name"];?></td>  
                               <td><?php echo $row["HQ"];?></td>   
                               <td><?php echo $row["emp_num"];?></td> 
                               <td><?php echo $row["Revenue"];?></td>
                               <td><?php echo $row["URL"];?></td>
                          </tr>  
                     </table>
                  <?php }
               } ?>
   </div>
   

</form>

</div>
</div>



<?php include 'inc2_/footer2.php'; ?>