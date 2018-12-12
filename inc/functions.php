<?php

function connectToDatabase()
{
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$dB		= "wespenkorf";
	
	$connect = mysqli_connect($host,$user, $pass, $dB);
	
	return $connect;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}

function getOrderImage($productId){
    $connect = connectToDatabase();  /* Starts connection to database */

    $query = "SELECT `imagePath` FROM products WHERE `id` = '$productId'";

    $resource = mysqli_query($connect, $query);

    $image = mysqli_fetch_row($resource);

    return $image[0];
}

function getOrderName($productId){
    $connect = connectToDatabase();  /* Starts connection to database */

    $query = "SELECT `name` FROM products WHERE `id` = '$productId'";

    $resource = mysqli_query($connect, $query);

    $name = mysqli_fetch_row($resource);

    return $name[0];
}
