Yii 2 Pug (ex Jade) extension
===============================

This extension provides a view renderer for [Pug](https://pugjs.org/) templates
for [Yii framework 2.0](http://www.yiiframework.com/) applications.

For license information check the [LICENSE](https://github.com/rmrevin/yii2-pug/blob/master/LICENSE)-file.

[![License](https://poser.pugx.org/rmrevin/yii2-pug/license.svg)](https://packagist.org/packages/rmrevin/yii2-pug)
[![Latest Stable Version](https://poser.pugx.org/rmrevin/yii2-pug/v/stable.svg)](https://packagist.org/packages/rmrevin/yii2-pug)
[![Latest Unstable Version](https://poser.pugx.org/rmrevin/yii2-pug/v/unstable.svg)](https://packagist.org/packages/rmrevin/yii2-pug)
[![Total Downloads](https://poser.pugx.org/rmrevin/yii2-pug/downloads.svg)](https://packagist.org/packages/rmrevin/yii2-pug)

Code Status
-----------
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rmrevin/yii2-pug/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rmrevin/yii2-pug/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/rmrevin/yii2-pug/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/rmrevin/yii2-pug/?branch=master)
[![Travis CI Build Status](https://travis-ci.org/rmrevin/yii2-pug.svg)](https://travis-ci.org/rmrevin/yii2-pug)
[![Dependency Status](https://www.versioneye.com/user/projects/54119b799e16229fe00000da/badge.svg)](https://www.versioneye.com/user/projects/54119b799e16229fe00000da)

Support
-------
* [GutHub issues](https://github.com/rmrevin/yii2-pug/issues)
* [Public chat](https://gitter.im/rmrevin/support)

Update to `2.17`
----------------

Be careful in version 2.17 deprecated methods were removed. More in the [changelog](https://github.com/rmrevin/yii2-pug/blob/master/CHANGELOG.md).

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run

```bash
composer require "rmrevin/yii2-pug:~0.0"
```

or add

```
"rmrevin/yii2-pug": "~0.0",
```

to the `require` section of your `composer.json` file.

Configure
---------
```php
<?php

return [
	// ...
	'components' => [
		// ...
		'view' => [
		    // ...
            'renderers' => [
            	'pug' => 'rmrevin\\yii\\pug\\ViewRenderer',
            ],
		]
	]
];
```

That's all! Now you can use pug templates.
