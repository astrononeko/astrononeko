<?php

public function checkSubAndChange(mixed $key, string $sub) 
{
    if (!($pos = strpos($key, $sub))) {
        $key = substr($key, 0, $pos) . "\\". $sub . $key = substr($key, $pos + 1);
    }
}

public function recSerial(mixed $elem)
{
    $finalStr = "";

    if (is_array($elem)) {
        $finalStr .= "[";
        foreach ($elem as $key => $value) {
            //If value is array do recursive
            if (is_array($value)) recSerial($value);
            /*Maybe external function?*/
            // if (!($pos = strpos($key, "["))) {
            //     $key = substr($key, 0, $pos) . "\[" . $key = substr($key, $pos + 1);
            // }
            // if (!($pos = strpos($key, '\\'))) {
            //     $key = substr($key, 0, $pos) . "\\\\" . $key = substr($key, $pos + 1);
            // }
            // if (!($pos = strpos($key, "]"))) {
            //     $key = substr($key, 0, $pos) . "\]" . $key = substr($key, $pos + 1);
            // }
            // if (!($pos = strpos($key, ":"))) {
            //     $key = substr($key, 0, $pos) . "\:" . $key = substr($key, $pos + 1);
            // }
            // if (!($pos = strpos($key, ";"))) {
            //     $key = substr($key, 0, $pos) . "\;" . $key = substr($key, $pos + 1);
            // }
            // if (!($pos = strpos($value, "["))) {
            //     $value = substr($value, 0, $pos) . "\[" . $value = substr($value, $pos + 1);
            // }
            // if (!($pos = strpos($value, '\\'))) {
            //     $value = substr($value, 0, $pos) . "\\\\" . $value = substr($value, $pos + 1);
            // }
            // if (!($pos = strpos($value, "]"))) {
            //     $value = substr($value, 0, $pos) . "\]" . $value = substr($value, $pos + 1);
            // }
            // if (!($pos = strpos($value, ":"))) {
            //     $value = substr($value, 0, $pos) . "\:" . $value = substr($value, $pos + 1);
            // }
            // if (!($pos = strpos($value, ";"))) {
            //     $value = substr($value, 0, $pos) . "\;" . $value = substr($value, $pos + 1);
            // }
            /*-----------------------*/
                checkSubAndChange($key, "[");
                checkSubAndChange($key, "\\");
                checkSubAndChange($key, "]");
                checkSubAndChange($key, ":");
                checkSubAndChange($key, ";");

                checkSubAndChange($value, "[");
                checkSubAndChange($value, "\\");
                checkSubAndChange($value, "]");
                checkSubAndChange($value, ":");
                checkSubAndChange($value, ";");
            /**/
            $finalStr .= "{$key}:{$value};"
        }
        $finalStr .= "];";
    } else {
        // if (!($pos = strpos($elem, "["))) {
        //     $elem = substr($elem, 0, $pos) . "\[" . $elem = substr($elem, $pos + 1);
        // }
        // if (!($pos = strpos($elem, '\\'))) {
        //     $elem = substr($elem, 0, $pos) . "\\\\" . $elem = substr($elem, $pos + 1);
        // }
        // if (!($pos = strpos($elem, "]"))) {
        //     $elem = substr($elem, 0, $pos) . "\]" . $elem = substr($elem, $pos + 1);
        // }
        // if (!($pos = strpos($elem, ":"))) {
        //     $elem = substr($elem, 0, $pos) . "\:" . $elem = substr($elem, $pos + 1);
        // }
        // if (!($pos = strpos($elem, ";"))) {
        //     $elem = substr($elem, 0, $pos) . "\;" . $elem = substr($elem, $pos + 1);
        // }
        checkSubAndChange($elem, "[");
        checkSubAndChange($elem, "\\");
        checkSubAndChange($elem, "]");
        checkSubAndChange($elem, ":");
        checkSubAndChange($elem, ";");
        $finalStr .= $elem . ";"
    }

    return $finalStr;
}

?>