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
    $curDate=

}

