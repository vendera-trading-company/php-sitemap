<?php

namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use VenderaTradingCompany\PHPSitemap\ChangeFrequency;
use VenderaTradingCompany\PHPSitemap\Sitemap;

class SitemapTest extends TestCase
{
    public function testSitemapContainsUrl()
    {
        $sitemap = new Sitemap();

        $url = 'https://127.0.0.1/test/url';

        $sitemap->add($url);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url, $result);
    }

    public function testSitemapContainsPriority()
    {
        $sitemap = new Sitemap();

        $url = 'https://127.0.0.1/test/url';
        $priority = 0.1;

        $sitemap->add($url, $priority);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url, $result);
        $this->assertStringContainsString($priority, $result);
    }

    public function testSitemapContainsChangeFrequency()
    {
        $sitemap = new Sitemap();

        $url = 'https://127.0.0.1/test/url';
        $priority = 0.1;
        $changefrequency = ChangeFrequency::Daily;

        $sitemap->add($url, $priority, $changefrequency);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url, $result);
        $this->assertStringContainsString($priority, $result);
        $this->assertStringContainsString($changefrequency->value, $result);
    }

    public function testSitemapContainsMultipleUrl()
    {
        $sitemap = new Sitemap();

        $url = [
            'https://127.0.0.1/test/url',
            'https://127.0.0.1/test/url1',
            'https://127.0.0.1/test/url2'
        ];

        $sitemap->add($url);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url[0], $result);
        $this->assertStringContainsString($url[1], $result);
        $this->assertStringContainsString($url[2], $result);
    }

    public function testSitemapContainsMultipleUrlWithPriority()
    {
        $sitemap = new Sitemap();

        $url = [
            'https://127.0.0.1/test/url',
            'https://127.0.0.1/test/url1',
            'https://127.0.0.1/test/url2'
        ];

        $priority = 0.1;

        $sitemap->add($url, $priority);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url[0], $result);
        $this->assertStringContainsString($url[1], $result);
        $this->assertStringContainsString($url[2], $result);

        $this->assertStringContainsString($priority, $result);
    }

    public function testSitemapContainsMultipleUrlWithChangeFrequency()
    {
        $sitemap = new Sitemap();

        $url = [
            'https://127.0.0.1/test/url',
            'https://127.0.0.1/test/url1',
            'https://127.0.0.1/test/url2'
        ];

        $priority = 0.1;

        $changefrequency = ChangeFrequency::Daily;

        $sitemap->add($url, $priority, $changefrequency);

        $result = $sitemap->generate();

        $this->assertStringContainsString($url[0], $result);
        $this->assertStringContainsString($url[1], $result);
        $this->assertStringContainsString($url[2], $result);

        $this->assertStringContainsString($priority, $result);

        $this->assertStringContainsString($changefrequency->value, $result);
    }
}
