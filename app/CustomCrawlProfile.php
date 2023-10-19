<?php

namespace App;

use Spatie\Crawler\CrawlAllUrls;
use Psr\Http\Message\UriInterface;

class CustomCrawlProfile extends CrawlAllUrls
{
    /**
     * Determine if the given URL should be crawled.
     *
     * @param  UriInterface  $url
     * @return bool
     */
    public function shouldCrawl(UriInterface $url): bool
    {
        // Отримуємо шлях URL-адреси
        $path = $url->getPath();

        // Перевіряємо, чи містить шлях підстроку '/storage/pages'
        if (strpos($path, '/storage/pages') !== false || strpos($url, 'www.facebook.com') !== false) {
            return false; // Повертаємо false, щоб не краулити цей URL
        }

        // Викликаємо базовий метод для інших URL-адрес, які не підпадають під нашу умову
        return parent::shouldCrawl($url);
    }
}
