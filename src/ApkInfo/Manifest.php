<?php
/**
 * User: burakhan
 * Date: 26.04.2015
 * Time: 23:56
 */

namespace ApkInfo;


class Manifest {

    protected $manifestFile;

    protected static $AndroidXMLNamespace = 'http://schemas.android.com/apk/res/android';

    protected $lang;

    public function __construct($manifestFile,$lang)
    {
        $this->manifestFile = simplexml_load_file($manifestFile);
        $this->manifestFile->attributes('http://schemas.android.com/apk/res/android');
        $this->lang = $lang;
    }

    public function getPermissions()
    {
        $permission = array();

        foreach($this->manifestFile->{'uses-permission'} as $perm)
        {

            $attr = $perm->attributes('http://schemas.android.com/apk/res/android');

            $permissionName = end(explode('.',$attr['name']));

            if(array_key_exists($permissionName,$this->lang->permissions))
            {
                $permission[$permissionName] = $this->lang->permissions[$permissionName];
            }
            else
            {
                // @TODO Application private permission
                //$permission[$permissionName] = $attr['name'];
            }


        }
        return $permission;
    }

    public function getVersionName()
    {
        return end($this->manifestFile->xpath('/manifest/@android:versionName'))->versionName;
    }

    public function getVersionCode()
    {
        return end($this->manifestFile->xpath('/manifest/@android:versionCode'))->versionCode;
    }

    public function getPackageName()
    {
        return $this->manifestFile['package'];
    }

    private function getSdk()
    {

        $sdk = $this->manifestFile->{'uses-sdk'};
        $sdkAttr = $sdk->attributes('http://schemas.android.com/apk/res/android');
        return $sdkAttr;
    }

    public function getMinSdkVersion()
    {
        $attr = $this->getSdk();
        return $attr['minSdkVersion'];
    }

    public function getTargetSdkVersion()
    {
        $attr = $this->getSdk();
        return $attr['targetSdkVersion'];
    }



}