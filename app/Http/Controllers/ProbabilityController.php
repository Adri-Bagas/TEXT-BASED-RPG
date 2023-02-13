<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProbabilityController extends Controller
{
    public function checkProb($probabilities, $results)
    {
        $total = array_sum($probabilities);
        $random_num = mt_rand(1, $total);
        $counter = 0;
        foreach($probabilities as $index=>$value)
        {
            $counter += $value;
                if($counter > $random_num)
            {
                return $results[$index];
            }
        }
    }

    public function checkProbLevel(){

        $probabilities = [65, 23, 10, 2];
        $results = ['COMMON', 'UNCOMMON', 'RARE', 'EPIC'];

        $total = array_sum($probabilities);
        $random_num = mt_rand(1, $total);
        $counter = 0;
        foreach($probabilities as $index=>$value)
        {
            $counter += $value;
                if($counter > $random_num)
            {
                return $results[$index];
            }
        }
    }

    public function checkProbWithStats($stats, $req){

        $chance = ( $stats / $req ) * 100;

        $falseChance = 100 - $chance;

        $probabilities = [$chance, $falseChance];
        $results = [true, false];

        $total = array_sum($probabilities);
        $random_num = mt_rand(1, $total);
        $counter = 0;
        foreach($probabilities as $index=>$value)
        {
            $counter += $value;
                if($counter > $random_num)
            {
                return $results[$index];
            }
        }
    }

    public function levelUpInt(){
        $probabilities = [65, 23, 10, 2];
        $results = [ 1 , 2 , 3, 4];

        $total = array_sum($probabilities);
        $random_num = mt_rand(1, $total);
        $counter = 0;
        foreach($probabilities as $index=>$value)
        {
            $counter += $value;
                if($counter > $random_num)
            {
                return $results[$index];
            }
        }
    }




    // public function test(){
    //     Based on code from:
    //     http://stackoverflow.com/questions/14389180/algorithm-for-probability-when-looping-over-a-randomly-ordered-array
    //     http://math.stackexchange.com/questions/280792/determining-probability-in-a-random-loop/280948#280948
    //     -------------

    //     Taken from php.net/shuffle user notes
    //     function shuffle_assoc($array) {
    //         $keys = array_keys($array);
    //         shuffle($keys);
    //         foreach($keys as $key) {
    //         $new[$key] = $array[$key];
    //         }
    //         return $new;
    //     }

    //     $i = 10000; How many tests to perform

    //     This is my rule list.  Each key is a simple color
    //     and each value is a probability represented as a percent
    //     $rules = array(
    //         'hit' => 33,
    //         'nohit' => 33
    //     );

    //     Initialize the scores array with all 0's
    //     The "outs" will be used when the probability does not
    //     occur in any of the rules
    //     $scores = array('outs' => 0);
    //     foreach($rules as $k => $v) { 
    //     $scores[$k] = 0;
    //     }

    //     $count = count($rules);


    //     for($x = 0; $x < $i; $x++) { 
    //         $rules = shuffle_assoc($rules);

    //         $accumulated_probability = 0;
    //         $rand = mt_rand(1,100);
    //         foreach($rules as $k => $probability) {
    //             $actual_probability = $probability + $accumulated_probability;
    //             $accumulated_probability = $probability + $accumulated_probability;

    //             if($rand > $actual_probability) { 
    //             continue; 
    //             } else {
    //             $scores[$k]++;
    //                 if( $x == $i - 2 ){
    //                     dd($rules);
    //                 };
    //             continue 2;
    //             }
    //         }
    //         $scores['outs']++;
    //     }

    //     $datas = [];


    //     foreach($scores as $k => $v) { 
    //         array_push($datas, "$k: " . (($v/$i)*100) . "% ($v/$i)\n");
    //     }

    //     dd(
    //         array(
    //             'datas' => $datas,
    //             'scores' => $scores,
    //         )
    //     );
    // }

    // function shuffle_assoc($array) {
    //             $keys = array_keys($array);
    //             shuffle($keys);
    //             foreach($keys as $key) {
    //             $new[$key] = $array[$key];
    //             }
    //             return $new;
    //         }

    //     $rules = array(
    //         'hit' => 33,
    //         'nohit' => 33
    //     );

    //     $i = 100;

    //     $points = 1;

    //     $rangeStart = [];

    //     $rangeEnd = [];

    //     $numb = [];

    //     $score = [
    //         'outs' => 0
    //     ];

    //     foreach($rules as $key => $value){
    //         $rangeStart[$key] = $points;
    //         $score[$key] = 0;

    //         $points += $value;

    //         $rangeEnd[$key] = $points;

    //     }

    //     for($x = 0;$x < $i;$x++){
    //         $rand = mt_rand(1, 100);

    //         foreach($rules as $key => $value){
    //             if($rangeStart[$key] > $rand && $rangeEnd[$key] < $rand){
    //                 if(in_array($rand, $numb)){
    //                     array_push($numb, $rand);
    //                     $score[$key]++;

    //                     continue;
    //                 }
    //             }
    //         }
    //     }


        // function checkWithSet(array $set, $length=10000)
        // {
        //     $left = 0;
        //     foreach($set as $num=>$right)
        //     {
        //         $set[$num] = $left + $right*$length;
        //         $left = $set[$num];
        //     }
        //     $test = mt_rand(1, $length);
        //     $left = 1;
        //     foreach($set as $num=>$right)
        //     {
        //         if($test>=$left && $test<=$right)
        //             {
        //                 return $num;
        //             }
        //     $left = $right;
        //     }
        //     return null;//debug, no event realized
        // }

        // $set = [
        //     1 => 0.6,
        //     2 => 0.25,
        //     3 => 0.25,
        //     4 => 0.6,
        //     5 => 0.2,
        //     6 => 0.1
        // ];
        // for($i=0; $i<10; $i++)
        // {
        //     var_dump(checkWithSet($set));
        // }

        // face 1 = 40%, face 2 = 10% etc...

        // $probabilities = [100, 10, 25, 25];
        // $results = ['face 1', 'face 2', 'face 3', 'face 4'];

        // function checkWithSet($probabilities, $results)
        // {
        //     $total = array_sum($probabilities);
        //     $random_num = mt_rand(1, $total);
        //     $counter = 0;
        //     foreach($probabilities as $index=>$value)
        //     {
        //     $counter += $value;
        //         if($counter > $random_num)
        //         {
        //             return $results[$index];
        //         }
        //     }
        // }

        // echo checkWithSet($probabilities, $results);
    // }

}