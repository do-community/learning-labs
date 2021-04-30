<?php

namespace App\Command\Web;

use Librarian\Provider\TwigServiceProvider;
use Librarian\Response;
use Librarian\Provider\ContentServiceProvider;
use Librarian\WebController;
use Parsed\Content;
use Parsed\ContentParser;

class SlideController extends WebController
{
    /**
     * @throws \Exception
     */
    public function handle()
    {
        /** @var TwigServiceProvider $twig */
        $twig = $this->getApp()->twig;

        $request = $this->getRequest();

        if (!$request->getSlug()) {
            Response::redirect('/notfound');
        }

        $slides_dir = __DIR__ . '/../../Resources/slides';
        $slide = $request->getSlug();

        if (!is_dir($slides_dir . '/' . $slide)) {
            echo "Guide not found: " . $slides_dir . '/' . $slide;
            return;
        }

        $page = 0;
        $params = $this->getRequest()->getParams();
        if (key_exists('page', $params)) {
            $page = $params['page'];
        }

        $pages = [];
        foreach (glob($slides_dir . '/' . $slide . '/*.md') as $slide_page) {
            $pages[] = basename($slide_page);
        }

        $content = new Content(file_get_contents($slides_dir . '/' . $slide . '/' . $page .'.md'));
        $content->parse(new ContentParser(), true);

        $response = new Response($twig->render('content/slide.html.twig', [
            'content' => $content,
            'pages' => $pages,
            'total_pages' => count($pages) - 1,
            'current_page' => $page,
        ]));

        $response->output();
    }
}