# ApkInfo
Android application package Information 
### Requirements

PHP 5.3+
PhpUnit 3.7+

### Installation

- Install [composer](http://getcomposer.org/download/)
- Create a composer.json into your project like the following sample:

```json
{
    ...
    "require": {
        "burakhan/php-apk-info": "dev-master"
    }
}
```
- Then from your `composer.json` folder: `php composer.phar update` or `composer update`

### Default Configuration

    array(
        'tmp_path' => sys_get_temp_dir(),
        'jar_path' => __DIR__ . '/bin/APKParser.jar',
        'lang_code' => 'en'
    )
    
### How to use

<?php
require 'vendor/autoload.php';

$configuration = array(
                         'tmp_path' => '/tmp',
                         'lang_code' => 'tr'
                     );
                     
$app = new \ApkInfo\Info(
    'your_apk_file',
    $configuration
);
    