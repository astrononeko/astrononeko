<?php

const SPEC_CHARS = ["[", "\\", "]", ":", ";"];

function checkSubAndChange(mixed $key, string $sub) 
{
    if (($pos = strpos($key, $sub))) {
        $key = substr($key, 0, $pos) . "\\". $sub . substr($key, $pos + 1);
    }

    return $key;
}

function recSerial(mixed $elem): string
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

//Как вариант можно сериализовать данные так, чтобы в начале передавать где есть специальные символы

function recordDeserialization(string $input, int $leftBorder = 0): array
{
    $result = [];

    $leftBracket = strpos(substr($input, $leftBorder), "[");
    $nextLeftBracket = strpos(substr($input, $leftBracket + 1), "[");
    $rightBracket = strpos(substr($input, $leftBorder), "]");

    if ($nextLeftBracket < $rightBracket) {
        $value = recordDeserialization(substr($input, $nextLeftBracket, $rightBracket - $nextLeftBracket));
        #Выходим из наиболее глубокого массива
        /**
         * Плюс один для двоеточия
         */
        $key = substr($input, $leftBracket + 1, $nextLeftBracket - ($leftBracket + 1));

    } else {
        #Достигли наиболее глубокого массива
        $transitionalPartition = explode($input, ";");
        foreach ($transitionalPartition as $value) {
            list($key, $value) = explode($value, ":");
            $result[$key] = $value;
        }
    }

    return $result;
}

//function stringPartition(string $elem, int $end)
//{
//    $result = [];
//    $order = 0;
//    do {
//        $semicPos = strpos(substr($elem, $order, $end), ";");
//        if ($elem[$semicPos - 1] != "\\") {
//            #Если это действительно разделитель, а не т.с-з. в тексте, то
//            #То нужно ещё сделать проверку на разделитель пары ключ-значение
//            #Причем тоже в цикле
//            $colonOrder = 0;
//            do {
//                $colonPos = strpos(substr($elem, $colonOrder, $semicPos), ":");
//
//                if ($elem[$colonPos - 1] != "\\") {
//                    #Делим на ключ-значение
//                    $key = substr($elem, 0, $colonPos);
//                    $value = substr($elem, $colonPos + 1, $semicPos);
//                    $result[$key] = $value;
//                } else {
//                    $colonOrder = $colonPos + 1;
//                }
//            } while (strpos(substr($elem, $colonOrder, $semicPos), ":"));
//
//
//            #Тут нужно обрезать подаваемую строчку,
//            #Или не надо, потому что на вход подаем уже резанную строчку
//            $elem = substr($elem, $semicPos);
//        } else {
//            $order = $semicPos + 1;
//        }
//
//    } while (strpos(substr($elem, $order, $end), ";"));
//    return $result;
//}

//function recDeSerial(string $elem)
//{
//    $result = [];
//    $newStart = strpos($elem, "[");
//    $end = strpos($elem, "]");
//
//    if ($elem[0] == "[") {
//
//        /**
//         * Дальше надо проверить, где конец этого массива, для этого нужно найти закрывающий "]"
//         * Но для этого нужно учесть внутренние массивы и обработать сначала наиболее глубокий
//         *
//         * А кроме прочего нужно получить значение ключа, потому что дальше строка будет резаться
//         */
//
//        if ($newStart < $end) {
//            #Случай, когда у нас есть ещё более глубокий массив
//            $interVal = recDeSerial(substr($elem, $newStart + 1));
//            $key = substr($elem, 0, $newStart - 1);
//            $result[$key] = $interVal;
//
//        } else {
//            #Случай, когда мы дошли до конца нынешнего массива
//            $result = stringPartition($elem, $end);
//        }
//
//    } else {
//        $result = stringPartition($elem, $end);
//    }
//
//    return $result;
//}

