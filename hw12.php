<?php

class Curl
{

  public function __construct(){}
  
  public function get($url)
  {
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
    $output=curl_exec($ch);
 
    if($output === false)
      {
        return curl_errno($ch);
      }
    curl_close($ch);
    return $output;
  }

  public function post($url, $params) 
  {
    $postData = '';
    
    foreach($params as $k => $v) 
      { 
	$postData .= $k . '='.$v.'&'; 
      }
    $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    try{ $output=curl_exec($ch); } 
    catch(Exception $e) { return $e; }
 
    curl_close($ch);
    return $output;
  }

}

$curlOBJ = new Curl();

$params = array(
		"name" => "Ravishanker Kusuma",
		"age" => "32",
		"location" => "India"
		);
 
echo "POST example: " . $curlOBJ->post("http://hayageek.com/examples/php/curl-examples/post.php",$params) . "<hr>";
echo "GET example: " . $curlOBJ->get("http://hayageek.com");

?>