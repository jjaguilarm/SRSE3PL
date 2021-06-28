<?php
function baseUrl()
{
    return BASE_URL;
}

function media()
{
    return BASE_URL."/Assets";
}

function getHeader($data="")
{
    $view = "Views/Template/header.php";
    require_once($view);
}

function getFooter($data="")
{
    $view = "Views/Template/footer.php";
    require_once($view);
}

function dep($data)
{
    $format = print_r("<pre>");
    $format .= print_r($data);
    $format .= print_r("</pre>");
    return $format;
}

function getModal(string $modalName, $data)
{
    $view = "Views/Template/Modals/{$modalName}.php";
    require_once($view);
}

function cleanStr($str)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $str);
    $string = trim($str);
    $string = stripslashes($str);
    $string = str_ireplace("<script>", "", $str);
    $string = str_ireplace("</script>", "", $str);
    $string = str_ireplace("<script src>", "", $str);
    $string = str_ireplace("<script type>", "", $str);
    $string = str_ireplace("select * from", "", $str);
    $string = str_ireplace("delete from", "", $str);
    $string = str_ireplace("insert into", "", $str);
    $string = str_ireplace("select count(*) from", "", $str);
    $string = str_ireplace("drop table", "", $str);
    $string = str_ireplace("--", "", $str);
    $string = str_ireplace("^", "", $str);
    $string = str_ireplace("[", "", $str);
    $string = str_ireplace("]", "", $str);
    $string = str_ireplace("==", "", $str);
    return $str;
} 
