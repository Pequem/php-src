--TEST--
Bug #38003 (in classes inherited from MySQLi it's possible to call private constructors from invalid context)
--SKIPIF--
<?php if (!extension_loaded("mysqli")) print "skip"; ?>
--FILE--
<?php

class DB extends mysqli {

    private function __construct($hostname, $username, $password, $database) {
        var_dump("DB::__construct() called");
    }
}

$DB = new DB();

echo "Done\n";
?>
--EXPECTF--
Fatal error: Uncaught Error: Call to private DB::__construct() from invalid context in %s
Stack trace:
#0 {main}
  thrown in %s
