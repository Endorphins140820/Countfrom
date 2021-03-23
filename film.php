<?php
function ex1()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    print_r("Top 10 Movie : " . "\n");

    for ($i = 0; $i < 10; $i++) {
        echo $i + 1 . " ";
        print_r($sperate_arr[$i]['im:name']['label']);
        echo "\n";
    }
}

function ex2()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    $num = null;
    foreach ($sperate_arr as $key => $value) {
        if ($value['im:name']['label'] == "Gravity") {
            $num = $key;
        }
    }
    print_r("Ranking film 'Gravity' : " . $num . "\n");
}

function ex3()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    foreach ($sperate_arr as $value) {
        if ("The LEGO Movie" == $value['im:name']['label']) {
            print_r("Artist The LEGO Movie : " . $value['im:artist']['label']);
            print_r("\n");
        }
    }

}

function ex4()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    $num = 0;
    foreach ($sperate_arr as $value) {
        $releasedate = ($value['im:releaseDate']['label']) . (int)substr(0, 4);
        if ($releasedate < 2000) {
            $num++;
        }
    }
    echo "The number of movies released before 2000 is : " . +$num . " film" . "\n";

}

function ex5()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    $max = null;
    $min = null;
    foreach ($sperate_arr as $value) {
        $releasedate = ($value['im:releaseDate']['label']);
        $str = (int)substr($releasedate, 0, 4);
        if ($max == null) {
            $max = $str;
        } else {
            if ($str > $max) {
                $max = $str;
            }
        }
        if ($min == null) {
            $min = $str;
        } else {
            if ($str < $min) {
                $min = $str;
            }
        }
    }
    print_r("The oldest film : " . $max . "\n");
    print_r("The recent film : " . $min . "\n");
}

function ex6()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    $categories = [];
    foreach ($sperate_arr as $key => $value) {
        $label = $value['category']['attributes']['label'];
        if (empty($categories[$label])) {
            $categories[$label] = 1;
        } else {
            $categories[$label]++;
        }
    }
    arsort($categories);
    print_r("Category most represented film : " . key($categories) . "\n");

}

function ex8()
{

    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $sperate_arr = $decode_file['feed']['entry'];
    print_r("Top 10 Movie on iTunes : " . "\n");
    for ($i = 0; $i < 10; $i++) {
        print_r($i + 1 . " ");
        print_r("Film : " . $sperate_arr[$i]['im:name']['label']);
        print_r(" \n Price " . $sperate_arr[$i]['im:price']['label'] . 'USD ');
        if (!empty($sperate_arr[$i]['im:rentalPrice']['label'])) {
            print_r(" RentalPrice  " . $sperate_arr[$i]['im:rentalPrice']['label'] . 'USD');
        } else {
            print_r("NOT FOR RENT");
        }
        print_r("\n");
    }

}

function ex9()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $seperate_arr = $decode_file['feed']['entry'];
    $arr = [];
    foreach ($seperate_arr as $value) {
        $release_date = $value['im:releaseDate']['label'];
        $dateched_month = substr($release_date, 5, 2);
        if (empty($arr[$dateched_month])) {
            $arr[$dateched_month] = 1;
        } else {
            $arr[$dateched_month]++;
        }
    }
    arsort($arr);
    $times = (array_shift($arr));
    $month = array_search($times, $arr);
    print_r("Month with the most cinema releases : " . $month . "  With " . $times . " Times" . "\n");
}

function ex10()
{
    $open_file = file_get_contents('films.json', FILE_USE_INCLUDE_PATH);
    $decode_file = json_decode($open_file, true);
    $seperate_arr = $decode_file['feed']['entry'];
    $money = [];
    $film = [];
    foreach ($seperate_arr as $key => $value){
        $name_film = $value['im:name']['label'];
        $price =$value['im:price']['label'];
        $price = trim($price,"$");
        $money[$name_film] = $price;
    }
    asort($money);
    print_r("top 10 movies to see with a limited budget : ");
    print_r(array_slice($money,0,10));
}
ex10();
