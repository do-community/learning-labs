<?php

namespace App\Parser;

use Minicli\Minicache\FileCache;
use Parsed\CustomTagParserInterface;

class TutorialTagParser implements CustomTagParserInterface
{
    public function parse($tag_value, array $params = [])
    {
        $cache = new FileCache(__DIR__ . '/../../var/cache', 180);
        $cache_id = "cached-" . $tag_value;

        $cached_embed = $cache->getCached($cache_id);

        if ($cached_embed !== null) {
            return $cached_embed;
        }

        $tutorial_url = "https://www.digitalocean.com/community/tutorials/" . $tag_value;
        $tags = get_meta_tags($tutorial_url);

        $title = $tags['twitter:title'];
        $description = $tags['twitter:description'];
        $image = $tags['twitter:image'];

        $embed = '<div class="grid md:grid-cols-4 rounded-md shadow-sm bg-gray-200 my-5 px-4 gap-4">' .
            '<div class="">' .
              '<a href="'. $tutorial_url . '"><img src="' . $image . '" alt="' . $title . '"></a>' .
            '</div>' .
            '<div class="md:col-span-3">' .
              '<p><span class="font-bold">' . $title . '</span><br>' .
              '<span class="text-sm">' . $description . '...</span>' .
              ' [<a href="' . $tutorial_url . '">read the full article</a>]</p>' .
            '</div>'.
            '</div>';

        $cache->save($embed, $cache_id);
        return $embed;
    }
}