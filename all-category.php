<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Categories-Expense Tracker</title>
    <link rel="stylesheet" href="./css/style1.css" />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./images/favicon.png"
    />
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
        <section id="add-category-section">
          <div class="container">
            <div class="row">
              <div class="col6">
                <a href="<?php echo SITEURL?>dashboard.php">
                  <button class="backto-btn">
                    <i class="fas fa-long-arrow-alt-left"></i></button
                ></a>

            <img
              src="./images/all-category-img.png"
              style="display: inline"
              class="all-categories-details-img"
              alt="add-image"
              height="auto"
              width="100%"
            />

          </div>
          <div class="col6">
            <section id="all-categories-details">
              <h1 id="all-categories-details">ALL CATEGORIES</h1>
              <h1 style="color:white;">Your all added categories</h1>
              <table>
              <?php
          $email = $_SESSION['user'];
          $sql = "Select category from categories where email = '$email'";
          $res = mysqli_query($conn,$sql);
          if(!$res){
            echo mysqli_error($conn);
            die;
          }
          $sr=1;
          while($row = mysqli_fetch_assoc($res)){
            $category=$row['category'];
            $arr=explode(',',$category);
            foreach($arr as $elt )
            {
            echo "<tr>";
            echo "<h2 style='color:white;'>" .$sr++ . ". " . $elt . "</h2>";         
            echo "</tr>";
            }

          }
        ?>
        </table>
              <ul id="list"></ul>
            </section>
          </div>
        </div>
      </div>
    </main>

   

    
  </body>
</html> 
