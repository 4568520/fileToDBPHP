<?php
/**
 * Created by PhpStorm.
 * Date: 04/24/18
 * Time: 19:25
 */
function idCheck($id){
    if(strlen($id)==0){//checking if id is a valid string
    echo 'no data';
    return -1;

    }elseif (strlen($id)!=11){

        echo 'wrong size of string';
        return -1;
    }else{
        if(!is_numeric($id)){
            echo 'Not a number';
            return 0;
        }

    $gender=intval($id[0]);
    if($gender>6 or $gender<1){
        echo 'Wrong gender';
        return -1;
    }
    $curDate=getdate();
    $cY=intval(substr($curDate['year'],2,2));
    $cBY=intval($curDate['year']);
    $cM=intval($curDate['mon']);
    $cD=intval($curDate['mday']);
    $yOB = intval(substr($id,1,2));
    $mOB = intval(substr($id,3,2));
    $dOB =intval(substr($id,5,2));
    $days=[31,28,31,30,31,30,31,31,30,31,30,31];
    if(($gender==6 or $gender==5)and $yOB>$cY){
        echo 'year is bad<br>';
        return -1;
    }
    if($mOB>12 or $mOB<1){
        echo 'Month is bad<br>';
        return -1;
    }
    if($gender==6 or $gender==5){
        $yOB+=2000;
    }elseif ($gender==4 or $gender==3){
        $yOB+=1900;
    }else{
        $yOB+=1800;
    }
    if($yOB%4==0){
        $days[1]=29;
    }
    $mOB--;
    if(($dOB>$days[$mOB]) or $dOB==0){
        echo 'Day is bad<br>';
        return -1;
    }
    $mOB++;
    $age=$cBY-$yOB-1;
    if($mOB<$cM){
        $age++;
    }elseif ($mOB==$cM and $dOB<=$cD){
     $age++;
    }
    return $age;
}}
?>
