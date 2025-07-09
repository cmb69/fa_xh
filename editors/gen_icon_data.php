<?php

if ($argc !== 3) {
    usage();
}
$version = (int) $argv[1];
if (!in_array($version, [4, 5, 6], true)) {
    usage();
}
$datafolder = $argv[2];
if (!is_dir($datafolder)) {
    usage();
}

switch ($version) {
    case 4:
        $icons = v4Icons($datafolder);
        break;
    case 5:
    case 6:
        $icons = v5Icons($datafolder);
        break;
}

$out = __DIR__ . "/tinymce5/fontawesome/icons$version.js";
$contents = 'window.tinymce.Resource.add("tinymce.plugins.fontawesome", '
    . json_encode($icons) . ');' . "\n";
file_put_contents($out, $contents);

function usage(): void
{
    global $argv;
    echo "usage: php $argv[0] <version> <folder>\n",
        "       <version> is 4, 5, or 6\n",
        "       <folder> contains icons.yml";
    exit(1);
}

function v4Icons(string $folder): array
{
    return array_map(function ($icon) {
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
    }, yaml_parse_file($folder . "/icons.yml")["icons"]);
}

function v5Icons(string $folder): array
{
    $icons = [];
    foreach (yaml_parse_file($folder . "/icons.yml") as $id => $icon) {
        $classes = [
            "solid" => "fas",
            "brands" => "fab",
        ];
        $style = $icon["styles"][0];
        $icons[$id] = [
            "name" => $icon["label"],
            "id" => $id,
            "categories" => ["All"],
            "class" => isset($classes[$style]) ? $classes[$style] : "",
            "filter" => $icon["search"]["terms"],
        ];
    }
    foreach (yaml_parse_file($folder . "/categories.yml") as $category) {
        $categoryName = $category["label"];
        foreach ($category["icons"] as $icon) {
            $icons[$icon]["categories"][] = $categoryName;
        }
    }
    return array_values($icons);
}
