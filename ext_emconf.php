<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'WK HTML to PDF',
    'description' => 'WK HTML to PDF, https://wkhtmltopdf.org/',
    'category' => 'fe',
    'author' => 'Bill.Dagou',
    'author_email' => 'billdagou@gmail.com',
    'state' => 'stable',
    'version' => '12.4.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'suggests' => [
            'dagou_fluid' => '',
        ],
    ],
];