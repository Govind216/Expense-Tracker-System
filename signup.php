<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp-Expense Tracker</title>
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
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
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
          <a href="<?php echo SITEURL;?>">
          <button class="orgbtn">Already have an account?</button></a>
        </div>
        <div class="rindex">

          <div class="spaces">

          <h1>Sign Up</h1>
          <p class="color-style">Create an account</p>
          <form action=""method="POST"> 
            <input type="text" id="fn" name="fn"placeholder="Enter Your Full Name"><br><br>
            <input type="email" id="em" name="email" placeholder="Enter Your Email"><br><br>
          <input type="password" id="pswd" name="pswd"placeholder="Enter Your Password">
          <br>
          <p class="gry-style">Password should be at least 8 letters</p>
          <input type="password" id="repswd" name="repswd"placeholder="Reenter Your Password"><br><br>
         
            <button class="orgbtn" name='submit' onclick="validateForm()">Register!</button>
            </form>
          <br>          
        </div>
        </div>
      </div>
      <?php
      if ((isset($_POST['submit'])) and ((empty($_POST["fn"])) or (empty($_POST["email"])) or (empty($_POST["pswd"])) or (empty($_POST["repswd"])))) {
        $_SESSION['add'] = "<div class='error'>  to Add Customer.</div>";
        //Redirect Page to Add Admin
        header("location:" . SITEURL . 'signup.php');
    } 
    elseif (isset($_POST['submit'])){
      $fn=$_POST['fn'];
      $email=$_POST['email'];
      $pswd=$_POST['pswd'];

      $sql="INSERT INTO user SET
           use_name='$fn',
           user_email='$email',
           user_password='$pswd' 
           ";

      $res=mysqli_query($conn, $sql);

      if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success'>Customer Added Successfully.</div>";
        //Redirect Page to Manage Admin
        header("location:" . SITEURL);
    } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add Customer.</div>";
        //Redirect Page to Add Admin
        header("location:" . SITEURL . 'signup.php');
    }

    }
      ?>

      <script>
        function validateForm()
        {
          <?php $flag=0;?>
          
          var lowerCaseLetters = /[a-z]/g;
          var upperCaseLetters = /[A-Z]/g;
          var numbers = /[0-9]/g;
          const pwd = document.getElementById("pswd").value;
          const ema=document.getElementById("em").value;
          if(document.getElementById("fn").value==""){
            <?php $flag=1;?>
            alert("Enter Your Full Name");
            return;
          }
          if(document.getElementById("em").value==""){
            <?php $flag=1;?>
            alert("Enter Your Email");
            return;
          }
          if(document.getElementById("pswd").value==""){
            <?php $flag=1;?>
            alert("Enter Your Password");
            return;
          }
          if(document.getElementById("repswd").value==""){
            <?php $flag=1;?>
            alert("Renter Your Password");
            return;
          }
          
           if(document.getElementById("repswd").value != pwd){
            <?php $flag=1;?>
             alert("Password doesnt matched the re-entered password");
             return;
           }
           if (!(/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/.test(ema)))
            {
              <?php $flag=1;?>
              alert("Enter Valid Email Address");
              return;
            }
        if(pwd.length<8)
        {
          <?php $flag=1;?>
           alert("Invalid Length");
           return;
        }
        if(pwd.match(lowerCaseLetters)==null)
        {
          <?php $flag=1;?>
          alert("Enter Lowercase Characters");
          return;
        }
        if(pwd.match(upperCaseLetters)==null)
        {
          <?php $flag=1;?>
          alert("Enter Uppercase Characters");
          return;
        }
        if(pwd.match(numbers)==null)
        {
          <?php $flag=1;?>
          alert("Enter Numbers");
          return;
        }
        if(!((pwd.includes("@"))||(pwd.includes("_"))||(pwd.includes("$"))||(pwd.includes("*"))||(pwd.includes("."))
            ||(pwd.includes("#"))||(pwd.includes("!"))||(pwd.includes("~"))||(pwd.includes("^"))||(pwd.includes("&"))))
          {
            <?php $flag=1;?>
              alert("Enter Special Characters")
              return;
          }        
        }             
      </script>
    </main>    
  </body>
</html>