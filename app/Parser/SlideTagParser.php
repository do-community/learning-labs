<?php


namespace App\Parser;

use League\CommonMark\Block\Element\Paragraph;
use Minicli\Curly\Client;
use Parsed\CustomTagParserInterface;

class SlideTagParser implements CustomTagParserInterface
{
    public function parse($tag_value, array $params = [])
    {
        $embed_url = "/slide/" . $tag_value;

        return '<iframe src="' . $embed_url . '" width="100%" height="600"></iframe>';
    }
}