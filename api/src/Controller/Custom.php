<?php

namespace App\Controller;

class Custom
{
    public function __invoke($id, $personId)
    {
        var_dump($id, $personId);
        die('test');
    }
}
