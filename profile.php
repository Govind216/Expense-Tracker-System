<?php
include("config/constants.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile-Expense Tracker</title>
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./images/favicon.png"
    />
    <link rel="stylesheet" href="./css/style1.css" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <script src="jquery.js"></script>
    <script src="Chart.js"></script>
    <script>
      let a;
      let date;
      let time;
      const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };
      setInterval(() => {
        a = new Date();
        let date = a.toLocaleDateString(undefined, options);
        let time = a.getHours() + ":" + a.getMinutes();
        document.getElementById("time").innerHTML = time + " on " + date;
      }, 1000);
    </script>
    <style>
      table,
      th,
      td {
        border: 1px solid #ff643d;
        border-collapse: collapse;
      }
      th,
      td {
        background-color: white;
        text-align: center;
      }
    </style>
  </head>

  <body class="bdy">
    <header id="dbhd">
      <section class="navbar" id="dbnav">
        <a id="anav1" href="<?php echo SITEURL?>dashboard.php">
          Expense <span class="color-style">Manager.</span></a
        >
        <div class="signupsignin" id="navbarNav">
          <ul class="horizontal-list">
            <li class="hr-li">
              <a class="anav2" href="<?php echo SITEURL?>profile.php">Profile</a>
              <a class="anav2" href="<?php echo SITEURL?>generate-report.php">Generate Report</a>
              <a class="anav2" href="<?php echo SITEURL?>">Log Out </a>
            </li>
          </ul>
        </div>
      </section>
    </header>
    <main>
      <div class="profile">
        <a href="<?php echo SITEURL?>dashboard.php">
            <button class="backto-btn">
            <i class="fas fa-long-arrow-alt-left"></i></button
        ></a>
        <h1>Your Profile</h1>
        <br />
        <h2>Hello, <span class="color-style"><?php echo $_SESSION['name'] ?></span></h2>
        <h2>Welcome!</h2>
        <h3 class="text-center"><span id="time"></span></h3>
      </div>
      <div class="profile">
        <h1>Your Budget Goals</h1>
        <br />
        <table style="width: 100%; color: #1a2238">
          <tr>
            <th>Category</th>
            <th>Limit</th>
          </tr>
          <?php
          $email = $_SESSION['user'];
          $sql = "Select * from budget where email = '$email'";
          $res = mysqli_query($conn,$sql);
          if(!$res){
            echo mysqli_error($conn);
            die;
          }
          while($row = mysqli_fetch_assoc($res)){
            $price = $row['goal'];
            $cat = $row['category'];
            echo "<tr>";
            echo "<td>$cat</td>";
            echo "<td>Rs. $price</td>";
            echo "</tr>";
          }
        ?>
        </table>
        <p>
          <a class="anav2" href="<?php echo SITEURL?>budget-goals.php" style="color: #ff643d"
            >Update your budget goals &nbsp;
            <i class="fas fa-edit" style="font-size: 17px; color: #ff643d"></i
          ></a>
        </p>
      </div>

      <p>Current Expenditure :</p>
      
      <script>
        
      </script>
    </main>
  </body>
</html>
