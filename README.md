# Fa\_XH

Fa\_XH provides [Font Awesome](https://fontawesome.com/)
for CMSimple\_XH templates, plugins and content.
The plugin has been created for similar reasons as the
[jQuery4CMSimple](https://wiki.cmsimple-xh.org/doku.php/extend:jquery4cmsimple)
plugin, namely to avoid clashes when Font Awesome is used by multiple components.
For instance, a template may include a certain Font Awesome version,
but a plugin another one.
If all components rely on Fa\_XH, all will use the same version.

Furthermore Fa\_XH delivers editor plugins to ease the use
of Font Awesome icons in the content, if this is desired.
Currently, TinyMCE 4 and CKEditor are supported.

## Table of Contents

- [Requirements](#requirements)
- [Download](#download)
- [Installation](#installation)
- [Settings](#settings)
- [Usage](#usage)
  - [End Users](#end-users)
  - [Template Designers](#template-designers)
  - [Plugin Developers](#plugin-developers)
  - [Cheatsheet](#cheatsheet)
- [Limitations](#limitations)
- [Troubleshooting](#troubleshooting)
- [License](#license)
- [Credits](#credits)

## Requirements

Fa\_XH is a plugin for CMSimple\_XH ≥ 1.7.0.
It requires PHP ≥ 5.3.0.

## Download

The [lastest release](https://github.com/cmb69/fa_xh/releases/latest)
is available for download on Github.

## Installation

The installation is done as with many other CMSimple\_XH plugins. See the
[CMSimple\_XH wiki](https://wiki.cmsimple-xh.org/doku.php/installation)
for further details.

1.  Backup the data on your server.
2.  Unzip the distribution on your computer.
3.  Upload the whole directory `fa/` to your server into
    the `plugins/` directory of CMSimple\_XH.
4.  Set write permissions for the subdirectories `config/`, `css/` and
    `languages/`.
5.  Navigate to `Plugins` → `Fa` in the back-end to check if all
    requirements are fulfilled.

## Settings

The configuration of the plugin is done as with many other
CMSimple\_XH plugins in the back-end of the website.
Select `Plugins` → `Fa`.

You can change the default settings of Fa\_XH under `Config`.
Hints for the options will be displayed
when hovering over the help icon with your mouse.

Localization is done under `Language`.
You can translate the character strings to your own language
if there is no appropriate language file available,
or customize them according to your needs.

The look of Fa\_XH can be customized under `Stylesheet`.

## Usage

#### End Users

If you want to use Font Awesome icons in the content,
simply enable the configuration option `Require` → `Auto`.

#### TinyMCE 4

You need a recent version of TinyMCE 4 to use the fontawesome plugin,
in which case TinyMCE 4 loads the plugin automatically, if the
`fontawesome` init is chosen in its configuration.

Use the new toolbar button `Font Awesome` to select and insert
the desired Font Awesome icon.

The fontawesome plugin for TinyMCE 4 supports only icons
marked up as `<span>`.
Icons inserted in the HTML source code view with
the more common `<i>` will be removed!

#### TinyMCE 5

You need a recent version of TinyMCE 5 to use the fontawesome plugin,
in which case TinyMCE 5 loads the plugin automatically, if the
chosen init supports it in its configuration.

Use `Tools` → `Font Awesome` to select and insert
the desired Font Awesome icon.

The fontawesome plugin for TinyMCE 5 supports only icons
marked up as `<span>`.
Icons inserted in the HTML source code view with
the more common `<i>` will be removed!

#### CKEditor

You need at least CKEditor 2.2 to use the fontawesome plugin,
in which case CKEditor loads the plugin automatically.

Use the toolbar button `Insert Font Awesome` to select,
manipulate and insert the desired Font Awesome icon.
Double-click an already inserted icon to edit it.

The fontawesome plugin for CKEditor supports only icons
marked up as `<span>`.
Icons inserted in the HTML source code view with
the more common `<i>` will be removed!

### Template Designers

If a template wants to use Font Awesome,
you should document that Fa\_XH has to be installed,
and you have to require Font Awesome early in the template
(that is before `<?php echo head()?>`:

````
<?php fa_require()?>
````

If you want to cater to users who do not read the documentation,
you can check whether the function is available,
and emit an error message otherwise:

````
<?php
if (function_exists('fa_require')) {
    fa_require();
} else {
    die('This template requires the Fa_XH plugin. See the documentation for details.');
}
?>
````

### Plugin Developers

If a plugins wants to use Font Awesome,
you should document that Fa\_XH has to be installed,
and you have to require Font Awesome
before you are going to actually use it.
Simply calling `fa_require()` is not guaranteed to work
when called from a plugin, as the function may not have been defined,
so you have to execute the `RequireCommand` directly:

````
<?php
$command = new Fa\RequireCommand;
$command->execute();
?>
````

If your plugin requires PHP 5.4.0 or higher anyway, you can shorten:

````
<?php (new Fa\RequireCommand)->execute()?>
````

To check whether Fa\_XH is installed:

````
<?php $fa_installed = class_exists('Fa\\RequireCommand')?>
````

### Cheatsheet

See [Font Awesome Cheatsheet](https://fontawesome.com/cheatsheet).

## Limitations

The TinyMCE 4 Font Awesome plugin requires a contempary browser;
IE ≤ 8 is not supported.

TinyMCE 4 has [a bug](https://github.com/tinymce/tinymce/issues/3175)
regarding block level elements which contain only other elements,
but no actual content.
So adding only a Font Awesome icon to an otherwise
empty paragraph would not retain the icon.
The TinyMCE 4 Font Awesome plugin has a workaround for this issue
(namely to also insert a non-breaking space),
but importing content from another editor
which does not implement this workaround,
is not catered to, so you may loose some icons.
It is recommended to stick with the same editor, anyway,
so you can ignore this issue.

## Troubleshooting
Report bugs and ask for support either on
[Github](https://github.com/cmb69/fa_xh/issues)
or in the [CMSimple_XH Forum](https://cmsimpleforum.com/).

## License

Fa\_XH is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Fa\_XH is distributed in the hope that it will be useful,
but *without any warranty*; without even the implied warranty of
*merchantibility* or *fitness for a particular purpose*. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Fa\_XH.  If not, see <https://www.gnu.org/licenses/>.

© 2017-2021 Christoph M. Becker

## Credits

This plugin is powered by [Font Awesome](https://fontawesome.com/)
by Dave Gandy.
Many thanks for making this great iconic font and CSS toolkit available under a
[GPL friendly license](https://github.com/FortAwesome/Font-Awesome/blob/master/LICENSE.txt).

This plugin contains an adapted version of the
[TinyMCE-FontAwesome-Plugin](https://github.com/josh18/TinyMCE-FontAwesome-Plugin)
by josh18.
Thanks for publishing this TinyMCE plugin under MIT license.

This plugin contains an updated version of the
[Font Awesome plugin for CKEditor](https://github.com/michaeljanea/font-awesome-ckeditor-plugin)
by Michael Janea.
Thanks for publishing this CKEDitor plugin under GPL.

Fa\_XH has been inspired by *frase*. Many thanks!

Many thanks to the community at the
[CMSimple\_XH forum](https://www.cmsimpleforum.com)
for tips, suggestions and testing.
Especially, I like to thank *lck* and *frase*
for early testing and feedback,
*manu* for helping with the TinyMCE 4 plugin,
and *Holger* for helping with the CKEditor plugin.

And last but not least many thanks to
[Peter Harteg](https://harteg.dk/), the “father” of CMSimple,
and all developers of [CMSimple\_XH](https://www.cmsimple-xh.org)
without whom this amazing CMS would not exist.
