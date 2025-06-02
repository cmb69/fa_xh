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

class View
{
    /** @var string */
    private $templateFolder;

    /** @var array<string,string> */
    private $text;

    /**
     * @var array<string,mixed>
     */
    public $data = array();

    /** @param array<string,string> $text */
    public function __construct(string $templateFolder, array $text)
    {
        $this->templateFolder = $templateFolder;
        $this->text = $text;
    }

    /**
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param string $name
     * @param mixed[] $args
     * @return string
     */
    public function __call($name, array $args)
    {
        return $this->escape($this->data[$name]);
    }

    /**
     * @param string $key
     * @return string
     */
    protected function text($key)
    {
        $args = func_get_args();
        array_shift($args);
        return $this->escape(vsprintf($this->text[$key], $args));
    }

    /**
     * @param string $key
     * @return string
     */
    public function plain($key)
    {
        $args = func_get_args();
        array_shift($args);
        return vsprintf($this->text[$key], $args);
    }

    public function render(string $template): string
    {
        ob_start();
        echo "<!-- {$template} -->", PHP_EOL;
        include "{$this->templateFolder}{$template}.php";
        return (string) ob_get_clean();
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    protected function escape($value)
    {
        return XH_hsc($value);
    }
}
