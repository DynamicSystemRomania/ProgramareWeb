<?php
/**
 * Created by IntelliJ IDEA.
 * User: ovidiu
 * Date: 29.03.2018
 * Time: 08:32
 */
require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');
function create_article($title, $contents)
{
    $article = ORM::for_table('articles')->create();
    $article->title = $title;
    $article->text = $contents;
    $article->save();
    return $article;
}
create_article('ceva','multe');