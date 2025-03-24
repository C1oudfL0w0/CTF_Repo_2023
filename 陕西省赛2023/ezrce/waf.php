<?php
function waf($poc)
{
    if(preg_match("/[0-9]|get_defined_vars|getallheaders|next|prev|end|array_reverse|\~|\`|\@|\#|\\$|\%|\^|\&|\*|\（|\）|\-|\=|\+|\{|\[|\]|\}|\:|\'|\"|\,|\<|\.|\>|\/|\?|\\\\/i", $poc)){
        echo "hacker! you die!<br/>";
        return "666";
    }
    return $poc;
}