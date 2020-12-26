<?php

    require("ppm");
    ppm_import("net.intellivoid.uap");

    /** @var UAParser\Parser $parser */
    $parser = UAParser\Parser::create();
    $results = $parser->parse("Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0");
    var_dump($results);