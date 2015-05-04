<?php
/**
 * User: burakhan
 * Date: 26.04.2015
 * Time: 21:15
 */
namespace ApkInfo;

class Info {

    public $manifest;

    protected $config;

    protected $apkfile;


    public function __construct($apkfile = null, array $config = array())
    {
        if(!$apkfile)
        {
            throw new \Exception('Nothing apk file.');

        }

        $this->apkfile = $apkfile;
        $this->config = new Config($config);
        $this->lang = new Lang($this->config);
    }

    public function getManifest()
    {
        if(!$this->manifest)
        {
            $this->setManifest();
        }

        return $this->manifest;
    }

    public function setManifest()
    {
        $tmp = $this->config->get('tmp_path');
        $jar = $this->config->get('jar_path');
        $tmpfile = $tmp.'/'.md5(rand(1111,9999).time()).'.xml';
        $command = sprintf('java -jar %s %s >  %s',$jar,$this->apkfile,$tmpfile);
        shell_exec($command);
        $this->manifest = new Manifest($tmpfile,$this->lang);
    }


}