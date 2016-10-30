<?php

namespace App;

class DbException
    extends \Exception

{

}

$new = new DbException();
var_dump($new);