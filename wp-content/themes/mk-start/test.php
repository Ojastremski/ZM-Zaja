<?php
/**
Template Name: Plugin
*/
echo 'OUTPUT :: plugin YES<br/>';

	$con = mysqli_connect('localhost','root','','zmziaja_1');
	mysqli_set_charset($con,"utf8");
	if (mysqli_connect_error() !=0){
		echo 'ERROR Connection'.mysqli_connect_error();
		exit;
	}
	else{
		echo 'OUTPUT :: OK Connection';
	}
	
	if(isset($_POST['go'])){
		/*$desc = $_POST['description'];
		echo "<br />-- ".$desc;*/
		$query = "INSERT INTO test (description) VALUES ('".$_POST["description"]."')";
		echo '<br />'.$query.'<br />';
		
        if (mysqli_query($con, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($con);
        }
        $con->close();
	}
?>

<div>
<br />
<form action="" method="post">
	<input name="description" type="text" required="required" id="description" placeholder="opis">
	<input name="go" type="submit" class="button" id="go" value="go">
</form>
</div>