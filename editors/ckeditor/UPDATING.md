Updating Font Awesome
=====================

* Grab `icons.yml` from the `src/` folder of [Font Awesome's Github
  repository](https://github.com/FortAwesome/Font-Awesome/).

* Convert the YAML to JSON, for instance on [this
  website](http://codebeautify.org/yaml-to-json-xml-csv).

* Put the JSON into `fa-in.json`.

* Run `php convert.php`.

* Replace the existing definition of `icons` in `dialogs/fontawesome.js` with
  the JSON in `fa-out.json`.
