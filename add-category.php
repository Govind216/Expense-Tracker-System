<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Category-Expense Tracker</title>

  <link rel="stylesheet" href="./css/style1.css" />


  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bdy">
  <?php
  if (isset($_SESSION['addd'])) {
    echo $_SESSION['addd']; //Display the SEssion Message if SEt
    unset($_SESSION['addd']);
  }
  ?>
  <header id="dbhd">
    <section class="navbar" id="dbnav">
      <a id="anav1" href="<?php echo SITEURL ?>dashboard.php"> Expense <span class="color-style">Manager.</span></a>
      <div class="signupsignin" id="navbarNav">
        <ul class="horizontal-list">
          <li class="hr-li">
            <a class="anav2" href="<?php echo SITEURL ?>signout.php">Log Out </a>
          </li>

        </ul>
      </div>
    </section>
  </header>
  <main>
    <section>
      <div class="container">
        <div class="row">
          <div class="col6">
            <a href="<?php echo SITEURL ?>dashboard.php">
              <button class="backto-btn">
                <i class="fas fa-long-arrow-alt-left"></i></button></a>
            <section id="add-form">
              <h1 id="add-form">ADD CATEGORY</h1>
              <p id="add-form">Add Category you want to add</p>
              <form method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Enter Category Name" required name="nm" />
                </div>
                <button type="submit" name="submit" class="btn custom-btn"> Save </button>
              </form>
            </section>
          </div>
          <div class="col6">
            <img src="./images/add-pageImage.png" alt="add-image" height="auto" width="auto" />
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php
  if (isset($_POST['submit'])) {
    $nm = $_POST['nm'];
    $em = $_SESSION['user'];
    $conn = mysqli_connect("localhost", "root", "", 'expense-tracker');
    $sql = "select category from categories where email = '$em'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) == 0) {
      $sql = "INSERT into categories set category='$nm',email='$em'";
      $res = mysqli_query($conn, $sql);
    } else {
      $row = mysqli_fetch_assoc($res);
      $category = $row["category"];
      $added = $category . "," . $nm;
      $sql = "update categories set category = '$added' where email = '$em'";
      $res = mysqli_query($conn, $sql);
    }
    if ($res == TRUE) {
      $_SESSION['addd'] = "<div class='success'>Category Added Successfully.</div>";
      header("location:" . SITEURL . 'dashboard.php');
    } else {
      //FAiled to Insert DAta
      //echo "Faile to Insert Data";
      //Create a Session Variable to Display Message
      $err = mysqli_error($conn);
      $_SESSION['addd'] = "<div style='color:white;' class='error'>Failed to Add Customer.$err</div>";
      //Redirect Page to Add Admin
      header("location:" . SITEURL . 'add-category.php');
    }
  }
  ?>
</body>

</html>