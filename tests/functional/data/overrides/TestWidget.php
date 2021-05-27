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
use venodon\imperavi\Widget;
use Yii;

/**
 * @author Vasile Crudu <bazillio07@yandex.ru>
 *
 * @link https://github.com/venodon
 */
final class TestWidget extends Widget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        Yii::$container->set(Asset::className(), [
            'class' => TestAsset::className(),
        ]);

        parent::init();
    }
}
