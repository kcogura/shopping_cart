<?php
//------------------------------------------------------------------------------
//stripslashesを再帰的に実行
//stripslashesは、'"\などのエスケープを戻す
//渡す値に配列がある場合はエラーになるので、この関数を呼ぶ
//引数 : 変換する値
//戻り値 : 変換後の値
if (!function_exists("stripslashes_deep")) {
    function stripslashes_deep($value)
    {
        $value = is_array($value) ?
        array_map('stripslashes_deep', $value) :
        stripslashes($value);
        return $value;
    }
}
function escape_sql($str, $flag = true, $chg_flag = true, $code = "")
{
    $ret = $str;
    if ($code) {
        $ret = mb_convert_encoding($ret, $code, "auto");
    }
    if ($chg_flag) {
        $ret = str_replace("'", "''", $ret);
        $ret = str_replace("\\", "\\\\", $ret);
    }
    if ($flag) {
        if (!$ret && $ret != "0") {
            return 'null';
        }
        $ret = "'" . $ret . "'";
    }
    return $ret;
}
$request_data = array();
$post_send_flag = false;
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $request_data = $_POST;
    $post_send_flag = true;
}
elseif ('GET' == $_SERVER['REQUEST_METHOD']) {
    $request_data = $_GET;
}
if (get_magic_quotes_gpc()) {
    $request_data = stripslashes_deep($request_data);
}
