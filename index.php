<!DOCTYPE html>
<html>
<head>
	<title>面向对象：图形计算器</title>
	<meta charset="utf-8">
</head>
<body>

<conter>
	<h1>图形计算器</h1>

	<a href="index.php?action=rect">矩形</a>
	<a href="index.php?action=triangle">三角形</a>
</conter>
<hr>


<?php 
	// 设置自动加载这个程序需要的类文件  PHP7.3不能用了。只能直接include了
	/*function __autoload($classname){
		include strtolower($classname).".class.php";
	}*/

	include "Rect.class.php";
	// 判断用户是否有选择单击一个形状链接
	if( !empty($_GET['action']) ){
		// 第一步：创建形状的对象
		$classname = ucfirst($_GET['action']);
		$shape = new $classname($_POST);

		// 第二步：调用形状对象中的界面view()
		$shape->view();

		// 第三步：用户是否提交了对应图形界面的表单
		if (isset($_POST['dosubmit'])) {
			// 第四步：查看用户输出的数据是否正确；失败则提示
			if ($shape->yan($_POST)) {
				// 计算图形的周长和面积
				echo $shape->name."的周长为：".$shape->zhou()."<br>";
				echo $shape->name."的面积为：".$shape->area()."<br>";
			}
		}

	// 如果用户没有单击链接，则是默认访问这个 程序
	}else{
		echo "请选择一个要计算的图形！";
	}


 ?>

</body>
</html>