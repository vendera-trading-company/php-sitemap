<?php

namespace VenderaTradingCompany\PHPSitemap;

class SitemapIndex
{
    private string $content = '';

    public function add($url): SitemapIndex
    {
        $content = '  <sitemap>' . PHP_EOL;
        $content .= '    <loc>' . $url . '</loc>' . PHP_EOL;
        $content .= '  </sitemap>' . PHP_EOL;

        $this->content .= $content;

        return $this;
    }

    public function generate(): string
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        $sitemap .= $this->content;

        $sitemap .= '</sitemapindex>' . PHP_EOL;

        return $sitemap;
    }
}
