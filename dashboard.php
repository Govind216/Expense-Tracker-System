<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" />
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        
        <script>
            let a;
            let date;
            let time;
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            setInterval(()=>{
        a= new Date();
        let date=a.toLocaleDateString(undefined,options);
        let time= a.getHours()+":"+a.getMinutes();
        document.getElementById('time').innerHTML=time+" on "+date;},1000);
        </script>
        
</head>

<body class="bdy">
    <header id="dbhd">
        <section class="navbar" id="dbnav">
            <a id="anav1" href="./index.html"> Expense <span class="color-style">Manager.</span></a>
            <div class="signupsignin" id="navbarNav">
                <ul class="horizontal-list">
                    <li class="hr-li">
                        <a class="anav2" href="<?php echo SITEURL?>profile.php">Profile</a>
                        <a class="anav2" href="<?php echo SITEURL?>generate-report.php">Generate Report</a>
                        <a class="anav2" href="<?php echo SITEURL;?>signout.php">Log Out </a>
                    </li>

                </ul>
            </div>
        </section>
    </header>
    <main>
        <section class="sec1">
            <div class="ldash1">
                <h1>DASHBOARD</h1>
                <br>
                <h2>Hello, <span class="color-style"><?php echo $_SESSION['name'] ?></span> </h2>
                <h2>Welcome!</h2>
        <h3 class="text-center"><span id="time"></span></h3>

            </div>
            <div class="rdash1">
                <img src="./images/dashboard-icon.png" alt="dashboard" height="400"width="400">
            </div>
        </section>
        <section class="sec2">
            <div class="cat-box"  id="box1">
                <h3>ADD CATEGORY</h3>
                <a href="<?php echo SITEURL?>add-category.php"><button class="ne-btn"><i class="fas fa-long-arrow-alt-up"
                    style='font-size:24px'></i></button></a>
            </div>
            <div class="cat-box" id="box2">
                <h3>ADD EXPENSE</h3>
                <a href="<?php echo SITEURL?>add-expense.php"><button class="ne-btn"><i class="fas fa-long-arrow-alt-up"
                    style='font-size:24px'></i></button></a>

            </div>
            <div class="cat-box" id="box3">
                <h3>ALL CATEGORIES</h3>
                <a href="<?php echo SITEURL?>all-category.php"><button class="ne-btn"><i class="fas fa-long-arrow-alt-up"
                    style='font-size:24px'></i></button></a>

            </div>
        </section>
    </main>

</body>



</html>