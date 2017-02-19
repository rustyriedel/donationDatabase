<!DOCTYPE html>
<html lang = "en">

<?php
session_start();

session_start();

$navbar_active = 'request';
$navbar_title = 'Donee Page';
include('layouts/navbar.php');
require_once('helpers/mysqli.php');

if(isset($_SESSION["id"]))
{
	$id = $_SESSION["id"];
}
    
$sql = "SELECT * FROM CategoriesTable";
$result_set = $mysqli->query($sql);
$category_array = array();
while($row =  mysqli_fetch_array($result_set)){
     $category_array[] = $row;
}

if(isset($_GET["input0"]) && isset($_SESSION["id"]))
{
	foreach($category_array as $index => $category)
	{
		$inputName = "input".$index;

		$sql = "SELECT * FROM InventoryTable WHERE CategoryNum =" . $category['CategoryNum'] . " AND Amount != Threshold";
		$result_set = $mysqli->query($sql);
		$inventory_array = array();
		while($row =  mysqli_fetch_array($result_set))
		{
			$inventory_array[] = $row;
		}	
		
		$input_array = array();
		$input_array = $_GET[$inputName];
		
		foreach($inventory_array as $index => $item)
		{			
			if($input_array[$index] != 0)
			{			
				$amount = $input_array[$index];
				$itemId = $item["ItemID"];
				$query = "INSERT INTO OutDonationTable (DoneeID, ItemID, Amount) VALUES ('$id', '$itemId', $amount)";
				
				if($result = $mysqli->query($query))
				{
					
				}
				else
				{
					die("MySQL error: " . $mysqli->error);
				}
			}
		}
	}
}
?>

<div class="container">
	<h3>Item Requesting Form</h3> <br>
	<form action="donee.php">
		<?php
		 foreach($category_array as $index => $category)
		 {			 
			$inputName = "input" . $index;
			 
		 	echo '<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" href="#cat' . $category['CategoryNum'] . '">' . $category['Name'] . '</a>
							</h4>
						</div>
						<div id="cat' . $category['CategoryNum'] . '" class="panel-collapse collapse">
							<div class="panel-body">
								<table class="table table-striped">
									<tr>
										<th>Item</th>
										<th>Amount in Inventory</th>
										<th>Quantity</th>
									</tr>';
									
			$sql = "SELECT * FROM InventoryTable WHERE CategoryNum =" . $category['CategoryNum'] . " AND Amount != Threshold";
			$result_set = $mysqli->query($sql);
			$inventory_array = array();
			while($row =  mysqli_fetch_array($result_set))
			{
				$inventory_array[] = $row;
			}
			
			foreach($inventory_array as $item)
			{				
				echo '<tr><td>' . $item['Name'] . '</td><td>' . $item['Amount'] . '</td><td><input type="number" value="0" name="'. $inputName .'[]" min="0" scale="1"></td></tr>';
			}
			echo '</table></div></div></div></div>';
		 	 	
		 }
		?>
		<hr>
		<div class="form-group">
			<label for="specialRequests" class="col-sm-2 control-label">Special Requests</label>
			<div class="col-sm-10">
				<input type="text" class="form-control input" name="specialRequests" placeholder="Request special items not shown above">
			</div>
		</div>
		<hr> <br>
		
		<input type="submit" value="Request Donation">
	</form>
</div>

<script type="text/javscript" source="js/bootstrap.min.js"></script>

</body>
</html>
