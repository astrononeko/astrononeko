<?php

function checkSubAndChange(mixed $key, string $sub) 
{
    if (($pos = strpos($key, $sub))) {
        $key = substr($key, 0, $pos) . "\\". $sub . substr($key, $pos + 1);
    }

    return $key;
}

function recSerial(mixed $elem)
{
    $finalStr = "";

    if (is_array($elem)) {
        $finalStr .= "[";

        foreach ($elem as $key => $value) {
            $delim = ";";

            if (is_array($value)) {
                $value = recSerial($value);
                $delim = "";
            } else {
                $key = checkSubAndChange($key, "[");
                $key = checkSubAndChange($key, "\\");
                $key = checkSubAndChange($key, "]");
                $key = checkSubAndChange($key, ":");
                $key = checkSubAndChange($key, ";");

                $value = checkSubAndChange($value, "[");
                $value = checkSubAndChange($value, "\\");
                $value = checkSubAndChange($value, "]");
                $value = checkSubAndChange($value, ":");
                $value = checkSubAndChange($value, ";");
            }

            $finalStr .= $key . ":" . $value . $delim;
        }

        $finalStr .= "];";
    } else {
        checkSubAndChange($elem, "[");
        checkSubAndChange($elem, "\\");
        checkSubAndChange($elem, "]");
        checkSubAndChange($elem, ":");
        checkSubAndChange($elem, ";");
        
        $finalStr .= $elem . ";";
    }

    return $finalStr;
}

echo recSerial($GLOBALS);

?>