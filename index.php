<?php
require_once("Config/config.php");
$url= !empty($_GET['url']) ? $_GET['url'] : 'home/home' ;
$arrUrl=explode("/",$url);
$controller= $arrUrl[0];
$method= $arrUrl[0];
$params= "";

if(!empty($arrUrl[1]))
{
    if($arrUrl[1] != "")
    {
        $method = $arrUrl[1];
    }

}

if(!empty($arrUrl[2]))
{

    if($arrUrl[2] != "")
    {
        for($i=2; $i<count($arrUrl); $i++) {
            $params .= $arrUrl[$i].',';
        }
        $params =trim($params,',');
    }
}

/*Si existe este archivo lo que va hacer es requerirlo */
spl_autoload_register(function($class){
    if(file_exists(LIBS.'Core/'.$class.".php")){
        require_once(LIBS.'Core/'.$class.".php");
    }
});


echo "<br>";
echo "controlador: ".$controller;
echo "<br>";
echo "métodos: ".$method;
echo "<br>";
echo "parámetros: ".$params;



?>