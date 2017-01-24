<?php
/**
 * TestCase.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\pug\tests\unit;

use yii\helpers\ArrayHelper;

/**
 * Class TestCase
 * @package rmrevin\yii\pug\tests\unit
 * This is the base class for all yii framework unit tests.
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{

    public static $params;

    protected function setUp()
    {
        parent::setUp();
        $this->mockApplication();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Populates Yii::$app with a new application
     * The application will be destroyed on tearDown() automatically.
     * @param string $appClass
     */
    protected function mockApplication($appClass = '\yii\console\Application')
    {
        // for update self::$params
        $this->getParam('id');

        /** @var \yii\console\Application $app */
        new $appClass(self::$params);
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        \Yii::$app = null;
    }

    /**
     * Returns a test configuration param from /data/config.php
     * @param string $name params name
     * @param mixed $default default value to use when param is not set.
     * @return mixed the value of the configuration param
     */
    public function getParam($name, $default = null)
    {
        if (self::$params === null) {
            self::$params = require(__DIR__ . '/config/main.php');
            $main_local = __DIR__ . '/config/main-local.php';
            if (file_exists($main_local)) {
                self::$params = ArrayHelper::merge(self::$params, require($main_local));
            }
        }

        return isset(self::$params[$name]) ? self::$params[$name] : $default;
    }

    /**
     * @return \yii\base\View|\yii\web\View
     */
    public function getView()
    {
        return \Yii::$app->view;
    }

    /**
     * @return \rmrevin\yii\pug\ViewRenderer
     */
    public function getPugRenderer()
    {
        $renderer = \Yii::$app->view->renderers['pug'];

        if (is_array($renderer) || is_string($renderer)) {
            $renderer = \Yii::createObject($renderer);
        }

        \Yii::$app->view->renderers['pug'] = $renderer;

        return $renderer;
    }
}
