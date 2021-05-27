<?php
/**
 * This file is part of yii2-imperavi-widget.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/venodon/yii2-imperavi-widget
 */

namespace venodon\imperavi\tests\functional\data\overrides;

use venodon\imperavi\Asset;

/**
 * @author Vasile Crudu <bazillio07@yandex.ru>
 *
 * @link https://github.com/venodon
 */
final class TestAsset extends Asset
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@venodon/imperavi/tests/../../src/assets';
}
