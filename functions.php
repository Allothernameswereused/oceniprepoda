  <?php

  $mysqli = false;
	function connectDB () {
		global $mysqli;
		$mysqli = new mysqli("localhost", "cm20306_oceni", "hsv614", "cm20306_oceni");
		$mysqli->query("SET NAMES 'UTF-8'");
	}
	
	function closeDB () {
		global $mysqli;
		$mysqli->close ();
	}

	function getNews($limit, $id){
		global $mysqli;
		connectDB();
		if ($id) $where = "WHERE `id`=".$id;
		$result = $mysqli->query("SELECT * FROM `professors` $where ORDER BY `id` DESC LIMIT $limit");
		closeDB();
		if(!$id)
		return resultToArray($result);
	    else return $result->fetch_assoc();
	}

    function getComments($limit, $id){
		global $mysqli;
		connectDB();
		if ($id) $where = "WHERE `prepod`=".$id;
		$result = $mysqli->query("SELECT * FROM `comments` $where ORDER BY `id` DESC LIMIT $limit");
		$array = $result->fetch_all(MYSQLI_ASSOC);
		closeDB();
		return $array;
	}

	function resultToArray($result){
		$array = array ();
		while (($row = $result->fetch_assoc()) != false)
		$array[] = $row;
		return $array;
	}

	function addComment ($txt,$id,$rate1,$rate2,$rate3,$rate4,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8) {
		global $mysqli;
		$h1=0;
		connectDB();
		$mysqli->query("INSERT INTO `comments` (text, prepod, rate1, rate2, rate3, rate4, tag1, tag2,tag3,tag4,tag5,tag6,tag7,tag8, likes,dislikes) VALUES ('$txt','$id','$rate1','$rate2','$rate3','$rate4','$tag1','$tag2','$tag3','$tag4','$tag5','$tag6','$tag7','$tag8','$h1','$h1')");
	    closeDB();
	} 

	function search1($text){
		global $mysqli;
		connectDB();
	    $where1 = " `name1` LIKE '%".$text[0]."%'";
		$where2 = " `name2` LIKE '%".$text[0]."%'";
		$where3 = " `name3` LIKE '%".$text[0]."%'";

		$where4 = " `name1`='".$text[1]."'";
		$where5 = " `name2`='".$text[1]."'";
		$where6 = " `name3`='".$text[1]."'";

		$where7 = " `name1`='".$text[2]."'";
		$where8 = " `name2`='".$text[2]."'";
		$where9 = " `name3`='".$text[2]."'";
		$result = $mysqli->query("SELECT DISTINCT * FROM `professors` WHERE $where1 OR $where2 OR $where3  OR $where4 OR $where5  OR $where6 OR $where7 OR $where8 OR $where9              
			");
		closeDB();
		return resultToArray($result);
	}



	
	?>