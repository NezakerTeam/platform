<?php
return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => 'Nezaker - نذاكر', // set false to total remove
            'description' => 'أول موقع ألكترونى يهتم بشرح المناهج المدرسية للأباء فى فيديو قصيرة المدة يتراوح بين (5- 10 دقائق ) لكل درس يعمل على شرح الفكرة الاساسية للدرس مع طريقة شرحها ومثال عليها مما يعد استفاده كبرى لرفع مستوى الاباء فى توصيل المعلومة بشكل صحيح لابنائهم ولتوفير وقت كبير جدا.', // set false to total remove
            'separator'   => ' - ',
            'keywords'    => [],
            'canonical'   => false, // Set null for using Url::current(), set false to total remove
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Nezaker - نذاكر', // set false to total remove
            'description' => 'أول موقع ألكترونى يهتم بشرح المناهج المدرسية للأباء فى فيديو قصيرة المدة يتراوح بين (5- 10 دقائق ) لكل درس يعمل على شرح الفكرة الاساسية للدرس مع طريقة شرحها ومثال عليها مما يعد استفاده كبرى لرفع مستوى الاباء فى توصيل المعلومة بشكل صحيح لابنائهم ولتوفير وقت كبير جدا.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Nezaker - نذاكر',
            'images'      => [],
        ],
    ],
    'twitter'   => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
        //'card'        => 'summary',
        //'site'        => '@LuizVinicius73',
        ],
    ],
];
