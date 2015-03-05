<?php

require_once __DIR__.'/settings/autoload.php';

echo 'Урок 5 <br>';

$news = new Admin;

$iterator = new MyIterator;

$iterator = $news->getAll();

//Ar::dump($iterator);
var_dump($iterator);

echo "<br>";
echo "<br>";
echo "<br>";

$keys = array_keys($iterator);
var_dump($keys);

echo 'array_keys = '. $keys .'<br>';
if (!empty($iterator)) {
    echo '$iterator не пуст';
    echo $iterator[0]->title;
}else{
    echo '$iterator пуст';
}