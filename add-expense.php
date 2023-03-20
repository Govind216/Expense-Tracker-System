<?php
include("config/constants.php");
$em = $_SESSION['user'];
$sql = "select category from categories where email = '$em'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
setcookie("category", $row['category']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Expense-Expense Tracker</title>

  <link rel="stylesheet" href="./css/style1.css" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bdy">
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
    <section id="add-expense-section">
      <div class="container">
        <div class="row">
          <div class="col6">
            <a href="<?php echo SITEURL ?>dashboard.php">
              <button class="backto-btn">
                <i class="fas fa-long-arrow-alt-left"></i></button></a>

            <section id="add-form">
              <h1>ADD EXPENSE</h1>
              <p>Add your all expenses here</p>
              <form method="POST" action="" id="addExpense-form" enctype="multipart/form-data">
                <div class="form-group">
                  <select class="custom-select" id="category-select" aria-placeholder="Select Category" name="c-se">
                  </select>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="ExpenseTextDetails" placeholder="Enter Text Details" name="txt" />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="expensePrice" placeholder="Enter Price" name="price" />
                </div>
                <span class="budg">Upload receipt:</span><br /><br />
                <label for="myfile" style="color: white;">Select a file:</label><br />
                <input type="file" id="myfile" name="myfile" style="color: white;" />
                <br /><br />
                <button type="submit" id="btn-load" class="btn custom-btn">
                  Save
                </button>
              </form>
            </section>
            <!-- check if the input expenditure is exceeding budget goals -->
          </div>
          <div class="col6">
            <img src="./images/add-pageImage.png" alt="add-image" height="auto" width="auto" />
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    }
    const categories = unescape(getCookie("category")).split(",");
    var select = document.getElementById("category-select");
    for (const category of categories) {
      var option = document.createElement("option");
      var optionValue = document.createTextNode(category);
      option.appendChild(optionValue);
      select.appendChild(option);
    }
  </script>
</body>

</html>

<?php
if (isset($_POST["txt"])) {
  $txt = $_POST['txt'];
  $cat = $_POST['c-se'];
  $price = $_POST['price'];
  $image = $_FILES['myfile']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));
  $file = mysqli_real_escape_string($conn, file_get_contents($_FILES['myfile']['tmp_name'], ".jpg"));
  $email = $_SESSION['user'];
  $sql = "insert into expenses(email,category,price,receipt,text) values('$email','$cat','$price','$imgContent','$txt');";
  $res = mysqli_query($conn, $sql);
  if (!$res) {
    echo mysqli_error($conn);
  }
}
?>