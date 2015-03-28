<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\ComposerCommandYii;

use Exception;
use Yii;

class ComposerCommandYii {
    public static $isInit;

    public static function loadConsoleApplication() {
        throw new Exception(sprintf('Implement method `%s` for init console application', __METHOD__));
    }

    public static function __callStatic($cmd, $params) {
        if (!static::$isInit) {
            static::loadConsoleApplication();
            static::$isInit = true;
        }
        $app = Yii::app();
        $app->getCommandRunner()->run(explode('_', $cmd));
    }
}