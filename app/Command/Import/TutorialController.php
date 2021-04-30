<?php


namespace App\Command\Import;

use Librarian\Exception\ApiException;
use Librarian\Provider\DevtoServiceProvider;
use Minicli\Command\CommandController;
use Parsed\Content;

class TutorialController extends CommandController
{
    public function handle()
    {
        $args = $this->getArgs();
        $tutorial_slug = $args[3] ?? null;
        if ($tutorial_slug === null) {
            $this->getPrinter()->error("You must provide the slug of the tutorial.");
            return 1;
        }

        $slides_dir = __DIR__ . '/../../Resources/slides';
        $import_dir = __DIR__ . '/../../../var/import';
        $import_file = $import_dir . '/' . $tutorial_slug;

        if (!is_file($import_file . '.md')) {
            $this->getPrinter()->error("Tutorial $import_file.md not found.");
            return 1;
        }

        $this->getPrinter()->info("Starting import... this might take a few minutes.");

        $content = file_get_contents($import_file . '.md');
        $steps = preg_split('/## Step /', $content, -1, PREG_SPLIT_NO_EMPTY);

        $tutorial_dir = $slides_dir . '/' . $tutorial_slug;
        if (!is_dir($tutorial_dir)) {
            mkdir($tutorial_dir);
        }

        foreach ($steps as $step => $procedure) {
            //save into .md per step
            $content = new Content();
            $content->frontMatterSet('tutorial', $tutorial_slug);
            $procedure = str_replace('### Introduction', 'Introduction', $procedure);
            $content->body_markdown = '## ' . $procedure;
            $content->updateRaw();

            file_put_contents($tutorial_dir . '/' . $step . '.md', $content->raw);
        }

        $this->getPrinter()->success("Import Finished.");
        return 0;
    }
}
