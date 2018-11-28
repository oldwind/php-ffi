--TEST--
FFI 039: Pointer arithmetic
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
$a = FFI::new("int[10]");
for ($i = 0; $i < 10; $i++) {
	$a[$i] = $i;
}
$p = $a + 0;
var_dump($p[0]);
$p += 7;
var_dump($p[0]);
$q = $p - 3;
var_dump($q[0]);
$q = 1 + $q;
$p++;
var_dump($p, $q);
var_dump($p - $q);
var_dump($q - $p);
?>
--EXPECTF--
int(0)
int(7)
int(4)
object(FFI\CData:int32_t*)#%d (1) {
  [0]=>
  int(8)
}
object(FFI\CData:int32_t*)#%d (1) {
  [0]=>
  int(5)
}
int(3)
int(-3)
