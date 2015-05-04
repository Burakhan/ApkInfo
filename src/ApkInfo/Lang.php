<?php
/**
 * User: burakhan
 * Date: 28.04.2015
 * Time: 11:54
 */

namespace ApkInfo;


class Lang {

    protected $langCode;

    protected $lang;

    public function __construct($code)
    {
        if(!$code)
        {
            throw new \Exception('Dil kodu belirtilmemiş');
        }
        if($code instanceof Config)
        {
           $this->langCode = $code->config['lang_code'];
        }

        self::loadLangFile();

    }

    public function setLang($code)
    {
        $this->langCode = $code;
    }

    public function getLang()
    {
        return $this->langCode;
    }

    private function loadLangFile()
    {
        $dir = dirname(__FILE__).'/lang/';

        $langFile = $dir.sprintf('%s_lang.php',$this->langCode);

        try
        {
            if(file_exists($langFile))
            {
                $this->lang = include $langFile;
            }
        } catch (\Exception $e)
        {
            echo 'hataaaa';
        }

    }

    public function __get($lang)
    {
        if(array_key_exists($lang,$this->lang))
        {
            return $this->lang[$lang];
        }
        throw new \Exception('Nothing');

    }
}