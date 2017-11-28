<html>
<body>
<?php 
$conn=mysqli_connect("localhost","RailwayServices","") or die("not connected");
mysqli_select_db($conn,"prakhar");
$name=$_POST['name'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$ctn=$_POST['ctn'];
$id=$_POST['id'];
$pro=$_POST['pro'];
$ss=$_POST['ss'];
$ds=$_POST['ds'];
$tt=$_POST['tt'];
$du=$_POST['du'];$cst;$x;
if($tt==1 && $du==1){$cst=250;}
else if($tt==1 && $du==2){$cst=500;}
else if($tt==1 && $du==3){$cst=750;}
else if($tt==2 && $du==1){$cst=500;}
else if($tt==2 && $du==2){$cst=1000;}
else if($tt==2 && $du==3){$cst=1500;}
else{}
if($tt==1){$x="express";} else {$x="super fast";}
$dat=date($_POST['date']);
$date=strtotime($_POST['date']);
$img=file_get_contents($_FILES['image']['tmp_name']);
mysqli_query($conn,"insert into mst(name,lname,age,gender,address,ctn,id,pro,ss,ds,tt,du,dat) values('$name','$lname',$age,'$gender','$address',$ctn,'$id','$pro','$ss','$ds','$tt','$du',$date)")or die(mysqli_error($conn));
$stmt=mysqli_prepare($conn,"insert into img(image) values(?)") or die(mysqli_error($conn));
mysqli_stmt_bind_param($stmt,"b",$img);
mysqli_stmt_execute($stmt);
echo "<br><font color='green' size='5'><b>DATE OF ISSUE IS</b></font><br/><span style='color:red'>$dat validate till $du month</span>";            
echo "<br><font color='red' size='5'><b>from station $ss to $ds station</b></font>";
echo "<br><font color='blue' size='5'><b>cost is $cst</b></font>";
echo "<br><font color='green' size='5'><b>train type is $x</b></font>";

$ema=$_POST['mail'];

require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPSecure = "ssl";
$mail->Username = "prakhar.19967@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
$mail->Password = "Prakhar@123"; //this account's password.
$mail->Port = "465";
$mail->isSMTP();  // telling the class to use SMTP
$rec1=$ema; //receiver. email addresses to which u want to send the mail.
$mail->AddAddress($rec1);
$mail->Subject  = "Eventbook";
$mail->Body     = "Date of issue $dat validate till 1 month<br/>from station $ss to $ds station<br/>cost is $cst<br/>train type is $x";
$mail->WordWrap = 200;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo  //Fill in the document.location thing
'<script type="text/javascript">
                        if(confirm("Your mail has been sent"))
                        document.location = "/";
        </script>';
}

?>
</body>
</html>