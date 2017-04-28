<?php

$json = file_get_contents('fa-in.json');
$icons = json_decode($json);
$icons = array_map(function ($icon) {
    return ["fa-{$icon->id}", $icon->name];
}, $icons->icons);
file_put_contents('fa-out.json', json_encode($icons, JSON_PRETTY_PRINT));
