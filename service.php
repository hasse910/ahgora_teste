<?php
class DnaService
{

    protected $data = [];
    protected $lengthAll = 0;
    protected $lenghtLine = 0;

    public function __construct($dados)
    {

        foreach ($dados as $line)
        {
            $lineResult=[];
            foreach (str_split($line, 1) as $letter)
            {
                array_push($lineResult, $letter);

            }
            array_push($this->data, $lineResult);
        }


        $this->lengthAll = count($this->data);
        $this->lenghtLine = count($this->data[0]);

    }


    public function getSequencia()
    {
        $i = 0;
        $j = 0;

        for($i = 0; $i < $this->lengthAll; $i++) {
            for($j = 0; $j < $this->lenghtLine; $j++) {
                if($this->check($this->data[$i][$j], $i, $j)){
                    return true;
                }
            }
        }

        return false;

    }

    function check($value, $i, $j){
        $direction = 'both';
        $horizontal = true;
        $vertical = true;
        $diagonal = true;

        if($j + 4 >= $this->lenghtLine){
            $direction = 'left';
            $horizontal = false;
        }

        if($j < 3){
            $direction = 'right';
        }



        if($i + 3 >= $this->lengthAll){
            $vertical = false;
            $diagonal = false;
        }


        if($diagonal){
            if($this->checkDiagonal($value, $i, $j, $direction)){
                return true;
            }
        }

        if($horizontal){
            if($this->checkHorizontal($value, $i, $j)){
                return true;
            }
        }

        if($vertical){
            if($this->checkVertical($value, $i, $j)){
                return true;
            }
        }


        return false;

    }

    function checkDiagonal($value, $i, $j, $direction){


        if($direction == 'right' || $direction == 'both'){
            if(
                $value == $this->data[$i + 1][$j + 1] &&
                $value == $this->data[$i + 2][$j + 2] &&
                $value == $this->data[$i + 3][$j + 3]
            ){

                return true;
            }
        }

        if($direction == 'left' || $direction == 'both'){
            if(
                $value == $this->data[$i + 1][$j - 1] &&
                $value == $this->data[$i + 2][$j - 2] &&
                $value == $this->data[$i + 3][$j - 3]
            ){
                return true;

            }
        }
    }

    function checkHorizontal($value, $i, $j){
        if(
            $value == $this->data[$i][$j + 1] &&
            $value == $this->data[$i][$j + 2] &&
            $value == $this->data[$i][$j + 3]
        ){
            return true;

        }
    }

    function checkVertical($value, $i, $j){
        if(
            $value == $this->data[$i + 1][$j] &&
            $value == $this->data[$i + 2][$j] &&
            $value == $this->data[$i + 3][$j]
        ){
            return true;

        }
    }

}

?>