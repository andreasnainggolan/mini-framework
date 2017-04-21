<?php

if ( ! function_exists('anchor'))
{

	function anchor($name,$link)
	{
		return "<a href='$name'>$link</a>";
	}
}

if ( ! function_exists('base_url'))
{
	function base_url($url = ""){
		global $base_url;
		return $base_url;
	}
}

