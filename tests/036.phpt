--TEST--
FFI 036: Type memory management
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--INI--
ffi.enable=1
--FILE--
<?php
$type = FFI::type("int*");

function foo($ptr) {
	global $type;
	//$buf = FFI::new("int*[1]"); /* this loses type and crash */
	$buf = FFI::new(FFI::array_type($type, [1]));
	$buf[0] = $ptr;
	//...
	return $buf[0];
}

$int = FFI::new("int");
$int = 42;
var_dump(foo(FFI::addr($int)));
?>
--EXPECTF--
object(FFI\CData:int32_t*)#%d (1) {
  [0]=>
  int(42)
}
