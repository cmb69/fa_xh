<?php

/**
 * Copyright 2017-2021 Christoph M. Becker
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

namespace Fa;

class Plugin
{
    const VERSION = '1.3';

    public static function requireCommand(): RequireCommand
    {
        global $pth, $plugin_cf;
        return new RequireCommand(
            $pth["folder"]["plugins"] . "fa/",
            $plugin_cf["fa"]
        );
    }

    public static function infoCommand(): InfoCommand
    {
        return new InfoCommand(self::view());
    }

    private static function view(): View
    {
        global $pth;
        return new View($pth["folder"]["plugins"] . "fa/views/");
    }
}
