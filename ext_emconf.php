<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Wk HTML to PDF',
    'description' => 'Wk HTML to PDF, https://wkhtmltopdf.org/',
    'category' => 'fe',
    'author' => 'Bill.Dagou',
    'author_email' => 'billdagou@gmail.com',
    'version' => '10.4.0',
    'state' => 'stable',
    'constraints' => [
        'depends' => [
            'dagou_fluid' => '10.4.0-10.4.99',
            'typo3' => '10.4.0-10.4.99',
        ],
    ],
];