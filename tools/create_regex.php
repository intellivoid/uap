<?php

    require("ppm");

    ppm_import("net.intellivoid.uap");

    $converter = new \UAParser\Util\Converter(__DIR__);

    file_put_contents("regex.yaml", file_get_contents("https://raw.githubusercontent.com/ua-parser/uap-core/master/regexes.yaml"));
    $converter->convertFile("regex.yaml", false);
