<?php

namespace App\Command\Web;

use Librarian\Provider\TwigServiceProvider;
use Librarian\WebController;
use Librarian\Response;
use Librarian\Provider\ContentServiceProvider;

class IndexController extends WebController
{
    public function handle()
    {
        /** @var TwigServiceProvider $twig */
        $twig = $this->getApp()->twig;

        $page = 1;
        $limit = $this->getApp()->config->posts_per_page ?: 10;
        $params = $this->getRequest()->getParams();

        if (key_exists('page', $params)) {
            $page = $params['page'];
        }

        $start = ($page * $limit) - $limit;

        /** @var ContentServiceProvider $content_provider */
        $content_provider = $this->getApp()->content;

        $response = new Response($twig->render('content/index.html.twig', [
            'glossary_items' => $content_provider->fetchFrom('glossary', 0, 2, false, 'rand'),
            'guides' => $content_provider->fetchFrom('guided_learning', 0, 2, false, 'rand'),
            'quickstarts' => $content_provider->fetchFrom('quickstarts', 0, 2, false, 'rand'),
        ]));

        $response->output();
    }
}
