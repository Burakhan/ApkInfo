<?php
/**
 * User: burakhan
 * Date: 27.04.2015
 * Time: 00:03
 */

namespace ApkInfo;


class Config
{
    public $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = array_merge(array(
            'tmp_path' => sys_get_temp_dir(),
            /**
             * APK Parser Jar Address
             * https://xml-apk-parser.googlecode.com/
             */
            'jar_path' => __DIR__ . '/bin/APKParser.jar',

            'lang_code' => 'en'
        ), $config);

        return $this->config;
    }
    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->config[$key];
    }
}