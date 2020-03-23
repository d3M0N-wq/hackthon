<?php
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<ul class="navbar">
	 <li><a class="logo" href="start.html"><img class="img1" src="download.png" alt="Home" width="110" height="40" ></a></li>
	 <small>
		 <a href="Homep.php?logout='1'" style="padding: 2%;color: green; float: right; font-size:20px;">logout</a>
	 </small>
 </ul>
	<div class="content">

		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
       <?php  if (isset($_SESSION['user'])) : ?>
				 <p>Welcome !</p>
					<strong ><?php $u=$_SESSION['user']['username'] ;echo $_SESSION['user']['username']; ?></strong>

      	<?php endif ?>
			</div>
		</div>
	</div>
<?php
	echo '<div class="import">
		<form class="c" action="Homep.php" method="get">
		<label for="input">For Input(y/n):</label>
		 <input type="text" name="i"><br>
			<label for="quantity">Enter List number:</label>
      <input type="number" id="quantity" name="quantity" value="0" min=0>
			 <input type="submit">
		</form>';
		$in=$_GET["quantity"];
		$ou=$_GET["i"];
		echo $ou;
		?>
		<?php
   	$username = "root";
		$password = "";
		$database = "multi_login";
		$mysqli = new mysqli("localhost", $username, $password, $database);
    $query2="SELECT * FROM `boards` WHERE username ='".$u."'"."and list_no =".$in;
if ($ou=='y')
 {

  echo '<form class="c" action="Homep.php" method="get">
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
 		 <input type="text" name="l"><br>
		 <input type="submit">
		 </form>';

     $b_no=$_GET["bn"];
		 $due=$_GET["dd"];
		 $wk=$_GET["t"];
		 $st=$_GET["s"];
		 $ua=$_GET["fa"];
		 $ln=$_GET["l"];
		 $query3 ='INSERT INTO `boards` (`board_id`, `Due_date`, `data`, `member_access`, `status`, `username`,`list_no`) VALUES'.'(\''.$b_no.'\',\''.$Due.'\',\''.$wk.'\',\''.$ua.'\',\''.$st.'\',\''.$u.'\',\''.$ln.'\')';
		 $q=$query3;
      echo $query3;
 }
else {

	  if ($in==1)
		{
      $q=$query;
		}
		else {
				$q=$query2;
				echo '<table border="0" cellspacing="2" cellpadding="2">
				      <tr>
		              <td> <font face="Arial">board no.</font> </td>
				          <td> <font face="Arial">Due date</font> </td>
				          <td> <font face="Arial">Task</font> </td>
				          <td> <font face="Arial">Work Status</font> </td>
				      </tr>';

				if ($result = $mysqli->query($q)) {
				    while ($row = $result->fetch_assoc()) {
				        $field1name = $row["board_id"];
				        $field2name = $row["Due_date"];
				        $field3name = $row["data"];
				        $field4name = $row["status"];
				        echo '<tr>
				                  <td>'.$field1name.'</td>
				                  <td>'.$field2name.'</td>
				                  <td>'.$field3name.'</td>
				                  <td>'.$field4name.'</td>
				              </tr>';

				    }
				    $result->free();
		     }
		}
   }

		?>
	</div>
</body>
</html>
