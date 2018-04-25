<?php
/**
 * Created by PhpStorm.
 * Date: 04/24/18
 * Time: 19:25
 */
function idCheck($id){
    if(strlen($id)==0){//checking if id is a valid string
    echo 'no data';
    return 0;

    }elseif (strlen($id)!=11){

        echo 'wrong size of string';
        return 0;
    }else{
        if(is_numeric($id)){
            echo 'Not a number';
            return 0;
        }
    }
    $gender=intval($id[0]);
    if($gender>6 or $gender<1){
        echo 'Wrong gender';
        return 0;
    }
    $curDate=getdate();
    $cY=intval(substr($curDate['year'],2,2));
    $cBY=intval($curDate['year']);
    $cM=intval($curDate['mon']);
    $cD=intval($curDate['mday']);
    $yOB = intval(substr($id,1,2));
    $mOB = intval(substr($id,4,2));
    $dOB =intval(substr($id,6,2));
    $days=[31,28,31,30,31,30,31,31,30,31,30,31];
    if(($gender==6 or $gender==5)and yOB>cY){
        echo 'year is bad';
        return 0;
    }
    if($mOB>12 or $mOB<0){
        echo 'Month is bad';
        return 0;
    }
    if($gender==6 or $gender==5){
        $yOB+=2000;
    }elseif ($gender==4 or $gender==3){
        $yOB+=1900;
    }else{
        $yOB+=1800;
    }

}

