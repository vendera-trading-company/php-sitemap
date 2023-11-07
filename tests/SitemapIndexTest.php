<?php

namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use VenderaTradingCompany\PHPSitemap\SitemapIndex;

class SitemapIndexTest extends TestCase
{
    public function testSitemapIndexContainsUrl()
    {
        $sitemapIndex = new SitemapIndex();

        $url = 'https://127.0.0.1/test/url';

        $sitemapIndex->add($url);

        $result = $sitemapIndex->generate();

        $this->assertStringContainsString($url, $result);
    }


    public function testSitemapIndexContainsMultipleUrl()
    {
        $sitemapIndex = new SitemapIndex();

        $url = [
            'https://127.0.0.1/test/url',
            'https://127.0.0.1/test/url1',
            'https://127.0.0.1/test/url2'
        ];

        $sitemapIndex->add($url);

        $result = $sitemapIndex->generate();

        $this->assertStringContainsString($url[0], $result);
        $this->assertStringContainsString($url[1], $result);
        $this->assertStringContainsString($url[2], $result);
    }
}
