<?php
 include("../../include/db.php");

$username = $_SESSION['login_user'];
$transaction = $_SESSION['transaction_session'];

$quantity = $_GET['quantity'];
$product_price = $_GET['product_price'];

$transaction_datetime = date('Y-m-d H:i:s');

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$address = $_GET['address'];
$payer_email = $_GET['payer_email'];
$contact = $_GET['contact'];

$query = mysqli_query($con,"SELECT * FROM `ootb_temp_transaction` WHERE transaction_id = '$transaction' AND status = 'pending'");

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'outoftheboxofficial27@gmail.com';          // SMTP username
$mail->Password = 'projectalmanac'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('outoftheboxofficial27@gmail.com', 'Out of the Box');
$mail->addReplyTo('outoftheboxofficial27@gmail.com', 'Out of the box official email');
$mail->addAddress($payer_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>OUT of the BOX</h1>';
$bodyContent .= '<h3><p>Please Verify your ORDER</p></h3>';
$bodyContent .= '<table border="1px">
					<tr>
					<th>ITEM</th>
					<th>QTY</th>
					<th>PRICE</th>
					</tr>';

			while ($row = mysqli_fetch_assoc($query)) {
				# code...
				$sku = $row['product_sku'];
				$queryb = mysqli_query($con,"SELECT * FROM `ootb_products` WHERE product_sku = '$sku'");
				while ($yarn = mysqli_fetch_assoc($queryb)) {
					# code...
				
			$bodyContent .= "	
									<tr>
										<td>".$yarn['product_name']."</td>
										<td>".$row['quantity']."</td>
										<td> &#8369; ".$row['price']."</td>
									</tr>
								";

								}


			$queryc = mysqli_query($con,"SELECT * FROM `ootb_hooks_and_needles` WHERE product_sku = '$sku'");
				while ($hooks = mysqli_fetch_assoc($queryc)) {
					# code...
				
			$bodyContent .= "	
									<tr>
										<td>".$hooks['product_name']."</td>
										<td>".$row['quantity']."</td>
										<td> &#8369; ".$row['price']."</td>
									</tr>
								";

								}


			$queryd = mysqli_query($con,"SELECT * FROM `ootb_accessories` WHERE product_sku = '$sku'");
				while ($access = mysqli_fetch_assoc($queryd)) {
					# code...
				
			$bodyContent .= "	
									<tr>
										<td>".$access['product_name']."</td>
										<td>".$row['quantity']."</td>
										<td> &#8369; ".$row['price']."</td>
									</tr>
								";

								}

			$querye = mysqli_query($con,"SELECT * FROM `ootb_projects` WHERE product_sku = '$sku'");
				while ($projects = mysqli_fetch_assoc($querye)) {
					# code...
				
			$bodyContent .= "	
									<tr>
										<td>".$projects['product_name']."</td>
										<td>".$row['quantity']."</td>
										<td> &#8369; ".$row['price']."</td>
									</tr>
								";

								}


			$queryf = mysqli_query($con,"SELECT * FROM `ootb_tools` WHERE product_sku = '$sku'");
				while ($tools = mysqli_fetch_assoc($queryf)) {
					# code...
				
			$bodyContent .= "	
									<tr>
										<td>".$tools['product_name']."</td>
										<td>".$row['quantity']."</td>
										<td> &#8369; ".$row['price']."</td>
									</tr>
								";

								}




			}

$bodyContent .= '</table>';
$bodyContent .= '<table>
						<tr>
							<td><b>TOTAL QUANTITY:</b></td>
							<td><b>'.$quantity.'</b></td>
						</tr>
						<tr>
							<td><b>TOTAL PRICE:</b></td>
							<td><b> &#8369;'.$product_price.'</b></td>
						</tr>
				</table>';
$bodyContent .= "<b><a href='http://localhost/ootb/include/cashondelivery/confirm.php?username=".$username."&transaction_id=".$transaction."&firstname=".$first_name."&lastname=".$last_name."&address=".$address."&email=".$payer_email."&contact=".$contact."&totalqty=".$quantity."&totalprice=".$product_price."'>Click here to confirm your ORDER...</a></b>";

$mail->Subject = 'Verify ORDER from OUT of the BOX';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location:http://localhost/ootb/include/cashondelivery/success.php");
}
?>
