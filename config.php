<?php

/**
 * Librarian Main Configuration
 */

return [
    #########################################################################################
    # Librarian site Info
    # You should update this accordingly, and/or set up ENV vars with your preferred values.
    #########################################################################################
    'site_name' => getenv('SITE_NAME') ?: 'LearningLabs | DigitalOcean DevEd Team',
    'site_author' => getenv('SITE_AUTHOR') ?: 'librarian@example.com',
    'site_description' => getenv('SITE_DESC') ?: 'A space for experimental and interactive learning',
    'site_url' => getenv('SITE_URL') ?: 'http://localhost:8000',
    'site_root' => getenv('SITE_ROOT') ?: '/',
    'site_about' => getenv('SITE_ABOUT') ?: '_pages/about',
    'posts_per_page' => 10,
    'social_links' => [
        'Twitter' => getenv('LINK_TWITTER'),
        'Github'  => getenv('LINK_GITHUB') ?: 'https://github.com/do-community/learning-labs',
        'YouTube' => getenv('LINK_YOUTUBE'),
        'LinkedIn' => getenv('LINK_LINKEDIN'),
        'Twitch' => getenv('LINK_TWITCH'),
    ],
    'app_debug' => getenv('APP_DEBUG') ?: true,

    ###################################################
    # Other Settings
    # You shouldn't need to change the next settings,
    # but you are free to do so at your own risk.
    ###################################################
    'app_path' => __DIR__ . '/app/Command',
    'theme' => 'unicorn',
    'templates_path' => __DIR__ . '/app/Resources/themes/default',
    'data_path' => __DIR__ . '/app/Resources/data',
    'cache_path' => __DIR__ . '/var/cache',
    'stencil_dir' => __DIR__ . '/app/Resources/stencil',
    'stencil_locations' => [
        'post' => __DIR__ . '/app/Resources/data/_p'
    ]
];