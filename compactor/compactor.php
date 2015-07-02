#!/usr/bin/env php
<?php
/**
 * Compact PHP code.
 * Strip comments, combine entire library into one file.
 *
 * Copyright (c) 2015 sobird
 * Licensed under the MIT license.
 * https://github.com/crossyou/php/blob/master/LICENSE
 * @author  Yang,junlong at 2015-07-02 11:45:15 build.
 * @version $Id$
 */

if ($argc < 3) { 
	print "Strip unecessary data from PHP source files./n/n/tUsage: php compactor.php DESTINATION.php SOURCE.php";
	exit;
}

$source = $argv[1]; 
$target = $argv[2];
print "Compacting $source into $target./n";

if (function_exists( 'date_default_timezone_set' )){
    date_default_timezone_set('Asia/Shanghai');
}

$out = fopen($target, 'w'); 
fwrite($out,'<?php' . PHP_EOL);
fwrite($out, '/** Copyright (c) 2015 sobird' . PHP_EOL);
fwrite($out, ' * Licensed under the MIT license.' . PHP_EOL);
fwrite($out ,' * https://github.com/crossyou/php/blob/master/LICENSE');
fwrite($out, ' * @author  Compactor at '.date("Y-m-d H:i:s").' build.' . PHP_EOL);

$contents = file_get_contents($source);
foreach (token_get_all($contents) as $token) {
	if (is_string($token)) {
		fwrite($out, $token);
	} else {
		switch ($token[0]) {
			case T_REQUIRE:
			case T_REQUIRE_ONCE:
			case T_INCLUDE_ONCE:
			// We leave T_INCLUDE since it is rarely used to include
			// libraries and often used to include HTML/template files.
			case T_COMMENT:
			case T_DOC_COMMENT:
			case T_OPEN_TAG:
			case T_CLOSE_TAG:
			break;
			case T_WHITESPACE:
				fwrite($out, ' ');
				break;
			default:
				fwrite($out, $token[1]);
		}
	} 
}

fclose($out);
