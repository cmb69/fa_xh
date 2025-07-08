<?php

$iconfile = $argv[1];

$icons = yaml_parse_file($iconfile)["icons"];
$icons = array_map(function ($icon) {
    $categories = array_map(function ($category) {
        return preg_replace('/ Icons$/', "", $category);
    }, $icon["categories"]);
    $res = [
        "name" => $icon["name"],
        "id" => $icon["id"],
        "categories" => $categories,
    ];
    if (isset($icon["filter"])) {
        $res["filter"] = $icon["filter"];
    }
    return $res;
}, $icons);

$out = __DIR__ . "/tinymce5/fontawesome/icons4.js";
$contents = 'window.tinymce.Resource.add("tinymce.plugins.fontawesome", '
    . json_encode($icons, JSON_PRETTY_PRINT) . ');' . "\n";
file_put_contents($out, $contents);
