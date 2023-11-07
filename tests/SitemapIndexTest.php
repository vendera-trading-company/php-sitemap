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
}