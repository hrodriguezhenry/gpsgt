<?php
//Función para redirijir a una pagina
function redirect($page){
    header("location: ".URL_ROUTE.$page);
}

//Función que imprime arreglos
function arrayDebug($data){
    $format = print_r("<pre>");
    $format .= print_r($data);
    $format .= print_r("</pre>");
    return $format;
}

//Función para evitar Inyección SQL
function srtClean($strCadena){
    $string = preg_replace(['/\s+/','/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string);
    $string = stripcslashes($string);
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1'", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR 1=1', "", $string);
    $string = str_ireplace("OR '1' = '1'", "", $string);
    $string = str_ireplace('OR "1" = "1"', "", $string);
    $string = str_ireplace('OR 1 = 1', "", $string);
    $string = str_ireplace("IS NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE `", "", $string);
    $string = str_ireplace('LIKE ´', "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a', "", $string);
    $string = str_ireplace("OR `a`=`a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR 'a' = 'a", "", $string);
    $string = str_ireplace('OR "a" = "a', "", $string);
    $string = str_ireplace("OR `a` = `a", "", $string);
    $string = str_ireplace("OR ´a´ = ´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}
?>