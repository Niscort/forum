<?php

require_once 'core/core.class.php';

try
{
    Core::run();
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>