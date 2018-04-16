<?php
/**
 * Created by IntelliJ IDEA.
 * User: ovidiu
 * Date: 28.03.2018
 * Time: 19:46
 */

require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');


if($_GET!=[]){
    /**  ex1  **/
    $id = $_GET["id"];

    $a = ORM::for_table('articles')->rawQuery("select * from articles where id = $id")->findArray();
    if (strpos($a[0]["text"],"jpeg")){
        echo $a[0]["text"];
        echo "<img src= ".$a[0]["text"]. " >";
    }
    else
        print_r($a[0]["text"]);

}
else {

    if($_POST==[]){
        /**  ex2  **/

        $a = ORM::for_table('articles')->rawQuery("select * from articles")->findArray();
            foreach ($a as $row)
                echo "<a href='lab6.php?id=".$row['id']."'>" . $row['title'] . "</a><br>";

        echo '<form action="lab6.php" method="post">
            title: <input type="text" name="title"><br>
            text: <input type="text" name="content"><br>
            <input type="submit">
            </form>';
        echo "<a href='logout.php'>Logout</a><br>";

    }else{

        $title = $_POST["title"];
        $content = $_POST["content"];
        echo $title."<br> ".$content;
        create_article('ceva','multe');
        $a = ORM::for_table('articles')->rawQuery("select * from articles")->findArray();
        foreach ($a as $row)

                echo "<a href='lab6.php?id=".$row['id']."'>" . $row['title'] . "</a><br>";

    }
}


