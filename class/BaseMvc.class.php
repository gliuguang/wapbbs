<?php
// mvc基本类,含常用方法
class BaseMvc{
	public function encode_string($str)
	{
	// 用于进行可逆加密
	$str=base64_encode($str);
	$str=str_replace(array('+','/','='),array('-','_',','),$str);
	return $str;
	}

		public function decode_string($str)
	{
	// 用于进行可逆解密
	$str=str_replace(array('-','_',','),array('+','/','='),$str);
	$str=base64_decode($str);
	return $str;
	}
	
		public function encode_pass($pass)
	{
	// 用于密码单向加密
	$salt='a32s6d2z6s2n26rv26rg2yg';
	$salt=md5($salt.$pass);
	$pass=md5($pass.$salt);
	return md5('49ca67d336d493ae2775f93c1c403817'.$pass.'6zca37d336dmz3ae2775fb3ckcm038k7');
	}
}
?>