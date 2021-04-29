# DevEd LearningLabs
LearningLabs is an experimental project created for Shark-a-Hack 2021-q1, the internal hackaton from DigitalOcean.
This is a space for experimentation in alternative ways to present educational content we have in our community website.

![Screenshot from 2021-04-29 15-14-19](https://user-images.githubusercontent.com/293241/116556419-b57d1d80-a8fd-11eb-9465-81d8af0ccfc2.png)

LearningLabs is built with [Librarian](https://github.com/librarianphp/librarian).

## Installation
To run LearningLabs locally, you'll need a development environment with the following:

- PHP 7.4+ (cli only)
- [Composer](https://getcomposer.org)

This can be accomplished with the Docker setup that is included in the repository. In this case, you'll need to have Docker and Docker Compose installed locally.

Start by cloning this repository:

```shell
git clone https://github.com/do-community/learning-labs
cd learning-labs
```

If you are running LearningLabs with Docker, you should get your environment up and running now with:

```shell
docker-compose up -d
```
Then run `composer install` to install the PHP dependencies. 

### With Docker Compose
```command
docker-compose exec app composer install
```

Then you can access the application from your browser at `localhost:8000`.

### With a local PHP server
```command
composer install
```
Then, you can run the built-in PHP web server with:

```shell
php -S 0.0.0.0:8000 -t web/
```

You can now access the application from your browser at `localhost:8000`.

### Customizing Layouts

To customize the views, you'll need to be able to compile CSS assets and that requires `npm` running on your development environment. Otherwise you won't have access to all that Tailwind has to offer!

To install Tailwind dependencies, run:

```shell
npm install
```
To compile the CSS assets (needed when you make significant changes to the layout), run:

```shell
npm run dev
```

## Creating Content
Content uses overall the same format of DEV.to posts, but the front matter is fluid and can be customized for your needs.

### Liquid Tags Currently Supported:

- **DigitalOcean Tutorial (custom tag):**
  - {% tutorial how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04 %}
- **Local Audio:** 
  - {% audio /audio/test_cafe.mp3 %}
- **Local Video:**
  - {% video /video/test.mp4 %}
- **Tweet:**
  - {% twitter 1387740559385767941 %}
- **GitHub File:**
  - {% github https://github.com/librarianphp/librarian/blob/main/web/.htaccess %}
- **YouTube Video:**
  - {% youtube iom_nhYQIYk %}

## Creating Custom Liquid Tags

Liquid tags are classes that implement the `CustomTagParserInterface`. They need to implement a method named `parse`, which receives the string provided to the liquid tag when called from the markdown file.
For instance, this is the full code for the `video` liquid tag parser class:

```php
<?php
#src/CustomTagParser/VideoTagParser.php

namespace Parsed\CustomTagParser;

use Parsed\CustomTagParserInterface;

class VideoTagParser implements CustomTagParserInterface
{
    public function parse($tag_value, array $params = [])
    {
        return "<video controls>" .
         "<source src=\"$tag_value\" type=\"video/mp4\">" .
         "Your browser does not support the video tag." .
         "</video>";
    }
}
```

You'll have to include your custom tag parser class within the ContentParser:

```php
$parser = new \Parsed\ContentParser();
$parser->addCustomTagParser('video', new VideoTagParser());
```
_Note: The built-in tag parsers are already registered within ContentParser. These are: `video`, `audio`, `twitter`, `youtube` and `github`._


For instance, if you have in your markdown:

```
{% video /videos/test.mp4 %}
```

It will convert to the tag into the following code:

```html
<video controls>
   <source src="/videos/test.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
```

### About Librarian
[Librarian](https://github.com/librarianphp/librarian) is a stateless CMS / document indexer based on static markdown files.

* No database
* No sessions
* No users


