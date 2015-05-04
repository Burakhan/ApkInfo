<?php
/**
 * User: burakhan
 * Date: 26.04.2015
 * Time: 21:13
 */



use ApkInfo\Info;

class ApkInfoTest extends PHPUnit_Framework_TestCase
{

    public $info;

    public function setUp()
    {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'apk' . DIRECTORY_SEPARATOR . 'android.apk';
        $this->info = new Info($file);
    }

    public function testSanity()
    {
        $this->assertTrue(true);
    }

    public function testPermissions()
    {
        $manifest = $this->info->getManifest();

        $permissions = $manifest->getPermissions();
        $this->assertEquals(count($permissions), 14);
        $this->assertArrayHasKey('INTERNET', $permissions);
        $this->assertArrayHasKey('ACCESS_NETWORK_STATE', $permissions);
        $this->assertArrayHasKey('CHANGE_NETWORK_STATE', $permissions);
        $this->assertArrayHasKey('ACCESS_WIFI_STATE', $permissions);
        $this->assertArrayHasKey('WRITE_EXTERNAL_STORAGE', $permissions);
        $this->assertArrayHasKey('RECEIVE_BOOT_COMPLETED', $permissions);
        $this->assertArrayHasKey('MANAGE_DOCUMENTS', $permissions);
        $this->assertArrayHasKey('GET_ACCOUNTS', $permissions);
        $this->assertArrayHasKey('MANAGE_ACCOUNTS', $permissions);
        $this->assertArrayHasKey('USE_CREDENTIALS', $permissions);
        $this->assertArrayHasKey('WAKE_LOCK', $permissions);
        $this->assertArrayHasKey('NFC', $permissions);
        $this->assertArrayHasKey('CAMERA', $permissions);
        $this->assertArrayHasKey('VIBRATE', $permissions);

    }

    public function testVersion()
    {
        $this->assertEquals($this->info->getManifest()->getVersionName(),'10.12.53');
        $this->assertEquals($this->info->getManifest()->getVersionCode(),'101253134');

    }

    public function testPackageName()
    {
        $this->assertEquals($this->info->getManifest()->getPackageName(),'com.google.android.youtube');
    }

    public function testMinSdkVersion()
    {
        $this->assertEquals($this->info->getManifest()->getMinSdkVersion(),'15');
    }

    public function testTargetSdkVersion()
    {
        $this->assertEquals($this->info->getManifest()->getTargetSdkVersion(),'21');
    }

}