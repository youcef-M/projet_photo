<?php

//FONCTION NON testée, à utiliser pour PUT avec CURL 
function postcurl ($fields,$url)
{
 $data = array("a" => $a);
        $ch = curl_init($this->_serviceUrl . $id);
 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
 
        $response = curl_exec($ch);
        if(!$response) {
            return false;
}

?>