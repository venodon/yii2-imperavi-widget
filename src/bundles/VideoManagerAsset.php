<?php
/**
 * This file is part of yii2-imperavi-widget.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/venodon/yii2-imperavi-widget
 */

namespace venodon\imperavi\bundles;

use yii\web\AssetBundle;

/**
 * @author Vasile Crudu <bazillio07@yandex.ru>
 *
 * @link https://github.com/venodon/yii2-imperavi-widget
 */
class VideoManagerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@venodon/imperavi/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'custom/plugins/videomanager/videomanager.js',
    ];
}
