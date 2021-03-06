# MvcCore - Example - Console Application

[![Latest Stable Version](https://img.shields.io/badge/Stable-v4.2.0-brightgreen.svg?style=plastic)](https://github.com/mvccore/example-cdcol/releases)
[![License](https://img.shields.io/badge/Licence-BSD-brightgreen.svg?style=plastic)](https://github.com/mvccore/example-cdcol/blob/master/LICENCE.md)
[![Packager Build](https://img.shields.io/badge/Packager%20Build-passing-brightgreen.svg?style=plastic)](https://github.com/mvccore/packager)
![PHP Version](https://img.shields.io/badge/PHP->=5.3-brightgreen.svg?style=plastic)

- [**MvcCore**](https://github.com/mvccore/mvccore) console application example
- **Result** is **completly portable** - `./release/index.php`
- Result application **currently packed in strict package mode**, all packing configurations included in `./.packager/`
- Packed with [**Packager library - mvccore/packager**](https://github.com/mvccore/packager)), all packing ways possible:
  - **PHAR file**
    - standard PHAR package with whole devel dir content
  - **PHP file**
    - **strict package**
      - everything is contained in result `index.php`
      - only `.htaccess` or `web.config` are necessary to use mod_rewrite
    - **preserve package**
      - result `index.php` file contains PHP files, 
        PHTML templates but no CSS/JS/fonts or images
      - all wrapped file system functions are looking inside 
        package first, then they try to read data from HDD
    - **preserve hdd**
      - result `index.php` file contains PHP files, 
        PHTML templates but no CSS/JS/fonts or images
      - all wrapped file system functions are looking on HDD first, 
        then they try to read data from package inself
    - **strict hdd**
      - result `index.php` file contains only PHP files, 
        but PHTML templates, all CSS/JS/fonts and images are on HDD
      - no PHP file system function is wrapped

## Instalation
```shell
# load example
composer create-project mvccore/example-console

# go to project development dir
cd example-console/development

# update dependencies for app development sources
composer update
```

## Build

### 1. Prepare application
- go to `example-console/development`
- change `$app->Run();` to `$app->Run(1);` in `./index.php`
- run build process

### 2. Build

#### Linux:
```shell
# go to project root dir
cd example-console
# run build process into single PHP file
sh make.sh
```

#### Windows:
```shell
# go to project root dir
cd example-console
# run build process into single PHP file
make.cmd
```