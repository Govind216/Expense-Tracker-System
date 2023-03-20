<?php
include("config/constants.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Budget Goals-Expense Tracker</title>
    
    <link rel="stylesheet" href="./css/style1.css" />
  
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
  </head>
  <body class="bdy">
    <header id="dbhd">
      <section class="navbar" id="dbnav">
          <a id="anav1" href="<?php echo SITEURL?>dashboard.php"> Expense <span class="color-style">Manager.</span></a>
          <div class="signupsignin" id="navbarNav">
              <ul class="horizontal-list">
                  <li class="hr-li">
                      <a class="anav2" href="<?php echo SITEURL?>signout.php">Log Out </a>
                  </li>

              </ul>
          </div>
      </section>
  </header>
    <main>
      <section >
        <div class="container">
          <div class="row">
            <div class="col6">
              <a href="<?php echo SITEURL?>profile.php">
                <button class="backto-btn">
                  <i class="fas fa-long-arrow-alt-left"></i></button
              ></a>
              <section id="add-form">
                <h1 id="add-form">Your Budget Goals</h1>
                <p id="add-form"></p>
                <form method="post" action="">
                  <div class="form-group">
                    <span class="budg">Income:</span>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Income"
                      name="goal"
                      required
                    /><br>
                    <!--for loop : for each category-->
                    <span class="budg">Category 1:</span>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Category 1"
                      name="cat"
                      required
                    /><br>
                    <!--for loop : for each category-->
                  </div>
                  <input type="submit" class="btn custom-btn"> Save </button>
                </form>
              </section>
            </div>
            <div class="col6">
              <img
                src="./images/add-pageImage.png"
                alt="add-image"
                height="auto"
                width="auto"
              />
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>

<?php
 if(isset($_POST['goal'])){
  $email = $_SESSION['user'];
  $goal = $_POST['goal'];
  $cat = $_POST['cat'];
  $sql = "insert into budget values('$email','$cat','$goal')";
  $res = mysqli_query($conn,$sql);
  if(!$res){
    echo mysqli_error($conn);
    die;
  }
  echo "inserted";
 } 
?>