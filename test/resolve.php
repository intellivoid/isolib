<?php

    use Isolib\Isolib;

    include 'ppm';
    include 'net.intellivoid.isolib';

    $IsoLib = new IsoLib();
    var_dump($IsoLib->resolve('Canada'));
    var_dump($IsoLib->resolve('ca'));
    var_dump($IsoLib->resolve('FRA'));