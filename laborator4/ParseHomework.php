<?php
/**
 * Created by IntelliJ IDEA.
 * User: ovidiu
 * Date: 08.03.2018
 * Time: 16:05
 */



function comp($a, $b)
{
    if ($a[0] == $b[0]) {
        return 0;
    }
    return ($a[0] < $b[0]) ? -1 : 1;
}


interface IParseHomework
{
    public function write_text();
}

class ParseHomework implements IParseHomework
{
    public $nume, $grupa, $nr_tema, $obiect, $result;
    private $numarTaskuri;
    private $score;

    function ParseHomework($string)
    {
        echo $string;
        $this->result = explode(".",$string);
        $this->score = [];
        echo "\n\n";
    }


    public function  __toString()
    {
        return "[".$this->result[0].", ".$this->result[1].", ".$this->result[2].", ".$this->result[3].", ".$this->result[4]." ]\n";
    }


    public function setNumberOfTasks()
    {
       $this->numarTaskuri = rand(2, 10)/$this->result[3][4]+ 1;
    }

    public function initScore()
    {
        for($i=1; $i<=$this->numarTaskuri; $i+=1){
            array_push($this->score,0);
        }
        print_r($this->score);
    }

    function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function checkTasks(){

        for($i=0; $i<$this->numarTaskuri; $i+=1){
            $aux = [rand(2, 10), $this->generateRandomString()];
            $this->score[$i] = $aux;
        }

        print_r($this->score);
    }

    public function sortTasks(){

        usort($this->score, "comp");
        print_r($this->score);

    }

    public function write_text(){

        print "\nFinish\n";
    }
}

