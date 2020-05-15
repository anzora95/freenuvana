<?php 
 session_start();
 
/*  echo $_SESSION["fullname"];
 echo $_SESSION["email"];
 echo $_SESSION["product"];
 echo $_SESSION["ordernumber"];
 echo $_SESSION["verification"]; */
 $email=$_POST['email'];
/*  $fname=$_POST['fName'];
 $lname=$_POST['lName'];
 $fullname = $fname." ".$lname; */
 $saddress1=$_POST['sAddress1'];
 $saddress2=$_POST['sAddress2'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $zip=$_POST['zip'];
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
 $date1 = date('Y-m-d H:m:s');
 $review= str_replace("'","’",$_POST["review"]);

$verification=$_SESSION["verification"];
 if($_SESSION["verification"]=="completed"){
 }else{
    /* session_destroy();
    header("Location: index.php", true, 301); */
 }
?>
<!doctype html><html lang="en"><head>
<!-- Required meta tags -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- 		SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;800&display=swap" rel="stylesheet"> 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<!-- OWN CSS -->
			<link rel="stylesheet" href="src/css/style.css" >
				<title>New page!</title>
			</head>
			<body>
				<?php
            include('src/includes/header.php');
            ?>
				<section class="section-review" id="review">
					<div class="container-fluid discounts">
					<div class="row">
            <div class="col-md-10 offset-md-1 col-12  text-center">
            <div class="container form-container">
            <h2 class="heading-form">We are processing your free bottle</h2>
            <div class="internal-div">
            <h1 class="text-center sanscondensed" style="font-weight: 700; font-size: 40px; padding-top: 35px; margin-bottom: -5px;">GET THREE FREE BOTTLES <br> OF YOUR CHOICE</h1>
         <h3 class="text-center" style="overflow-wrap: break-word; margin-top:40px;">Share your experience using our products through a video
testimonial to receive 3 FREE full-sized bottles of your choice.<br><br>
5 of these testimonials will be selected to receive <br>an additional YEAR
SUPPLY of the their favorite product!<br><br>
Simply copy and paste the link below<br> and open on your smart phone for
further instructions.<br>
<a href = "https://app.videopeel.com/k2pezuzi">https://app.videopeel.com/k2pezuzi</a></h3>
         <!--IMAGE  CENTER DIV -->
         <div class=" text-center">
         <!-- AMAZON BUTTON -->
         <br>
         <h2><strong>Use Promo Code:</strong></h2>
          <h3 class="text-center"><strong style="font-weight: 900; font-size: 28px;">“FIRST15”</strong> to get 15% off your
first order at <a href = "http://www.nuvananutrition.com">nuvananutrition.com<a></h3><br>
        </div>
            </div>
            </div>
            </div>
            </div>
            </div>
			</section>
			<?php
            include('src/includes/footer.php');
            ?>
            </body>
            </html>
            <!-- PHP BLOCK -->
      <?php 
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      //require_once('new_order.php');
          //change credentials to your own
          echo "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
          $servername = "127.0.0.1";
          $username = "marvinvi_wp11";
          $password = "919293marvin";
          $dbname = "marvinvi_nuvana_test";
          if($verification==="completed"  && $order !='101-0101010-1010101' ){
            $_SESSION["verification"]=0;
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
         // prepare and bind prepared statements
          $stmt = $conn->prepare("INSERT INTO nuvana (Product, OrderNumber,Rating,Review,Email,First_Name,Last_Name,Shipping1,Shipping2,City,St,Zip,Claim_Time)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
echo $product ."<br>";
echo $order ."<br>";
echo $rating ."<br>";

echo $review ."<br>";
echo $email ."<br>";
echo $fname ."<br>";

echo $lname ."<br>";
echo $saddress1 ."<br>";
echo $saddress2 ."<br>";
echo $city ."<br>";
echo $state ."<br>";
echo $zip ."<br>";
echo $date1 ."<br>";
echo "YYYYYYYYYYYYYYYYUYYYYYYYYYYYYYY";





          $stmt->bind_param("sssssssssssis", $product, $order, $rating , $review ,$email,$fname,$lname,$saddress1,$saddress2,$city,$state,$zip,$date1);
          $stmt->execute();
          echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
          $fecha =date('Y-m-d');
          $stmt2 = $conn->prepare("UPDATE Orders  SET Claimed=?, Claimeddate=? WHERE Code=?");
          $stmt2->bind_param("iss", $claimed,$fecha,$order);
          echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
          $stmt2->execute();
          $stmt->close();
          $stmt2->close();
          $conn->close();
         // Create_order_shipstation($order,$fullname,$email,$saddress1,$saddress2, $city,$state,$zip);
          /* WORDPRESS SECTION FOR REVIEWS*/
        require 'phpmailer/PHPMailer/src/Exception.php';
        require 'phpmailer/PHPMailer/src/PHPMailer.php';
        require 'phpmailer/PHPMailer/src/SMTP.php';

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


        $mail->AddAddress("ariel@mvagency.co");
        /**/


        //send the message, check for errors ike@nuvananutrition.com
        if (!$mail->send()) {
        } else {
        }

//        DATA REPETED:


$server = "127.0.0.1";
$user_name = "marvinvi_wp11";
$password = "919293marvin";
$db = "marvinvi_nuvana_test";

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


                  $mail2->AddAddress("ariel@mvagency.co");
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
        $_SESSION["verification"]="";
      }
      
      

      ?>
          <!-- END PHP BLOCK -->