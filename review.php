<?php
session_start();
if ($_SESSION["verification"]==30) {
    echo'';
} else {
    // Finally, destroy the session.
    session_destroy();
    header("Location: index.php", true, 301);
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/png" href="src/img/neur-02.jpg"/>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nuvana Nutrition</title>

    <!-- Bootstrap -->
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- HEADER -->
<div class="container-fluid" style="background-color: #4D738A; padding-top: 75px; padding-bottom: 75px;">

    <h1 class="text-center sanscondensed" style="color: #FFF; font-weight: 700; font-size: 60px; padding-top: 20px; margin-bottom: 20px;">WE ARE PROCESSING YOUR FREE BOTTLE</h1>
    <!-- <p class="text-center sans" style="color: #FFF; font-size: 35px;">We are processing your free bottle.</p> -->
    <p class="text-center sans" style="color: #FFF; font-size: 24px;">You’ll receive an email confirmation when your free bottle ships.</p>
</div>
</div>
<!-- END HEADER -->

<div class="container-fluid" style="background-color: white;">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center sanscondensed" style="font-weight: 700; font-size: 60px; padding-top: 40px; margin-bottom: -5px;">GET THREE FREE BOTTLES <br> OF YOUR CHOICE</h1>
            <h3 class="text-center" style="overflow-wrap: break-word;">Share your experience using our products through a video<br>
                testimonial to receive 3 FREE full-sized bottles of your choice.<br>
                <br>5 of these testimonials will be selected to receive <br>an additional YEAR
                SUPPLY of the their favorite product!<br><br>
                Simply copy and paste the link below<br> and open on your smart phone for
                further instructions.<br>
                <a href = "https://app.videopeel.com/k2pezuzi">https://app.videopeel.com/k2pezuzi</a></h3>
            <!--IMAGE  CENTER DIV -->
            <div class=" text-center">

                <img  src="src/img/group3.png"style="width: 350px; margin:70px;max-width: 100%;">

                <!-- END IMAGE CENTER DIV -->

                <!-- AMAZON BUTTON -->
                <h3 class="text-center">Use Promo Code:<strong style="font-weight: 900; font-size: 28px;">“FIRST15”</strong> to get 15% off your
                    first order at <a href = "http://www.nuvananutrition.com">NuvanaNutrition.com<a></h3><br>

            </div>




        </div>


    </div>


</div>

<!-- <div class="container">
  If the customer left a review for SHUTEYE, please show a bottle of Turmeric with this copy:

  SAVE 15% ON TURMERIC (Big Text)
  Purchase now with the link below and use coupon code xxx-xxx-xxxx to save 15% on the best natural antioxidant & anti-inflammatory on the market! (Smaller text)
  (Buy now on Amazon Button)

  If the customer left a review for TURMERIC, please show a bottle of Shut Eye with this copy:

  SAVE 15% ON SHUT EYE (Big Text)
  Purchase now with the link below and use coupon code xxx-xxx-xxxx to save 15% on the best natural sleep aid on the market! (Smaller text)
  (Buy now on Amazon Button)
</div> -->
<!-- PHP BLOCK -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('new_order.php');
session_start();
$email=strtolower($_POST['email']);
$fname=ucwords(strtolower($_POST['fName']));
$lname=ucwords(strtolower($_POST['lName']));
$fullname = $fname." ".$lname;
$saddress1=ucwords(strtolower($_POST['sAddress1']));
$saddress2=ucwords(strtolower($_POST['sAddress2']));
$city=ucwords(strtolower($_POST['city']));
$state=$_POST['state'];
$zip=$_POST['zip'];
$verfication=$_SESSION["verification"];
$product= $_SESSION["product"];
if ($product == "Shut Eye") {
    $metaprod = "Shut Eye - Natural Sleep Aid";
} elseif($product == "Turmeric") {
    $metaprod = "Turmeric - Anti-Inflammatory & Antioxidant";
}else{
    $metaprod = "Cider Cleanse - Detoxifying Cleanse";
}
$order= $_SESSION["order"];
$rating =$_SESSION["stars"];
$claimed=1;
$review= str_replace("'","’",$_SESSION["review"]);
//change credentials to your own
$servername = "127.0.0.1";
$username = "marvinvi";
$password = "W,s-7QkkfoX-";
$dbname = "marvinvi_freenuvanaionos";

if($verfication==30  && $order !='101-0101010-1010101' ){
    $_SESSION["verification"]=0;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // prepare and bind prepared statements
    $stmt = $conn->prepare("INSERT INTO nuvana (Product, OrderNumber,Rating,Review,Email,First_Name,Last_Name,Shipping1,Shipping2,City,St,Zip)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssi", $product, $order, $rating , $review ,$email,$fname,$lname,$saddress1,$saddress2,$city,$state,$zip);
    $stmt->execute();
    $fecha =date('Y-m-d');
    $stmt2 = $conn->prepare("UPDATE Orders  SET Claimed=?, Claimeddate=? WHERE Code=?");
    $stmt2->bind_param("iss", $claimed,$fecha,$order);
    $stmt2->execute();
    $stmt->close();
    $stmt2->close();
    $conn->close();
    Create_order_shipstation($order,$fullname,$email,$saddress1,$saddress2, $city,$state,$zip);
    // if(substr($_SESSION["order"],0,11)=='913-2321234'){

    $usernamewp = "marvinvi_wp5";
    $passwordwp = "uobWkVkWEla4";
    $dbnamewp = "marvinvi_wp4";
    // Create connection
    $connwp = new mysqli($servername, $usernamewp, $passwordwp, $dbnamewp);

    //Insertion on wp_posts Table
    $stringnull = NULL;
    $intnull = Null;

    // Create connection
    $connwp = new mysqli($servername, $usernamewp, $passwordwp, $dbnamewp);
    $connwp->set_charset("utf8");
    // Check connection
    if ($connwp->connect_error) {
        die("Connection failed: " . $connwp->connect_error);
    }
    //---------------------- insercion wp_posts
    $sqlpost = "INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) 
        VALUES (1, '$fecha', '$fecha', '$review', '', '', 'publish', 'open', 'open','', '','', '', '$fecha', '$fecha', '', 0, 'https://nuvananutrition.com/?post_type=urp_review&#038;p=2763', 0, 'urp_review', '', 0)";
    if ($connwp->query($sqlpost) === TRUE) {
    } else {
        echo "Error: " . $sqlpost . "<br>" . $connwp->error;
    }
    //----------------------Fin de Primera insercion wp_posts

    //----------------------
    if ($connwp->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = mysqli_query($connwp, "SELECT ID FROM wp_posts ORDER BY ID DESC LIMIT 1 ");
    if (!$query)
    {
        die('Error: ' . mysqli_error($con));
    }
    if(mysqli_num_rows($query) > 0){
        $data = $query->fetch_array(MYSQLI_BOTH); /* Obtencion de los datos de la query */
        //echo $data[0]; //Obtencion de POST ID
    }
    //----------------------

    //----------------------Primera insercion wp_postmeta
    $sql = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Product_Name','$metaprod')";
    if ($connwp->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $connwp->error;
    }
    //----------------------Fin de Primera insercion wp_postmeta
    //----------------------Segunda insercion wp_postmeta
    $sql2 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Post_Author', '$fullname')";
    if ($connwp->query($sql2) === TRUE) {
    } else {
        echo "Error: " . $sql2 . "<br>" . $connwp->error;
    }
    //----------------------Fin de Segunda insercion wp_postmeta
    //----------------------Tercera insercion wp_postmeta
    $sql3 = "INSERT INTO wp_postmeta (post_id, meta_key)
        VALUES ($data[0],'EWD_URP_Post_Email')";
    if ($connwp->query($sql3) === TRUE) {
    } else {
        echo "Error: " . $sql3 . "<br>" . $connwp->error;
    }
    //----------------------Fin de Tercera insercion wp_postmeta
    //----------------------Cuarta insercion wp_postmeta
    $sql4 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Email_Confirmed','No')";
    if ($connwp->query($sql4) === TRUE) {
    } else {
        echo "Error: " . $sql4 . "<br>" . $connwp->error;
    }
    //----------------------Fin de Cuarta insercion wp_postmeta
    //----------------------Quinta insercion wp_postmeta
    $sql5 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Item_Reviewed','urp_product')";
    if ($connwp->query($sql5) === TRUE) {
    } else {
        echo "Error: " . $sql5 . "<br>" . $connwp->error;
    }

    //----------------------Octava insercion wp_postmeta
    $sql8 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Order_ID','0')";
    if ($connwp->query($sql8) === TRUE) {
    } else {
        echo "Error: " . $sql8 . "<br>" . $connwp->error;
    }
    //----------------------Fin de Octava insercion wp_postmeta
    //----------------------novena insercion wp_postmeta
    $sql9 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_City','$city')";
    if ($connwp->query($sql9) === TRUE) {
    } else {
        echo "Error: " . $sql9 . "<br>" . $connwp->error;
    }
    //----------------------Fin de novena insercion wp_postmeta
    //----------------------10 insercion wp_postmeta
    $sql10 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
              VALUES ($data[0],'EWD_URP_State','$state')";
    if ($connwp->query($sql10) === TRUE) {
    } else {
        echo "Error: " . $sql10 . "<br>" . $connwp->error;
    }
    //----------------------Fin de Novena insercion wp_postmeta
    //----------------------11 insercion wp_postmeta
    $sql11 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
             VALUES ($data[0],'EWD_URP_Stars',$rating)";
    if ($connwp->query($sql11) === TRUE) {
    } else {
        echo "Error: " . $sql11. "<br>" . $connwp->error;
    }
    //----------------------Fin de 11 insercion wp_postmeta
    //----------------------12 insercion wp_postmeta
    $sql12 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
        VALUES ($data[0],'EWD_URP_Overall_Score', $rating)";
    if ($connwp->query($sql12) === TRUE) {
    } else {
        echo "Error: " . $sql12 . "<br>" . $connwp->error;
    }
    //----------------------Fin de 12 insercion wp_postmeta
    //----------------------13 insercion wp_postmeta
    //$sql13 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
    //VALUES ($data[0],'_edit_lock','1573157745:1')";
    //if ($connwp->query($sql13) === TRUE) {
    //} else {
    //echo "Error: " . $sql13 . "<br>" . $connwp->error;
    //     }
    //----------------------Fin de 13 insercion wp_postmeta
    //----------------------14 insercion wp_postmeta
    // $sql14 = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
    //VALUES ($data[0],'_edit_last','1')";
    // if ($connwp->query($sql14) === TRUE) {
    // } else {
    //echo "Error: " . $sql14 . "<br>" . $connwp->error;
    //   }
    //----------------------Fin de 14 insercion wp_postmeta
    //----------------------15 insercion wp_postmeta
    $sql15 = "INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES (NULL, $data[0], 'urp_view_count', '5');";
    if ($connwp->query($sql15) === TRUE) {
    } else {
        echo "Error: " . $sql15 . "<br>" . $connwp->error;
    }
    //----------------------Fin de 15 insercion wp_postmeta
    $connwp->close();
    //}
    require 'phpmailer/PHPMailer/src/Exception.php';
    require 'phpmailer/PHPMailer/src/PHPMailer.php';
    require 'phpmailer/PHPMailer/src/SMTP.php';

    // /* ----------------------------  END ADMINS EMAIL------------------ */
    /* --------------------CREACION DE MAIL PARA USUARIO */
    $mail = new PHPMailer(); // create a new object
    $mail2 = new PHPMailer(); // create a new object
    $mail->isSendMail();
    $mail2->isSendMail();
    $mail->SMTPDebug = 0;
    $mail2->SMTPDebug = 1;
    $mail->IsHTML(true);
    $mail2->IsHTML(true);
    $mail->SetFrom("nuva@nuvana.com", "Freenuvana" );
    $mail2->SetFrom("nuva@nuvana.com", "Freenuvana" );
    $mail->Subject = "New Order: ".$order;
    $mail2->Subject = "Data repeated: ".$order;
    $body="<!DOCTYPE html>
        <html>
            <body style='background-color:#f7f7f7;background-color:#f7f7f7; padding-top: 35px; padding-bottom: 35px;'>
        <table  cellpadding='0' border='0' align='center' cellspacing='0' style='margin-left: auto; margin-right:auto; margin-top: 50px;'>
            <tbody>
                <tr>
                    <td>
                        <table style='background-color:#a3664b; color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle; border-radius: 6px 6px 0 0; border-left: 1px solid #dedede;border-right: 1px solid #dedede;border-top: 1px solid #dedede; ' width='600'>
                            <tbody>
                                <tr>
                                    <td><h1 style='padding-left: 45px; color:#ffffff;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:25px;font-weight:300;line-height:150%;margin:0;text-align:left; padding-bottom: 15px;padding-top: 15px;'>New registration order</h1></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                        <td>
                                <table style='background-color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle; border-radius: 0 0 0px 0px;border-left: 1px solid #dedede;border-right: 1px solid #dedede;border-bottom: 0px solid #dedede; ' width='600'>
                                    <tbody>
                                            <td>
                                                    <table cellpadding='0' border='0' align='center' cellspacing='0' style='background-color:#ffffff; margin-top: 15px; margin-bottom: 10px; border-bottom:0;font-weight:bold; border-left: 1px solid #dedede;border-right: 1px solid #dedede; ' width='500'>
                                                        <tbody>
                                                            <thead >
                                                            <tr>
                                                                <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='25%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>Product</h1></th>   
                                                                <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='25%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:150%;margin:0;text-align:left;padding-top: 10px;'>Stars</h1></th>   
                                                                <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:150%;margin:0;text-align:left;padding-top: 10px;'>Order #</h1></th>   
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                    <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$product</h1></td>   
                                                                    <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$rating</h1></td>   
                                                                    <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$order</h1></td>   
                                                            </tr>
                                                            <tr>
                                                                    <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' ><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>First name</h1></th>   
                                                                    <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' ><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:150%;margin:0;text-align:left;padding-top: 10px;'>Last name</h1></th>   
                                                                    <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' ><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:20px;font-weight:500;line-height:150%;margin:0;text-align:left;padding-top: 10px;'>Email</h1></th>   
                                                                </tr>
                                                                </thead>
                                                                <tr>
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$fname</h1></td>   
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$lname</h1></td>   
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$email</h1></td>   
                                                                </tr>
                                                            </tbody>
                                                            <tfoot >
                                                                <tr>
                                                                        <th style='color:#636363;border:1px solid #e5e5e5;border-top:4px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>Shipping</h1></th> 
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;border-top:4px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='2'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$saddress1</h1></td>   
                                                                </tr>
                                                        <tr>
                                                                           <th style='color:#636363;border:1px solid #e5e5e5;border-top:4px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>Address line 2</h1></th> 
                                                                           <td style='color:#636363;border:1px solid #e5e5e5;border-top:4px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='2'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$saddress2</h1></td>   
                                                                   </tr>
            
                                                                <tr>
                                                                        <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>City</h1></th> 
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='2'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$city</h1></td>   
                                                                </tr>
                                                                <tr>
                                                                        <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>State</h1></th> 
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='2'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$state</h1></td>   
                                                                </tr>
                                                                <tr>
                                                                        <th style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' width='50%'><h1 style=' color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;margin:0;text-align:left;padding-top: 10px;'>Zip</h1></th> 
                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='2'><h1 style=' color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$zip</h1></td>   
                                                                </tr>
                                                                <tr>
                                                                        <th style='color:#636363;border:1px solid #e5e5e5;border-top:3px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='3'><h1 style=' text-align:center; color:#636363; font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:600;line-height:100%;padding-top: 10px; margin: 0px;'>Review</h1></th> 
                                                                        </tr>
                                                                        <tr>
                                                                                <td style='color:#636363;border:1px solid #e5e5e5;border-bottom:4px solid #e5e5e5;vertical-align:middle;padding:7px;text-align:left' colspan='3'><h1 style=' margin-left: auto; margin-right: auto; color:#6c6763;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:17px;font-weight:300;line-height:100%;margin:0;text-align:left;padding-top: 5px;'>$review</h1></td>   
                                                                
                                                                        </tr>
                                                            </tfoot>
                                                    </table>
                                                </td>
                                    </tbody>
                                </table>
                            </td>
                </tr>
                <tr >
                        <td>
                            <table style='background-color:#a3664b; color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle; border-radius: 0px 0px 6px 6px; border-left: 1px solid #dedede;border-right: 1px solid #dedede;border-top: 1px solid #dedede; ' width='600'>
                                <tbody>
                                    <tr>
                                        <td><h1 style=' color:#ffffff;font-family:\"Helvetica Neue\",Helvetica,Roboto,Arial,sans-serif;font-size:25px;font-weight:300;line-height:150%;margin:0;text-align:center; padding-bottom: 15px;padding-top: 15px;'>NUVANA</h1></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
            </tbody>
        </table>
        </body>
        </html>
        ";



    $body_repeted="
            <html>
            
            
            
            <title></title>
            </head>
            <body>
            
            <h1>DATA REPEATED</h1>
            <br>
            <p> Order : <strong>$order<strong></p>
            <br>
            <p> Address line 1 : <strong>$saddress1<strong></p>
            <br>
            <p> Email : <strong>$email<strong></p>


            </body>
            </html>
            <style>
            table {
              border-collapse: collapse;
            }
            
            table, td, th {
              border: 1px solid black;
            }
            </style>
            ";


    $mail->Body = $body;


    $mail->AddAddress("ike@nuvananutrition.com");
    /**/


    //send the message, check for errors ike@nuvananutrition.com
    if (!$mail->send()) {
    } else {
    }

//        DATA REPETED:


    $server = "localhost";
    $user_name = "marvinvi";
    $password = "W,s-7QkkfoX-";
    $db = "marvinvi_freenuvanaionos";

// Create connection
    $conn = new mysqli($server, $user_name, $password, $db);
    $conn->set_charset("utf8");
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = mysqli_query($conn, "SELECT * FROM nuvana where Email='$email' or Shipping1='$saddress1'");


// echo gettype($result);

    if (mysqli_num_rows($result) > 1) {
        // output data of each row
        // echo "entra aqui";
        $mail2->Body = $body_repeted;


        $mail2->AddAddress("ike@nuvananutrition.com");
        if (!$mail2->send()) {
        } else {
        }

        /* ---------------------------- ADMINS EMAIL------------------ */
        $mailrepeat = new PHPMailer(); // create a new object
        $mailrepeat->isSendMail();
        $mailrepeat->SMTPDebug = 2;
        $mailrepeat->IsHTML(true);
        $mailrepeat->SetFrom("nuva@nuvana.com", "Freenuvana" );
        $mailrepeat->Subject = "Data repetead for developers: ".$order;
        $mailrepeat->Body = $body_repeted;
        $mailrepeat->AddAddress("ariel@mvagency.co");
        $mailrepeat->AddAddress("jose@mvagency.co");
        $mailrepeat->AddAddress("diego@mvagency.co");
        //send the message, check for errors
        if (!$mailrepeat->send()) {
        } else {
        }
        /* ----------------------------  END ADMINS EMAIL------------------ */
    } else {
        // echo "0 results";
    }

    $conn->close();



    /*               if (true) {


                  }
                  $conn->close(); */


//              END DATA REPETED


    /* --------------------FIN CREACION DE MAIL PARA USUARIO */


    /* ---------------------------- ADMINS EMAIL------------------ */
    $mail3 = new PHPMailer(); // create a new object
    $mail3->isSendMail();
    $mail3->SMTPDebug = 2;
    $mail3->IsHTML(true);
    $mail3->SetFrom("nuva@nuvana.com", "Freenuvana" );
    $mail3->Subject = "New Order: ".$order;
    $mail3->Body = $body;
    $mail3->AddAddress("ariel@mvagency.co");
    $mail3->AddAddress("jose@mvagency.co");
    $mail3->AddAddress("diego@mvagency.co");
    //send the message, check for errors
    if (!$mail3->send()) {
    } else {
    }
    /* ----------------------------  END ADMINS EMAIL------------------ */

    session_destroy();

}
else{
    echo "";
    $_SESSION["verification"]=0;
}



?>
<!-- END PHP BLOCK -->
<!-- FOOTER -->
<?php include ("src/includes/footer.php"); ?>
<!-- END FOOTER -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/scripts.js"></script>
</body>
</html>
