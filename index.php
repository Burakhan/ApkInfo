<?php
/**
 * User: burakhan
 * Date: 04.05.2015
 * Time: 14:50
 */

include "vendor/autoload.php";

$a = new ApkInfo\Info('./Test/apk/android.apk');

$perm = $a->getManifest()->getPermissions();

var_dump($perm);