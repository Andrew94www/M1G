<?php
/*.....................Задача  № 1........................*/
function emailValidate($email){
    if (preg_match('#^[a-zA-Z.][a-zA-Z-.]+@[a-z]+\.[a-z]{2,3}$#', $email)) {
        return "Адрес указан корректно.";
    }else{
        return "Адрес указан не правильно.";
    }

}
echo emailValidate('mail*tt@mail.com');
/*................Задача  № 2.........................*/
function transliterations($title)
{
    $alfabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'є' => 'e',   'ж' => 'zh',  'з' => 'z',
        'і' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',    'и' => 'y',
        'ї' => 'yi',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Є' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',    'И' => 'Y',
        'Ї' => 'Yi',   'Ю' => 'Yu',  'Я' => 'Ya',
    ];
    $title = strtr($title, $alfabet);
    $title = mb_strtolower($title);
    $title = mb_ereg_replace('[^-0-9a-z]', ' ', $title);
    $title = mb_ereg_replace('[-]+', ' ', $title);
    $title = trim($title, '-');
    return $title;
}
//echo  transliterations("певна стрічка");

/*..............Задача  № 3.............*/
$arrayOne = ['el', 'ab', 'cd'];
$arrayTwo = ['y5', 'y6', 'y7'];
function reverseArr($arrayOne,$arrayTwo ){
    $arr=[];
    for ($i = 0, $j = count($arrayTwo)-1; $i <= count($arrayOne)-1, $j >= 0; $j--, $i++){
        $arr[]=$arrayOne[$i].'-'.$arrayTwo[$j];
    }
    return $arr;
}

//echo '<pre>';
//print_r(reverseArr($arrayOne,$arrayTwo ));
//echo '<pre>';
//

/*...........Задача  № 4....................*/
function getFiles($dir){
    $result=[];
    $files =array_diff(scandir($dir),['..','.']);
    foreach ($files as $file){
        $path = $dir.'/'.$file;
        if (is_dir( $path )){
            $result =array_merge( $result , getFiles($path));
        } else{
            $result[] =$path;
        }
    }
  return $result ;


}
function reameFile($array ){
    foreach ($array  as $res){
        $arr = explode('/', $res);
        $str = strtolower($arr[ count($arr)-1]) ;
        $str1  =preg_replace('#[0-9]#', '0',  $str );
        $arr[ count($arr)-1] =  $str1;
        $str =implode('/',$arr);
        rename($res,$str);
    }
}

function getFilesJpg($array){
    $jpg =[];
    foreach ($array  as $res){
        $arr = explode('/', $res);
        $arr1 =explode('.', $arr[ count($arr)-1]);
        if($arr1[1]=='jpg' or $arr1[1]=='JPG'){
            echo $res;
        }

    }
}

//$array = getFiles('dir');
//reameFile($array );
//$array = getFiles('dir');
//getFilesJpg($array);

/*...........Задача  № 5....................*/
$arrayOne = [
    'name' => 'some name',
    'age' => 5,
    'city' => 'some town'
];

$arrayTwo = [
    'age' => 6,
    'country' => 'small country',
  'city' => 'mego city',
  'street' => 'cute ave.'
];

function arreyMarge($arrayOne,$arrayTwo){
    $list = [];
    $arr = array_merge($arrayOne,$arrayTwo);
    foreach ($arr as $key=>$value){
        $list[]=$key.'=>'.$value;
    }
    $list =array_chunk($list, 1);
    $fp = fopen('file.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}
//arreyMarge($arrayOne,$arrayTwo);

/*...........Задача  № 6 ....................*/
function getByUrl ($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
   	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
   	$result = curl_exec($curl);
    preg_match_all('#<a>(.+?)</a>#su', 	$result, $res);
    return $res;

}
function getByImg ($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($curl);
    preg_match_all('#<img>(.+?)>#su', 	$result, $res);
    return $res;

}

//preg_match_all('#<a>(.+?)</a>#su', $str, $res);

