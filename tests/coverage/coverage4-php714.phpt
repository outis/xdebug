--TEST--
Test with Code Coverage with abstract methods (> PHP 7.1.3, < PHP 7.4)
--SKIPIF--
<?php
require __DIR__ . '/../utils.inc';
check_reqs('PHP > 7.1.3,< 7.4');
?>
--INI--
xdebug.default_enable=1
xdebug.auto_trace=0
xdebug.trace_options=0
xdebug.collect_params=1
xdebug.collect_return=0
xdebug.collect_assignments=0
xdebug.auto_profile=0
xdebug.profiler_enable=0
xdebug.dump_globals=0
xdebug.show_mem_delta=0
xdebug.trace_format=0
xdebug.overload_var_dump=0
xdebug.coverage_enable=1
--FILE--
<?php
    xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);

	include 'coverage4.inc';

    xdebug_stop_code_coverage(false);
    $c = xdebug_get_code_coverage();
	ksort($c);
	var_dump($c);
?>
--EXPECTF--
array(2) {
  ["%scoverage4-php714.php"]=>
  array(2) {
    [4]=>
    int(1)
    [6]=>
    int(1)
  }
  ["%scoverage4.inc"]=>
  array(3) {
    [2]=>
    int(1)
    [25]=>
    int(1)
    [26]=>
    int(1)
  }
}
