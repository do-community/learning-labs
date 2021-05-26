<?php


namespace App\Parser;

use League\CommonMark\Block\Element\Paragraph;
use Minicli\Curly\Client;
use Parsed\CustomTagParserInterface;

class UserTagParser implements CustomTagParserInterface
{
    public function parse($tag_value, array $params = [])
    {
        $profile_url = "https://www.digitalocean.com/community/users/" . $tag_value;

        return 'by <a href="' . $profile_url . '" title="Visit ' . $tag_value . '\'s profile on DigitalOcean Community">@'. $tag_value . '</a>';
    }
}