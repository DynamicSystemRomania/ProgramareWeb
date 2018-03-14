<?php
/**
 * Created by IntelliJ IDEA.
 * User: ovidiu
 * Date: 08.03.2018
 * Time: 15:53
 */

require_once '/home/ovidiu/ProgramareWeb/laborator4/ParseHomework.php';
$t=time();
echo(date("Y-m-d h:i:s a",$t));
echo "\n";
$bar = new ParseHomework("Chelcioiu.Ionut-Daniel.341C1.Tema1.PW.zip");
echo $bar;
$bar->setNumberOfTasks();
$bar->initScore();
$bar->checkTasks();

