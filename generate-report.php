<?php
include("config/constants.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report-Expense Tracker</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" />
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<!-- FETCH AND PRINT ALL THE EXPENSES SORTED BY MONTH-->

<body class="bdy">
    <header id="dbhd">
        <section class="navbar" id="dbnav">
            <a id="anav1" href="<?php echo SITEURL ?>dashboard.php"> Expense <span class="color-style">Manager.</span></a>
            <div class="signupsignin" id="navbarNav">
                <ul class="horizontal-list">
                    <li class="hr-li">
                        <a class="anav2" href="signout.php">Log Out </a>
                    </li>

                </ul>
            </div>
        </section>
    </header>

    <main>
        <section id="generate-report">
            <a href="<?php echo SITEURL ?>dashboard.php" class="backto-btn">
                <i class="fas fa-long-arrow-alt-left"></i></button></a>
            <h1>EXPENSE REPORT</h1>
        </section>
        <section>
            <br><br>
            <div class="white-color">
                <table class="genreptable">
                    <caption>ALL EXPENSES</caption>
                    <tr>
                        <th><u>Date</u></th>
                        <th><u>Category</u></th>
                        <th><u>Item</u></th>
                        <th><u>Money</u></th>
                        <th><u>Action</u></th>
                        <th><u>Receipt</u></th>
                    </tr>
                    <?php
                    $email = $_SESSION['user'];
                    $sql = "Select * from expenses where email = '$email'";
                    $res = mysqli_query($conn, $sql);
                    if (!$res) {
                        echo mysqli_error($conn);
                        die;
                    }
                    while ($row = mysqli_fetch_assoc($res)) {
                        $date = $row['date'];
                        $text = $row['text'];
                        $price = $row['price'];
                        $cat = $row['category'];

                        echo "<tr>";
                        echo "<td> $date </td>";
                        echo "<td>$cat</td>";
                        echo "<td>$text</td>";
                        echo "<td>Rs. $price</td>";
                        echo "<td>Recorded</td>";
                        echo "<td><a href='view.php'>View</a></td>";
                        //echo '<td><img src = "data:image/png;base64,' . base64_encode($row['receipt']) . '" width = "50px" height = "50px"/></td>';
                        echo "</tr>";
                    }
                    ?>
                </table>
                <br><br>

    </main>
    </div>

</body>



</html>