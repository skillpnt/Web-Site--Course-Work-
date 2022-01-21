<?php
	$mysqli = false;
	function connectDB ()
	{
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "userlistdb");
		$mysqli->query("SET NAMES 'utf-8'");
	}

	function closeDB ()
	{
		global $mysqli;
		$mysqli->close();
	}

	function getNews($limit)
	{
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT * FROM `news` ORDER BY `ID` DESC LIMIT $limit");
		closeDB();
		return resultToArray ($result);
	}

	function resultToArray ($result)
	{
		$array = array();
			// echo("Rabotaet!");
		while(($row = mysqli_fetch_assoc($result)) != false)
		$array[] = $row;
			// echo("FETCH Rabotaet!");
		return $array;
	}
?>