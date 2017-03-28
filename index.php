<?php

/**
 * Copyright 2017 Christoph M. Becker
 *
 * This file is part of Fa_XH.
 *
 * Fa_XH is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Fa_XH is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Fa_XH.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @return ?string
 */
function fa_link()
{
    global $hjs, $pth;
    static $again = false;

    if ($again) {
        return;
    }
    $again = true;
    $pluginFolder = "{$pth['folder']['plugins']}fa/";
    $hjs .= <<<HTML
<style type="text/css">
@font-face {
  font-family: 'FontAwesome';
  src: url('{$pluginFolder}fonts/fontawesome-webfont.eot?v=4.7.0');
  src: url('{$pluginFolder}fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'),
       url('{$pluginFolder}fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'),
       url('{$pluginFolder}fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'),
       url('{$pluginFolder}fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'),
       url('{$pluginFolder}fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
  font-weight: normal;
  font-style: normal;
}
</style>
<link rel="stylesheet" type="text/css" href="{$pluginFolder}css/font-awesome.css">

HTML;
}
