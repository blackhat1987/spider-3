<?php
namespace Slince\Spider\Tests\Asset;

use Slince\Spider\Asset\Asset;
use Slince\Spider\Uri;

class AssetTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $url = new Uri('http://www.domain.com/');
        $asset = new Asset($url, 'Page Content', 'text/html');
        $this->assertEquals($url, $asset->getUrl());
        $this->assertEquals('Page Content', $asset->getContent());
        $this->assertEquals('text/html', $asset->getContentType());
    }
}