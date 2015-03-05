<?php

function sql_Connect(){
    mysql_connect('localhost','root','');
    mysql_select_db('library');
}

function Connection($table){
    if (mysql_connect('localhost','root','')) {
        if ($res = mysql_select_db($table)) {   // зачем res? //
           return true;
        }
        else{
            die("Соединение c БД не установлено! <br>");
        }
    }
    else{
        die ("Соединение c СУБД MySQL не установлено!<br>");
    }
}

function Disconnection(){
    if (!mysql_close()) {
        die ("Ошибка! Соединение не закрыто! <br>");
    }
}

function sql_Query($query){

    $row = mysql_query( $query );

    $dba = [];
    while ($res = mysql_fetch_array($row)){
        $dba[] = $res;
    }
    return $dba;
}
function get_record($query){

    $row = mysql_query($query);

    if ($record = mysql_fetch_array($row)){
        return $record;
    }
    return false;
}
function toDB($id, $dir, $filename, $comment, $visited){
    if ($res = mysql_query("INSERT INTO images(  id, dir, filename, comment, visited )
                                        VALUES('$id','$dir','$filename','$comment','$visited' )")) {
        return true;
    }
    else{
        die ("Ошибка записи данных в таблицу! <br>");
    }
}

function record_toDB($article){
    $query = "INSERT INTO articles ( a_type, pub_date, title, preview, text )
                        VALUES('$article->type','$article->date', '$article->title', '$article->preview ', '$article->text')";
    if ($res = mysql_query($query)){
        return true;
    }
    return false;
}

function update_record($article){
    $query = "UPDATE articles SET   a_type = '$article->type',
                                  pub_date = '$article->date',
                                     title = '$article->title',
                                   preview = '$article->preview',
                                      text = '$article->text' WHERE id = '$article->id' ";

    if ($res = mysql_query($query)){
        return true;
    }
    return false;
}


?>