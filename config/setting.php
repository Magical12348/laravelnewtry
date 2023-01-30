<?php

return [

    'links' => [
        'facebook' => env('FACEBOOK_LINK', '#'),
        'instagram' => env('INSTAGRAM_LINK', '#'),
        'youtube' => env('YOUTUBE_LINK', '#'),
        'twitter' => env('TWITTER_LINK', '#'),
        'telegram' => env('TELEGRAM_LINK', '#'),
    ],

    'gst' => [
        'rate' => env('GST_PERCENT', 18)
    ],

    'email' => [
        'notify' => env('NOTIFICATION_EMAIL')
    ],

    'cin' => [
        'number' => env('CIN_NUMBER', 'u80902mh2021ptc367865')
    ],

    'due_date' => [
        'days' => env('DUE_DATE_DAYS', 30)
    ],

    'multiple_emails' => array('paragdu619@gmail.com', 'jayshreesahare26@gmail.com', 'kuldeepmeshram027@gmail.com'),

    'select_courses' => array('C', 'C++', 'Java', 'JavaScript', 'PHP', 'Python', 'other'),

    'nav_links' => [
        ['name' => 'Home', 'route' => 'welcome'],
        ['name' => 'Services', 'route' => 'services'],
        // ['name' => 'FAQs', 'route' => 'faqs'],
        // ['name' => 'About Us', 'route' => 'about'],
        ['name' => 'Contact Us', 'route' => 'contact'],
        ['name' => 'Careers', 'route' => 'career.list'],
        ['name' => 'Refer&Earn', 'route' => 'referral']
    ]
];
