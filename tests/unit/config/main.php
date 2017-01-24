<?php
/**
 * main.php
 * @author Roman Revin http://phptime.ru
 */

$baseDir = realpath(__DIR__ . '/..');

return [
    'id' => 'testapp',
    'basePath' => $baseDir,
    'aliases' => [
        '@app' => $baseDir,
        '@runtime' => $baseDir . '/runtime',
    ],
    'components' => [
        'view' => [
            'renderers' => [
                'pug' => [
                    'class' => 'rmrevin\\yii\\pug\\ViewRenderer',
                    'filters' => [
                        'escaped' => 'rmrevin\\yii\\pug\\tests\\unit\\filters\\EscapedFilter'
                    ],
                ],
            ],
        ],
    ],
];