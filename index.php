<?php
// database settings
$db_set = array(
	'host'	=> 'localhost',
	'user'	=> '',
	'pass'	=> '',
	'dbase'	=> '',
	'tab_pr'	=> 'ppay_'
);
extract($db_set);
$con = new mysqli($host, $user, $pass, $dbase);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

// create table routine
if ( isset( $_POST['create_table'] ) ) {
	$cards_table = $tab_pr . "Cards";
	$cards_sql = "CREATE TABLE " . $cards_table . " (
CID INT NOT NULL AUTO_INCREMENT,
CardNumber CHAR(4) NOT NULL,
Amount DECIMAL(8,2) NOT NULL,
PRIMARY KEY(CID)
)";
	if ( $con->query($cards_sql) !== TRUE ) {
		echo "something went wrong with your query, exiting.";
	}
}

// delete table routine
if ( isset( $_POST['delete_table'] ) ) {
	$table = $tab_pr . "Cards";
	$sql = "DROP TABLE " . $table . ";";
	if ( $con->query($sql) !== TRUE ) {
		echo "something went wrong with your query, exiting.";
	}
}

// save new entry in database
if ( isset( $_POST['save_card'] ) ) {
	$table = $tab_pr . "Cards";
	$card = substr($_POST['card_number'], -4);
	$money = $_POST['initial_amount'];
	$sql = "INSERT INTO " . $table . " VALUES ('', " . $card . ", " . $money . ");";
	if ( $con->query($sql) !== TRUE ) {
		echo "something went wrong with your query, exiting.";
	}
}




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
	  <title>PostePay do it YourSelf!!</title>
	  <meta name="description" content="PostePay do it YourSelf!">
	</head>
	<body>
		<div id="page">
			<div id="content">
				<div id="add_card">
					<form action="" method="POST">
						<input name="card_number" type="text" id="card_number" value="" placeholder="your card number" />
						<input name="initial_amount" type="text" id="initial_amount" value="" placeholder="how much money?" />
						<input name="save_card" type="submit" id="save_card" value="Save Card" />
					</form>
				</div><!-- #add_card -->
				<div id="table_manage">
					<h1>table management</h1>
					<form action="" method="POST">
						<input name="create_table" type="submit" id="create_table" value="Create table" />
						<input name="delete_table" type="submit" id="delete_table" value="Delete table" />
						<input name="show_table" type="submit" id="show_table" value="Display table" />
					</form>
					<div id="display_table">
					<?php if ( isset( $_POST['show_table'] ) ) :
						$table = $tab_pr . "Cards";
						$sql = "SELECT * FROM " . $table . ";";
						$data = $con->query($sql);
						$arr = $data->fetch_all(MYSQLI_ASSOC);
					?>
						<table id="cards">
							<tbody>
								<tr>
									<th>ID</th>
									<th>Number</th>
									<th>Total</th>
								</tr>
					<?php foreach ( $arr as $key => $card ) {
						echo "<tr>\n<td>" . $card['CID'] . "</td>\n<td>" . $card['CardNumber'] . "</td>\n<td>" . $card['Amount'] . "</td>\n</tr>";
					} ?>
							</tbody>
						</table>
					<?php endif; ?>
					</div><!-- #display_table -->
				</div><!-- #table_manage -->
				<div id="output">
					<pre>
<?php
?>
					</pre>
				</div><!-- #output -->
			</div><!-- #content -->
		</div><!-- #page -->
<?php $con->close(); ?>
	</body>
</html>