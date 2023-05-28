<?php
class Uri{
function __construct(){
		$uri=$_SERVER['REQUEST_URI'];
$uri=rtrim($uri, '/');
$uri=explode('/',$uri);
while(count($uri)>0 && $uri[0] !="index.php"){
	$uri=array_slice($uri, 1);

}

if(!isset($uri[1])){
	require"controllers/home.php";
	require"models/home_model.php";
	$controller=new Home();
	$controller->index();
	return false;

}
$file="controllers/".$uri[1].".php";
if(file_exists($file)){
	require$file;
}
else
{
	require"controllers/error.php";
	$controller=new _error();
	return false;
}
$controller= new $uri[1];
$controller->loadModel($uri[1]);
if(isset($uri[3])){
 	if(method_exists($controller, $uri[2])){
 		call_user_func_array(array($controller, $uri[2]),array_slice($uri, 3));
 	}
 	else{
 		echo"phương thức không tồn tại";
 	}
 }
 else{
 if(isset($uri[2])){
$f=$uri[2];
if(method_exists($controller, $f)){
$controller->$f();
 	}
 	else{
 		echo"phương thức không tồn tại";
 	}
 }
 	else{
 		$controller->index();
 	}
  }
 }
}
