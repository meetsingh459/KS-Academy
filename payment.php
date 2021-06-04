<?php

	include('connection.php');

	if( isset($_GET['id']) ){
		
		// $conn=mysqli_connect('localhost', 'root', 'meet12345', 'meet');
		
		$encodedUserId = $_GET['id'];
		$Subject=base64_decode($encodedUserId);
		
		$query="SELECT * FROM notes WHERE Subject='$Subject'";
		$result=mysqli_query($conn, $query);
		$row=mysqli_fetch_array($result);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title> KS Academy</title>
	<style type="text/css">
				
		body{
			margin: 0;
			padding: 0;
		}

		form{
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 100px;
		}

		form table{
			width: 60%;
			font-family: sans-serif;
			border-collapse: collapse;
		}

		form table th{
			font-size: 20px;
			background-color: #454545;
			color: white;
			padding:10px 0;
		}

		form table td{
			text-align: center;
			border:1px solid black;
			padding: 10px 0;
		}

		#check{
			padding: 10px 25px;
			border: 1px solid black;
			font-weight: 5000px;
			columns: black;
			background-color: #F8C701;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<form method="post" action="Paytm/pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $row['Price']; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input id="check" value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
	</form>

</body>
</html>