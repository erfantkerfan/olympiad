<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A5',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('temp/'),
    'font_path' => base_path('public/fonts/'),
	'font_data' => [
    'mitra' => [
        'R'  => 'BTITRBOLD.ttf',    // regular font
        'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
        'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
    ]
]
];
