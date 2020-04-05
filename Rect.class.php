<?php
include "Shape.class.php";

/**
 * 这个类是一个矩形的类
 * 
 * 这个类要按形状类的规范去实现
 */
class Rect extends Shape{
	private $width;
	private $height;

	/**
	 * 构造方法
	 */
	function __construct($arr=array()){
		if( !empty($arr) ){
			$this->width = $arr['width'];
			$this->height = $arr['height'];
		}
		// $this->name = $arr['name'];
		$this->name = "矩形";
	}

	/**
	 * 形状的计算面积方法
	 */
	function area(){
		return $this->width = $this->height;
	}

	/**
	 * 形状的计算周长的方法
	 */
	function zhou(){
		return 2*($this->width * $this->height);
	}

	/**
	 * 形状的图形表单界面
	 */
	function view(){
		$from = '<form action="index.php?action=rect" method="post">';
		$from .= $this->name.'的宽：<input type="text" name="width" value="'.$this->width.'"> <br>';
		$from .= $this->name.'的高：<input type="text" name="height" value="'.$this->height.'"> <br>';
		$from .= '<input type="submit" name="dosubmit" value="计算"><br>';
		$from .= '</form>';
		echo $from;
	}

	/**
	 * 形状的验证方法
	 */
	function yan($arr){
		$bg = true;
		if( $arr['width'] < 0 || empty($arr['width']) ){
			echo $this->name."的宽不能小于0<br>";
			$bg = false;
		}
		if( $arr['height'] < 0 || empty($arr['height']) ){
			echo $this->name."的高不能为小于0<br>";
			$bg = false;
		}

		return $bg;
	}
}

