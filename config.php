<?php
$web = "DwiKurniaSurya.Net"; 
$lastupdate = "https://api.gdriveplayer.us/v1/drama/newest";
$arrContextOptions=array(
    "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ),
  );  
$ambil = file_get_contents($lastupdate, false, stream_context_create($arrContextOptions));
$dramas = json_decode($ambil);



function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
 ?>