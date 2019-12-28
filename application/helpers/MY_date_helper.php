<?php
//lấy ngày từ int
//$time: int - thoi gian muon hien hành
//$full_time: lấy cả giờ phút giây
function get_date($time, $full_time = true){
	
	$format = '%d-%m-%Y';
	if($full_time){
		$format = $format.' lúc %h:%i:%s';
	}
	$date = mdate($format, $time);
	return $date;
}
function get_hen_ngay($time){
	$format = '%Y-%m-%dT%H:%i:%s';
	$date = mdate($format, $time);
	return $date;
}
function get_ngay($time){
	
	$format = '%m';
	$date = mdate($format, $time);
	return $date;
}
function get_thang($time){
	
	$format = '%d';
	$date = mdate($format, $time);
	return $date;
}