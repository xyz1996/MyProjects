<html>
<body><font size="6" color="green"><b>
<?php
$a=$_POST['usname'];
$b=$_POST['pwwd'];
$c=$_POST['em'];
if($a && $b && $c){
$conn=mysqli_connect("localhost","root","") or die("not connected");
mysqli_select_db($conn,"prakhar");
$query=mysqli_query($conn,"select * from login where uname='$a'");
$numrows=mysqli_num_rows($query);
if($numrows!=0){echo "try another username";}
else{
mysqli_query($conn,"insert into login(uname,pwd,email) values ('$a','$b','$c')") or die(mysqli_error($conn));
echo "Registration is successful";}
}
else{echo "<font size='6' color='red'>please fill complete information</font>";}
?>
</b>
</font>
</body>
</html>
