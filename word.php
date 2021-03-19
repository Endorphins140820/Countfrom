<?php
function c1()
{
    $file = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
//$down= explode("\n",$file);
    $count = str_word_count($file);
    echo "Số từ có : ", $count . "\n";
}

function c2()
{
    $file = file("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
    static $num = 0;
    foreach ($file as $value) {
        $text = preg_replace("/\r|\n/", "", $value);
        if (strlen($text) == 15) {
            $num++;
        }
    }
    echo "Số từ có 15 ký tự : " . $num . "\n";
}

function c3()
{
    $num = 0;
    $file = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
    $arr= explode("\n",$file);
    foreach ($arr as $value){
        if (strpos($value,'w')==true ){
            $num++;
        }
    }
    echo'Số từ có chứa ký tự w : '. $num."\n";
}
function c4(){
    $num = 0;
    $file = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
    $arr= explode("\n",$file);
    foreach ($arr as $value){
        if (strripos($value,'q')==true ){
            $num++;
        }
    }
    echo 'Số từ kết thúc bằng ký tự q : '. $num."\n";
}
c1();
c2();
c3();
c4();



