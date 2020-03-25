<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "multi_login";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>
<!DOCTYPE html>
<html>
  <body>
  <form method="post" action="new.php">
     <label for="input">Input Board Number:</label>
      <input type="number" name="bn"><br>
      <label for="input">Input Due Date:</label>
       <input type="date" name="dd"><br>
       <label for="input">Input Task:</label>
       <input type="text" name="t"><br>
       <label for="input">Input Status of work:</label>
       <input type="text" name="s"><br>
       <label for="input">Input Friends username if want to give access:</label>
       <input type="text" name="fa"><br>
       <label for="input">Input Line no:</label>
       <input type="number" name="l"><br><br>
       <a href="Homep.php">Go back</a>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>
<?php
if(isset($_POST['save']))
{
	 $b = $_POST['bn'];
	 $dd = $_POST['dd'];
	 $d = $_POST['t'];
	 $s = $_POST['s'];
   $a = $_POST['fa'];
   $ln = $_POST['l'];
	 $sql = "INSERT INTO boards(board_id,Due_date,data,status,member_access,list_no)
	 VALUES ($b,'$dd','$d','$s','$a',$l)";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
