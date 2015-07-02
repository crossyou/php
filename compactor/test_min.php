<?php
/**
 * Compactor
 * 
 * Copyright (c) 2015 sobird
 * Licensed under the MIT license.
 * https://github.com/crossyou/php/blob/master/LICENSE
 * @author  Compactor at 2015-07-02 14:10:20 build.
 */
  class RandChar{ function getRandChar($length){ $str = null; $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz"; $max = strlen($strPol)-1; for($i=0;$i<$length;$i++){ $str.=$strPol[rand(0,$max)]; } return $str; } } function echo_rand_char() { $rc = new RandChar(); for ($i=0, $l = 10; $i < $l; $i++) { echo $rc->getRandChar(6)."\n"; } } echo_rand_char();