<?php
/**
 * php test source
 * 
 * 
 * @author  Yang,junlong at 2015-07-02 13:53:58 build.
 * @version $Id$
 */

/**
 * 生成随机字符
 *
 * @author tester <[<test@test.com>]>
 */
class RandChar{
    function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for($i=0; $i< $length; $i++){
            $str .= $strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }
}

function echo_rand_char() {
    $rc = new RandChar();
    for ($i=0, $l = 10; $i < $l; $i++) { 
        echo $rc->getRandChar(6)."\n";
    }
}

echo_rand_char();
