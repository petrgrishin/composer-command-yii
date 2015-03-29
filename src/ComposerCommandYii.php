<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\ComposerCommandYii;

use Exception;
use Yii;

class ComposerCommandYii {
    /**
     * @return \CConsoleApplication
     * @throws Exception
     */
    public static function getConsoleApplication() {
        throw new Exception(sprintf('Implement method `%s` for init console application', __METHOD__));
    }

    public static function __callStatic($cmd, $params) {
        /** @var \CConsoleApplication $app */
        static $app;
        if (!$app) {
            $app = static::getConsoleApplication();
        }
        $app->getCommandRunner()->run(explode('_', $cmd));
    }
}