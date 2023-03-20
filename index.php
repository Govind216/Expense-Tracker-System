<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login-Expense Tracker</title>
    <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="./images/favicon.png"
  />
    <link rel="stylesheet" href="./css/style1.css" />
  </head>
  
  <body class="bdy">
  <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
    <header>
        <section class="navbar">
           <a id="anav1" href="<?php echo SITEURL;?>"> Expense <span class="color-style">Manager.</span></a> 
           
         <div class="signupsignin" id="navbarNav">
           <ul class="horizontal-list">
             <li class="hr-li">
               <a class="anav2" href="<?php echo SITEURL;?>">Sign in </a>
             </li>
             <li class="hr-li" >
               <a class="anav2" href="<?php echo SITEURL;?>signup.php">Sign up </a>
             </li>
           </ul>
         </div>
        </section>      
    </header>
    <main>
      <div class="container">
        <div class="lindex">
          <h1 >WELCOME TO <span class="color-style">EXPENSE MANAGER</span></h1>
          <p>
            An expense tracker app is generally used to track business
            expenses, which is important for accounting and tax purposes.
            With this app You can tracker your expenses on the go to record
            things such as travel expenses, mileage, and meals.
          </p>
          <a href="<?php echo SITEURL;?>signup.php">
          <button class="orgbtn">New User?</button></a>
        </div>
        <div class="rindex">

          <div class="spaces">

          <h1>LOGIN</h1>
          <p class="color-style">Login now to start</p>
          <form method="POST" action=""> 
            <input type="email" id="em" placeholder="Enter Your Email" name="em"><br>
          <p class="gry-style">We'll never share your email with anyone else</p>
          <input type="password" id="pswd" placeholder="Enter Your Password" name="pswd">
          <br><br><br>
          
          
            <input type="submit" class="orgbtn" value="Login" name="submit" onclick="validateForm()">
            </form>

          <br>

          
          <a href="<?php echo SITEURL;?>Resetpasswd.php" class="anav3">Forgotten Password?</a>
        </div>
        </div>
      </div>
      <?php
        if(isset($_POST['submit']))
        {         
          $em=$_POST['em'];
          $pswd=$_POST['pswd'];
          $sql = "SELECT * FROM user WHERE user_email='$em' AND user_password='$pswd'";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);
       if ($count == 1) 
              {
        $b = mysqli_fetch_assoc($res);
        $id= $b["uid"];      
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $em; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['cust1'] = $id;
        $_SESSION['name'] = $b['use_name'];
        header('location:' . SITEURL   . 'dashboard.php');
      } else {
          //User not Available and Login FAil
          $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
          //REdirect to HOme Page/Dashboard   
          echo"NO";
          header('location:' . SITEURL . 'index.php');
      }
    }
    


      ?>

    </main>    
  </body>
</html>