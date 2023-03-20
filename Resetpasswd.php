<?php
include("config/constants.php");
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style1.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" />
    <title>Reset Password-Expense Tracker</title>
</head>
<script>
    function validateForm() {
        let a = document.getElementById("em").value;
        if (a == "")
            alert("Enter Email Id")
        else if (!(/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/.test(a)))
            alert("Enter valid Email Id")
        else
            alert("Email has been sent with your new password");
    }
</script>


<body class="bdy">
    <header>
        <section class="navbar">
            <a id="anav1" href="<?php echo SITEURL?>"> Expense <span class="color-style">Manager.</span></a>
        </section>
    </header>

    <p class="white-color">
        <?php
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function



        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';
        require 'credential.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        if (isset($_POST['sendmail'])) {

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = EMAIL;                 // SMTP username
                $mail->Password = PASS;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom(
                    EMAIL,
                    'Expense Tracker System'
                );
                $mail->addAddress($_POST['em']);     // Add a recipient

                $mail->addReplyTo(EMAIL);

                $mail->addAttachment('Reset.jpg', 'Reset');
                $mail->isHTML(true);                  // Set email format to HTML

                $mail->Subject = 'Reset Password';
                $mail->Body    = 'Your password is <b>ABCabc123&&</b>';

                $mail->send();
                echo 'Message has been sent';
                unset($_POST['sendmail']);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        ?></p>


    <a href="<?php echo SITEURL?>"><button class="back-btn"><i class="fas fa-long-arrow-alt-left" style='font-size:24px'></i></button></a>
    <div class="rstcontainer">
        <div class="resetimg">
            <img src="./images/forgotten-password-image.png">
        </div>
        <div class="reset-content">
            <h1 class="color-style">RESET YOUR PASSWORD</h1>
            <p class="white-color">Enter the Email associated with your account and we'll send an email with instructions to reset your
                password</p>
            <form action="" method="POST" onSubmit="return validateForm()">
                <input type="email" name="em" placeholder="Enter Your Email"><br><br>
                <input type="submit" name="sendmail" value="Done" class="orgbtn">
            </form>
        </div>
    </div>



</body>

</html>