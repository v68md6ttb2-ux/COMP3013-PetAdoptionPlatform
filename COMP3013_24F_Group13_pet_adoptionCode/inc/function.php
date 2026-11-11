<!--创建连接对象-->
<?php

//通过栏目id获得列表内容
function getListByCid($id,$limit){
	global $mysqli;
	$sql = "select activities.* from activities 
	LEFT JOIN category
	ON category.id=activities.category_id
	WHERE category.id='{$id}'  order by activities.id asc limit {$limit}";
	$list = array();
	$result = mysqli_query($mysqli,$sql);

	while($row = mysqli_fetch_array($result)){
	   $list[$row['id']] = $row;
	}
	return 	$list; 
}

$bimg = array(
	'b1.jpg'
,	'b2.jpg'
,	'b3.jpg'
,	'b4.jpg'
,	'b5.jpg'
);
shuffle($bimg);
 ?>