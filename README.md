# Bacon Ipsum Plugin for [Flextype](http://flextype.org/)
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
![Flextype](https://img.shields.io/badge/Flextype-0.x-green.svg?style=flat-square "Flextype Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-plugins/bacon-ipsum/blob/master/LICENSE.txt)

![BaconIpsum](bacon-ipsum.jpg)

The Bacon Ipsum plugin for [Flextype](https://github.com/flextype/flextype) will generate you steaming piles of glorious [bacon ipsum](http://baconipsum.com/).

## Installation
1. Unzip plugin to the folder `/site/plugins/`
2. Go to `/site/config/site.yml` and add plugin name to plugins section.
3. Save your changes.

Example:
```yaml
...
plugins:
  - bacon-ipsum
```

## Usage in page content

Simple usage

```
[bacon]
```

Set how many paragraphs of bacon ipsum to generate.

```
[bacon p=5]
```

Set type of bacon ipsum to generate.

```
[bacon p=5 type="meat-and-filler"]
```

Start the first paragraph with ‘Bacon ipsum dolor sit amet’

```
[bacon p=5 type="meat-and-filler" start_with_lorem=1]
```

Set number of sentences to generate.

```
[bacon sentences=3]
```

Set format to return.

```
[bacon format="json"]
```

## Usage in template

Simple usage

```php
<?php echo Flextype\bacon(); ?>
```

Usage with options

```php
<?php echo Flextype\bacon('meat-and-filler', 5, 1, 3, 'json'); ?>
```

## Settings

```yaml
enabled: true # or `false` to disable the plugin
type: all-meat # for meat only or `meat-and-filler` for meat mixed with miscellaneous ‘lorem ipsum’ filler.
p: 5 # optional number of paragraphs, defaults to `5`.
sentences: 0 # number of sentences (this overrides paragraphs)
start_with_lorem: 1 # optional pass `1` to start the first paragraph with ‘Bacon ipsum dolor sit amet’.
format: text # Format `text` (default), json, or ‘html’
```

## License
See [LICENSE](https://github.com/fansoro/fansoro-plugin-bacon-ipsum/blob/master/LICENSE)
