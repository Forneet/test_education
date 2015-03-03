<?php
function clearInt($data){
	return abs((int)$data);
}
function clearStr($data){
	global $link;
	return mysqli_real_escape_string($link, trim(strip_tags($data)));
}

function addItemToCatalog ($title, $author, $pubyear, $price){
	global $link;
	$sql = "INSERT INTO catalog (
						title, 
						author, 
						pubyear, 
						price)
						VALUES (?, ?, ?, ?)";
	if(!$stmt = mysqli_prepare($link, $sql))
		return false;
		mysqli_stmt_bind_param($stmt, 'ssii', $title, $author, $pubyear, $price);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}