<?
require("db.php");
function mess($id){
	global $connect;
	$query_m="SELECT * FROM message WHERE id=".$id;
	$result_m=mysql_query($query_m,$connect);
	$row_m=mysql_fetch_array($result_m);
	return $row_m["message"];
}

function search_content($id){
	global $connect;
	$query="SELECT * FROM content WHERE id=".$id;
	$result=mysql_query($query,$connect);
	$row=mysql_fetch_array($result);
	return $row["article"];
}

function search_kind($kind_id){
	global $connect;
	$query="SELECT * FROM kind WHERE id=".$kind_id;
	$result=mysql_query($query,$connect);
	$row=mysql_fetch_array($result);
	return $row["name"];
}

function search_id($title,$kind_id){
	global $connect;
	$query="select structure.id from structure left join content on structure.id = content.id
                   where kind_id = ".$kind_id."
		and title = '".$title."'
                   and content.id is NULL";
	$result=mysql_query($query,$connect);
	$row=mysql_fetch_row($result);
	return $row[0];
}
?>
