<?php

define ('SPEC_CHARS', ["[", "\\", "]", ":", ";"]);

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

                foreach (SPEC_CHARS as $v) {
                    $key = checkSubAndChange($key, $v);
                }
                foreach (SPEC_CHARS as $v) {
                    $value = checkSubAndChange($value, $v);
                }

            }

            $finalStr .= $key . ":" . $value . $delim;
        }

        $finalStr .= "];";
    } else {

        foreach (SPEC_CHARS as $v) {
            $elem = checkSubAndChange($elem, $v);
        }

        $finalStr .= $elem . ";";
    }

    return $finalStr;
}

echo recSerial($GLOBALS);

?>