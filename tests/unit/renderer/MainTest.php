<?php
/**
 * MainTest.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\pug\tests\unit\renderer;

use yii\helpers\FileHelper;

/**
 * Class MainTest
 * @package rmrevin\yii\pug\tests\unit\renderer
 */
class MainTest extends \rmrevin\yii\pug\tests\unit\TestCase
{

    public function tearDown()
    {
        parent::tearDown();

        $cachePath = $this->getCachePath();

        FileHelper::removeDirectory($cachePath);
    }

    public function testMain()
    {
        $view = $this->getView();

        $result = $view->renderFile('@app/views/main.pug');

        $this->assertEquals($result, '<div class="test-block"><p>Hello world</p><p>This is a test</p></div>');

        $this->checkAndRemoveCachePath(1);
    }

    public function testExtends()
    {
        $view = $this->getView();

        $result = $view->renderFile('@app/views/extend.pug');

        $this->assertEquals($result, '<div class="test-block"><p>Hello world</p><p>This is a test</p><p>this is additional</p></div>');

        $this->checkAndRemoveCachePath(1);
    }

    public function testFilters()
    {
        $view = $this->getView();
        $Pug = $this->getPugRenderer();

        $Pug->addFilter('strip_tags', function ($node, $compiler) {
            $output = [];

            foreach ($node->block->nodes as $line) {
                $output[] = $compiler->interpolate($line->value);
            }

            return strip_tags(implode("\n", $output));
        });

        $result = $view->renderFile('@app/views/filters.pug');

        // print_r($result);
        // die();

        $this->assertEquals($result, "<style type=\"text/css\">p { font-size: 1rem; color: black; }\n\n</style><div>html string\n</div><div>&lt;p&gt;html string&lt;/p&gt;</div>");

        $this->checkAndRemoveCachePath(1);
    }

    protected function checkAndRemoveCachePath($count)
    {
        $cachePath = $this->getCachePath();
        $files = FileHelper::findFiles($cachePath);

        $this->assertEquals(count($files), $count);

        FileHelper::removeDirectory($cachePath);
    }

    protected function getCachePath()
    {
        $Pug = $this->getPugRenderer();

        return \Yii::getAlias($Pug->cachePath);
    }
}
