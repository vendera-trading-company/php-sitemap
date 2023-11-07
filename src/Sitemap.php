<?php

namespace VenderaTradingCompany\PHPSitemap;

class Sitemap
{
    private string $content = '';

    /** Add a url to the sitemap */
    public function add(string | array $url, $priority = 0.3, $changefreq = 'weekly'): Sitemap
    {
        $content = '';
        if (is_array($url)) {
            foreach ($url as $value) {
                $content .= '  <url>' . PHP_EOL;
                $content .= '    <loc>' . $value . '</loc>' . PHP_EOL;
                $content .= '    <priority>' . $priority . '</priority>' . PHP_EOL;
                $content .= '    <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
                $content .= '  </url>' . PHP_EOL;
            }
        } else {
            $content .= '  <url>' . PHP_EOL;
            $content .= '    <loc>' . $url . '</loc>' . PHP_EOL;
            $content .= '    <priority>' . $priority . '</priority>' . PHP_EOL;
            $content .= '    <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
            $content .= '  </url>' . PHP_EOL;
        }

        $this->content .= $content;

        return $this;
    }

    /** Generate the sitemap */
    public function generate(): string
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        $sitemap .= $this->content;

        $sitemap .= '</urlset>';

        return $sitemap;
    }
}
