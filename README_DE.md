# Fa\_XH

Fa\_XH stellt CMSimple\_XH Templates, Plugins und dem Content
[Font Awesome](https://fontawesome.com/) zur Verfügung.
Das Plugin wurde aus ähnlichen Gründen wie das
[jQuery4CMSimple](https://wiki.cmsimple-xh.org/doku.php/extend:jquery4cmsimple)
Plugin entwickelt,
nämlich um Konflikte zu vermeiden,
wenn Font Awesome von mehreren Komponenten verwendet wird.
Beispielsweise kann ein Template eine bestimmte Font Awesome Version enthalten,
aber ein Plugin eine andere.
Wenn alle Komponenten Fa\_XH nutzen, dann verwenden alle die gleiche Version.

Weiterhin liefert Fa\_XH Editor-Plugins aus,
um die Verwendung von Font Awesome Icons im Content zu vereinfachen,
wenn dies gewünscht wird.
Zur Zeit werden TinyMCE 4 und CKEditor unterstützt.

## Inhaltsverzeichnis

- [Voraussetzungen](#voraussetzungen)
- [Download](#download)
- [Installation](#installation)
- [Einstellungen](#einstellungen)
- [Verwendung](#verwendung)
  - [End-Anwender](#end-anwender)
  - [Template-Designer](#template-designer)
  - [Plugin-Entwickler](#plugin-entwickler)
  - [Spickzettel](#spickzettel)
- [Einschränkungen](#einschränkungen)
- [Fehlerbehebung](#fehlerbehebung)
- [Lizenz](#lizenz)
- [Danksagung](#danksagung)

## Voraussetzungen

Fa\_XH ist ein Plugin für CMSimple\_XH ≥ 1.7.0.
Es benötigt PHP ≥ 7.1.0.

## Download

Das [aktuelle Release](https://github.com/cmb69/fa_xh/releases/latest)
kann von Github herunter geladen werden.

## Installation

Die Installation erfolgt wie bei vielen anderen CMSimple\_XH-Plugins auch.
Im [CMSimple_XH Wiki](https://wiki.cmsimple-xh.org/doku.php/de:installation)
finden sie ausführliche Hinweise.

1.  Sichern Sie die Daten auf Ihrem Server.
2.  Entpacken Sie die ZIP-Datei auf Ihrem Computer.
3.  Laden Sie das gesamte Verzeichnis `fa/` auf Ihren Server in
    das `plugins/` Verzeichnis von CMSimple\_XH hoch.
4.  Vergeben Sie Schreibrechte für die Unterverzeichnisse `config/`, `css/`,
    und `languages/`.
5.  Navigieren Sie zu `Plugins` → `Fa` im Administrationsbereich,
    und prüfen Sie, ob alle Voraussetzungen für den Betrieb erfüllt sind.

## Einstellungen

Die Konfiguration des Plugins erfolgt wie bei vielen anderen
CMSimple_XH-Plugins auch im Administrationsbereich der Website.
Wählen Sie `Plugins` → `Fa`.

Sie können die Original-Einstellungen von Fa\_XH unter `Konfiguration` ändern.
Beim Überfahren der Hilfe-Icons mit der Maus
werden Hinweise zu den Einstellungen angezeigt.

Die Lokalisierung wird unter `Sprache` vorgenommen.
Sie können die Zeichenketten in Ihre eigene Sprache übersetzen,
falls keine entsprechende Sprachdatei zur Verfügung steht,
oder sie entsprechend Ihren Anforderungen anpassen.

Das Aussehen von Fa\_XH kann unter `Stylesheet` angepasst werden.

## Verwendung

### End-Anwender

Wollen Sie Font Awesome Icons im Content verwenden,
dann aktivieren Sie einfach die Konfigurationsoption `Require` → `Auto`.

#### TinyMCE 4

Sie benötigen eine aktuelle Version des TinyMCE 4 Plugins
um das fontawesome Plugin verwenden zu können;
dieses wird dann automatisch vom TinyMCE 4 geladen,
falls das `fontawesome` init in dessen Konfiguration gewählt ist.

Verwenden Sie den Toolbar-Schalter `Font Awesome`,
um das gewünschte Font Awesome Icon auszuwählen und einzufügen.

Das fontawesome Plugin für TinyMCE 4 unterstützt nur Icons,
die als `<span>` ausgezeichnet sind.
Icons, die in der HTML Quellcodeansicht mit dem üblicheren
`<i>` eingefügt werden, werden entfernt!

#### TinyMCE 5

Sie benötigen eine aktuelle Version des TinyMCE 5 Plugins
um das fontawesome Plugin verwenden zu können;
dieses wird dann automatisch vom TinyMCE 5 geladen,
falls das gewählte init dies unterstützt.

Verwenden Sie `Tools` → `Font Awesome`,
um das gewünschte Font Awesome Icon auszuwählen und einzufügen.

Das fontawesome Plugin für TinyMCE 5 unterstützt nur Icons,
die als `<span>` ausgezeichnet sind.
Icons, die in der HTML Quellcodeansicht mit dem üblicheren
`<i>` eingefügt werden, werden entfernt!

#### CKEditor

Sie benötigen zumindest CKEditor 2.2
um das fontawesome Plugin verwenden zu können;
dieses wird dann automatisch vom CKEditor geladen.

Verwenden Sie den Toolbar-Schalter `Font Awesome einfügen`,
um das gewünschte Font Awesome Icon auszuwählen,
zu manipulieren und einzufügen.
Klicken Sie doppelt auf ein bereits eingefügtes Icon, um es zu bearbeiten.

Das fontawesome Plugin für CKEditor unterstützt nur Icons,
die als `<span>` ausgezeichnet sind.
Icons, die in der HTML Quellcodeansicht mit dem üblicheren
`<i>` eingefügt werden, werden entfernt!

### Template-Designer

Wenn ein Template Font Awesome verwendet,
sollten Sie dokumentieren, dass Fa\_XH installiert sein muss,
und Sie müssen Font Awesome früh im Template
(das heißt vor `<?php echo head()?>`) erfodern.

````
<?php fa_require()?>
````

Wollen Sie es Anwendern, die die Dokumentation nicht lesen,
einfacher machen, dann können Sie prüfen, ob diese Funktion verfügbar ist,
und andernfalls eine Fehlermeldung ausgeben:

````
<?php
if (function_exists('fa_require')) {
    fa_require();
} else {
    die('Dieses Template benötigt das Fa_XH Plugin. In der Dokumentation finden Sie Details.');
}
?>
````

### Plugin-Entwickler

Wenn ein Plugin Font Awesome verwendet,
sollten Sie dokumentieren, dass Fa\_XH installiert sein muss,
und Sie müssen Font Awesome erfordern
bevor Sie es tatsächlich verwenden.
Es ist nicht garantiert,
das der Aufruf von `fa_require()` funktioniert,
wenn er von einem anderen Plugin aus erfolgt,
da die Funktion unter Umständen noch nicht definiert wurde,
so dass sie das `RequireCommand` direkt ausführen sollten:

````
<?php
$command = new Fa\RequireCommand;
$command->execute();
?>
````

Erfodert Ihr Plugin ohnehin PHP 5.4.0 oder höher,
können Sie kürzer schreiben:

````
<?php (new Fa\RequireCommand)->execute()?>
````

Um zu prüfen, ob Fa\_XH installiert ist:

````
<?php $fa_installed = class_exists('Fa\\RequireCommand')?>

````

### Spickzettel

Siehe [Font Awesome Spickzettel](https://fontawesome.com/cheatsheet).

## Einschränkungen

Das Font Aweseome Plugin für TinyMCE 4 benötigt einen zeitgemäßen Browser;
IE ≤ 8 wird nicht unterstützt.

TinyMCE 4 hat [einen Fehler](https://github.com/tinymce/tinymce/issues/3175)
bezüglich Block-Level-Elementen, die nur andere Elemente,
aber keinen wirklichen Content enthalten.
Also wird beim Einfügen eines Font Awesome Icons
in einen ansonsten leeren Absatz das Icon nicht erhalten.
Das TinyMCE 4 Font Awesome Plugin enthält einen Workaround dafür
(nämlich, dass zusätzlich ein geschütztes Leerzeichen eingefügt wird),
aber das Verwenden von Inhalten, die durch andere Editoren erstellt wurden,
die diesen Workaround nicht implementieren,
wird hier nicht besonders berücksichtigt.
Es wird grundsätzlich empfohlen beim einmal gewählten Editor zu bleiben,
so dass dieses Problem ignoriert werden kann.

## Fehlerbehebung

Melden Sie Programmfehler und stellen Sie Supportanfragen entweder auf
[Github](https://github.com/cmb69/fa_xh/issues)
oder im [CMSimple_XH Forum](https://cmsimpleforum.com/).

## Lizenz

Fa\_XH ist freie Software. Sie können es unter den Bedingungen
der GNU General Public License, wie von der Free Software Foundation
veröffentlicht, weitergeben und/oder modifizieren, entweder gemäß
Version 3 der Lizenz oder (nach Ihrer Option) jeder späteren Version.

Die Veröffentlichung von Fa\_XH erfolgt in der Hoffnung, daß es
Ihnen von Nutzen sein wird, aber *ohne irgendeine Garantie*, sogar ohne
die implizite Garantie der *Marktreife* oder der *Verwendbarkeit für einen
bestimmten Zweck*. Details finden Sie in der GNU General Public License.

Sie sollten ein Exemplar der GNU General Public License zusammen mit
Fa\_XH erhalten haben. Falls nicht, siehe
<https://www.gnu.org/licenses/>.


© 2017-2021 Christoph M. Becker

## Danksagung

Dieses Plugin läuft mit [Font Awesome](https://fontawesome.com/) von Dave Gandy.
Vielen Dank für die Veröffentlichung dieses großartigen
Icon-Font- und CSS-Toolkits unter einer
[GPL freundlichen Lizenz](https://github.com/FortAwesome/Font-Awesome/blob/master/LICENSE.txt).

Dieses Plugin enthält eine angepasste Version des
[TinyMCE-FontAwesome-Plugins](https://github.com/josh18/TinyMCE-FontAwesome-Plugin)
von josh18.
Danke für die Veröffentlichung dieses TinyMCE Plugins unter MIT-Lizenz.

Dieses Plugin enthält eine aktualisierte Version des
[Font Awesome Plugins für CKEditor](https://github.com/michaeljanea/font-awesome-ckeditor-plugin)
von Michael Janea.
Danke für die Veröffentlichung unter GPL.

Fa\_XH wurde von *frase* angeregt. Vielen Dank!

Vielen Dank an die Gemeinschaft im
[CMSimple\_XH-Forum](https://www.cmsimpleforum.com/)
für Tipps, Anregungen und das Testen.
Besonders möchte ich *lck* und *frase* für frühes Testen und Feedback danken,
*manu* für Hilfe bei dem TinyMCE 4 Plugin,
und *Holger* für Hilfe bei dem CKEditor Plugin.

Zu guter Letzt vielen Dank an
[Peter Harteg](https://harteg.dk/), den „Vater“ von CMSimple,
und allen Entwicklern von [CMSimple\_XH](https://www.cmsimple-xh.org/),
ohne die dieses fantastische CMS nicht existieren würde.
