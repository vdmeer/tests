<?php


$readfn=file("encoding_characters.json", FILE_USE_INCLUDE_PATH | FILE_TEXT | FILE_IGNORE_NEW_LINES);
$cp=array();

$keys=array_keys($readfn);
$size=sizeof($readfn);
for($i=0;$i<$size;$i++){
	if(substr($readfn[$i],0,strlen("/*"))=="/*")
	  continue;
	if(substr($readfn[$i],0,strlen("/**"))=="/**")
	  continue;
	if(substr($readfn[$i],0,strlen(" *"))==" *")
	  continue;
	if(substr($readfn[$i],0,strlen(" */"))==" */")
	  continue;
	if(substr(trim($readfn[$i]),0,strlen("//"))=="//")
	  continue;
  if(strpos($readfn[$i],"//")!==false)
    $readfn[$i]=substr($readfn[$i], 0, strpos($readfn[$i],"//"));
  $cp[]=$i;
}

//print_r($readfn);

$json_string="";

$keys=array_keys($cp);
$size=sizeof($cp);
for($i=0;$i<$size;$i++){
	$json_string.=trim($readfn[$cp[$i]]);
}

$jsonar=json_decode($json_string);
print_r($jsonar);

//$adfile=implode($ad);
//$adfile=$ad;

//$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
//$jsonar=json_decode('{"a":1,"b":2,"c":3,"d":4,"e":5}');

//print_r($ad);
//echo "@".$adfile."@\n\n";

//$jsonar=json_decode($adfile, true);
//print_r($jsonar);

//print_r($adfile);
//print_r(json_decode($adfile));

?>
