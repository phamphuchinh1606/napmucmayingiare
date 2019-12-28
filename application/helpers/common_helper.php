<?php

function public_url($url = ''){
	return base_url('public/'.$url);
}

function pre($list, $exit = true){
	echo "<pre>";
	print_r($list);
	if($exit)
	{
		die();
	}
}

function pra($list){
    echo "<pre>";
    print_r($list);
}

function convert_vi_to_en($str)
{
    $characters = array(
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/' => 'a',
        '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/' => 'e',
        '/ì|í|ị|ỉ|ĩ/' => 'i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/' => 'o',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/' => 'u',
        '/ỳ|ý|ỵ|ỷ|ỹ/' => 'y',
        '/đ/' => 'd',
        '/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/' => 'A',
        '/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/' => 'E',
        '/Ì|Í|Ị|Ỉ|Ĩ/' => 'I',
        '/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/' => 'O',
        '/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/' => 'U',
        '/Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'Y',
        '/Đ/' => 'D',
    );
 
    return preg_replace(array_keys($characters), array_values($characters), $str);
}

function chuyenurl($list){
    $list = trim($list);
    $list = convert_vi_to_en($list);
    $list = strtolower($list);
    $kytudacbiet = array(' ', '/', '?', ':', ',','(',')','&','@','!','~','`','#','$','%','^','*','+','=','_','{','}','[',']','|',':',';','"','<','>');
    $list = str_replace($kytudacbiet, '-', $list );
    return $list;
}

function namegiohang($list){
    $kytudacbiet = array(' ', '/', '?', ':', ',','(',')','&','@','!','~','`','#','$','%','^','*','+','=','_','{','}','[',']','|',':',';','"','<','>');
    $list = str_replace($kytudacbiet, ' ', $list );
    return $list;
}
/* cat chuoi 1: cắt theo kí tự*/
function cstr($text, $start=0, $limit=12)
    {
        if (function_exists('mb_substr')) {
            $more = (mb_strlen($text) > $limit) ? TRUE : FALSE;
            $text = mb_substr($text, 0, $limit, 'UTF-8');
            return array($text, $more);
        } elseif (function_exists('iconv_substr')) {
            $more = (iconv_strlen($text) > $limit) ? TRUE : FALSE;
            $text = iconv_substr($text, 0, $limit, 'UTF-8');
            return array($text, $more);
        } else {
              preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/",  $text, $ar);
            if(func_num_args() >= 3) {
                if (count($ar[0])>$limit) {
                    $more = TRUE;
                    $text = join("",array_slice($ar[0],0,$limit))."...";
                }
                $more = TRUE;
                $text = join("",array_slice($ar[0],0,$limit));
            } else {
                $more = FALSE;
                $text =  join("",array_slice($ar[0],0));
            }
            return array($text, $more);
        }
}
function sub_str($text, $limit=25)
{
    $val = cstr($text, 0, $limit);
    return $val[1] ? $val[0]."..." : $val[0];
}  
/* Cat chuoi cach 2 : cat theo từ*/
function text_limit($str, $length, $minword = 3){
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word){
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
          break;
        }
    }
    return $sub . (($len < strlen($str)) ? '...' : '');
}
function check_menu($str, $module){
    $url = '';
    if($module == 3){
        if(strpos($str, 'en/') == 'true'){
            if(strpos($str, 'en/http') == 'true'){
                $url = str_replace( 'en/http', 'http', $str);
            }
            else{
                $url = base_url($str);
            }
        }else{
            if(strpos($str, 'http') == 'true'){
                $url = $str;
            }
            else{
                $url = base_url($str);
            }
            
        }
    }
    else{
        if($module == 0){
            $url = site_url($str);
        }
        if($module == 1 || $module == 2 || $module == NULL){
            $url = base_url($str);
        }
        
    }
    return $url;
}
