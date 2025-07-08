<?php

$iconfile = $argv[1];

$icons = yaml_parse_file($iconfile)["icons"];

$out = __DIR__ . "/tinymce5/fontawesome/icons4.js";
$contents = 'window.tinymce.Resource.add("tinymce.plugins.fontawesome", '
    . json_encode($icons, JSON_PRETTY_PRINT) . ');' . "\n";
file_put_contents($out, $contents);
