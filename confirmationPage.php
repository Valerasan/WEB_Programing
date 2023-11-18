<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/confirmPageStyle.css">
    <title>Title</title>
</head>
<body>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_GET["name"] ?? "";
$surname = $_GET["surname"] ?? "";
$secondName = $_GET["secondName"] ?? "";
$telephone = $_GET["telephone"] ?? "";
$email = $_GET["email"] ?? "";
$breakfast = isset($_GET["breakfast"]);
$taxi_to_train = isset($_GET["taxi_to_train"]);
$date_start = $_GET["date-start"] ?? "";
$date_end = $_GET["date-end"] ?? "";
$room = $_GET["room-select"] ?? "";
$person = $_GET["person-select"] ?? "";
$children = $_GET["children"] ?? "";



if(isset($_GET['button1']))
{

    $servername = "*****";
    $username = "*****";
    $password = "*****";
    $dbname = "WEB";
    $UID = 0;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT id FROM reservations ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if($result = $conn->query($sql)){
        foreach($result as $row)
        {
            $UID = $row['id'];
        }
    }

    $transfer = $taxi_to_train ? 1 : 0;
    $breakfastInsert = $breakfast ? 1 : 0;


    $sql =   "INSERT INTO `reservations`(id, check_in_date, check_out_date, number_of_guests, rooms_num, elders_num, 
                           children_num, transfer, breakfast, name, surname, secondName, email, telephone) 
                                 VALUES ($UID+1,'$date_start','$date_end',$person+$children,$room,$person,$children,
                                         $transfer, $breakfastInsert,'$name','$surname','$secondName','$email','$telephone')";
    $conn->query($sql);

//    if ($conn->query($sql) === TRUE) {
////        echo "Succeed";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }





    require 'vendor/autoload.php'; // Шлях до автозавантаження бібліотеки

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP сервер
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Username = '*****';
        $mail->Password = '*****';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('******', 'Booking');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Booking';
        $mail->Body = '<html lang="uk">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link rel="stylesheet" href="css/confirmPageStyle.css">
                            <title>Тест</title>
                        </head>
                        <body>
                        
                         <div>
                            <div class="row">
                                <div class="col-75">
                                    <div class="container">
                                        <h2>Чек</h2>
                                        <div class="row">
                                            <div class="col-50">
                                                <label>Дякуємо за що обрали нас</label>
                                                <label>'.$name.'</label>
                                                <br><br>
                                                <label>'.$secondName.'</label>
                                                <br><br>
                                                <label>'.$telephone.'</label>
                                                <br><br>
                                            </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        </body>
                        </html>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
    }



    $conn->close();
    header("Location: index.php");
    exit();
}

?>
<form method="GET" >
    <div class="row">
        <div class="col-75">
            <div class="container">
                <center><h2>Чек ліст</h2></center>
                    <div class="row">
                        <div class="col-50">
                            <label><?php echo $_POST["surname"]; ?>
                                <?php echo $_POST["name"]; ?>
                                <?php echo $_POST["secondName"]; ?></label>
                            <input type="hidden" name="surname" value="<?php echo $_POST["surname"]; ?>">
                            <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
                            <input type="hidden" name="secondName" value="<?php echo $_POST["secondName"]; ?>">
                            <br><br>
                            <label><?php echo $_POST["telephone"]; ?></label>
                            <input type="hidden" name="telephone" value="<?php echo $_POST["telephone"]; ?>">
                            <br><br>
                            <label><?php echo $_POST["email"]; ?></label>
                            <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
                        </div>
                        <br><br>
                    </div>
                <br>
                    <div class="row">
                        <div class="col-50">
                            <h3>Додактові опції:</h3>
                            <label>
                                <input name="breakfast" type="checkbox" onclick="return false"
                                    <?php
                                    if(isset($_POST["breakfast"]))
                                    {
                                        echo "checked='checked'";
                                    }
                                    ?>value="<?php echo isset($_POST["taxi-to-train"])?>"/>
                                <label for="chkBox_1">
                                    Сніданок
                                </label>

                            </label>
                            <br><br>
                            <label>
                            <input name="taxi-to-train" type="checkbox" onclick="return false"
                                    <?php
                                    if(isset($_POST["taxi-to-train"]))
                                    {
                                        echo "checked='checked'";
                                    }
                                    ?> value="<?php echo isset($_POST["taxi-to-train"])?>"  />
                                <label for="chkBox_2">
                                    Підвезення з вокзалу
                                </label>
                            </label>
                        </div>
                    </div>
                    <h3>Дати перебування</h3>
                    <div class="row">
                        <div class="col-50">

                            <label>З <?php echo $_POST["date-start"]; ?></label>
                            <input type="hidden" name="date-start" value="<?php echo $_POST["date-start"]; ?>">
                        </div>
                        <div class="col-50">
                            <label> По <?php echo $_POST["date-end"]; ?></label>
                            <input type="hidden" name="date-end" value="<?php echo $_POST["date-end"]; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-50">
                            <label> Кількість кімнат:<?php echo $_POST["room-select"]; ?></label>
                            <input type="hidden" name="room-select" value="<?php echo $_POST["room-select"]; ?>">
                        </div>
                        <br><br>
                        <div class="col-50">
                            <label> Кількість дорослих:<?php echo $_POST["person-select"]; ?></label>
                            <input type="hidden" name="person-select" value="<?php echo $_POST["person-select"]; ?>">
                        </div>
                        <br><br>
                        <div class="col-50">
                            <label> Кількість дітей:<?php echo $_POST["children"]; ?></label>
                            <input type="hidden" name="children" value="<?php echo $_POST["children"]; ?>">
                        </div>
                    </div>
                    <input type="submit" name="button1" value="Забронювати" class="btn">
            </div>
        </div>
    </div>
    </form>

</body>
</html>