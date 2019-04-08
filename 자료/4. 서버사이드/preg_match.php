<?php
//아이디 : 영문 + 숫자
function isAlphaNumber ($str) {
    if (isNotAlphaNumber($str) or isAlpha($str) or isNum($str)){
        return 0;
    } else {
        return 1;
    }
}
//영문&숫자가 아닌 문자가 있을 때
function isNotAlphaNumber ($str) {
    return preg_match("/[^a-zA-Z0-9]{1,}/", $str);
}

// 영문만
function isAlpha ($str) {
    return preg_match("/^[a-zA-Z]{1,}$/", $str);
}

// 숫자만
function isNum ($num) {
    return preg_match("/^[0-9]{1,}$/", $num);
}

//비밀번호 : 8글자 이상
function isValidPassword ($str) {
    return strlen($str) >= 8 ? 'true' : 'false';
}

//이름 : 한글 + 영문
function isKoreanAlpha ($str) {
    return preg_match("/^[a-zA-Z가-힣]{1,}$/", $str);
}

echo "isAlphaNumber" . '<br>';
echo "abc: " . isAlphaNumber("abc") . '<br>';
echo "ab234c: " . isAlphaNumber("ab234c") . '<br>';
echo "a--sd: " . isAlphaNumber("a--sd") . '<br>';

echo '<br>';

echo "isNum" . '<br>';
echo "abc: " . isNum("abc") . '<br>';
echo "213: " . isNum("213") . '<br>';
echo "asda213: " . isNum("asda213") . '<br>';

echo '<br>';

echo "isValidPassword" . '<br>';
echo "1234567: " . isValidPassword("1234567") . '<br>';
echo "1234567890: " . isValidPassword("1234567890") . '<br>';

echo '<br>';

echo "isKoreanAlpha" . '<br>';
echo "abc123: " . isKoreanAlpha("abc123") . '<br>';
echo "한글123: " . isKoreanAlpha("한글123") . '<br>';
echo "한글abc: " . isKoreanAlpha("한글abc") . '<br>';
?>