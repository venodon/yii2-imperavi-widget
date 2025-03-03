# Imperavi Redactor Widget for Yii 2

[![Latest Version](https://img.shields.io/github/tag/venodon/yii2-imperavi-widget.svg?style=flat-square&label=release)](https://github.com/venodon/yii2-imperavi-widget/releases)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/venodon/yii2-imperavi-widget/master.svg?style=flat-square)](https://travis-ci.org/venodon/yii2-imperavi-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/venodon/yii2-imperavi-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/venodon/yii2-imperavi-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/venodon/yii2-imperavi-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/venodon/yii2-imperavi-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/venodon/yii2-imperavi-widget.svg?style=flat-square)](https://packagist.org/packages/venodon/yii2-imperavi-widget)

`Imperavi Redactor Widget` is a wrapper for [Imperavi Redactor 10.2.5](https://imperavi.com/assets/pdf/redactor-documentation-10.pdf),
a high quality WYSIWYG editor.

**Note that Imperavi Redactor itself is a proprietary commercial copyrighted software
but since Yii community bought OEM license you can use it for free with Yii.**

## Install

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require --prefer-dist venodon/yii2-imperavi-widget "*"
```

or add

```json
"venodon/yii2-imperavi-widget": "*"
```

to the `require` section of your `composer.json` file.


## Usage

Once the extension is installed, simply use it in your code:

### Like a widget

```php
echo \venodon\imperavi\Widget::widget([
    'name' => 'redactor',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
]);
```

### Like an ActiveForm widget

```php
use venodon\imperavi\Widget;

echo $form->field($model, 'content')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
]);
```

### Like a widget for a predefined textarea

```php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
]);
```

### Add images that have already been uploaded

```php
// DefaultController.php
public function actions()
{
    return [
        'images-get' => [
            'class' => 'venodon\imperavi\actions\GetImagesAction',
            'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => Url::to(['default/image-upload']),
        'imageManagerJson' => Url::to(['/default/images-get']),
        'plugins' => [
            'imagemanager',
        ],
    ],
]);
```

### Add files that have already been uploaded

```php
// DefaultController.php
public function actions()
{
    return [
        'files-get' => [
            'class' => 'venodon\imperavi\actions\GetFilesAction',
            'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'options' => ['only' => ['*.txt', '*.md']], // These options are by default.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'fileUpload' => Url::to(['default/file-upload']),
        'fileManagerJson' => Url::to(['/default/files-get']),
        'plugins' => [
            'filemanager',
        ],
    ],
]);
```

### Upload image

```php
// DefaultController.php
public function actions()
{
    return [
        'image-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => Url::to(['/default/image-upload']),
        'plugins' => [
            'imagemanager',
        ],
    ],
]);
```

### Upload file

```php
// DefaultController.php
public function actions()
{
    return [
        'file-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'uploadOnlyImage' => false, // For any kind of files uploading.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'fileUpload' => Url::to(['/default/file-upload']),
        'plugins' => [
            'filemanager',
        ],
    ],
]);
```

### Upload and replace a file with the same name

```php
// DefaultController.php
public function actions()
{
    return [
        'file-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'uploadOnlyImage' => false, // For any kind of files uploading.
            'unique' => false,
            'replace' => true, // By default it throw an excepiton instead.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'fileUpload' => Url::to(['/default/file-upload']),
        'plugins' => [
            'filemanager',
        ],
    ],
]);
```

### Upload file and *translit* its name

```php
// DefaultController.php
public function actions()
{
    return [
        'file-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'uploadOnlyImage' => false, // For any kind of files uploading.
            'unique' => false,
            'translit' => true,
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'fileUpload' => Url::to(['/default/file-upload']),
        'plugins' => [
            'filemanager',
        ],
    ]
]);
```

### Add custom plugins

```php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen'
        ]
    ],
    'plugins' => [
        'my-custom-plugin' => 'app\assets\MyPluginBundle',
    ],
]);
```

### Enable custom image manager with delete functionality

```php
// DefaultController.php
public function actions()
{
    return [
        'images-get' => [
            'class' => 'venodon\imperavi\actions\GetImagesAction',
            'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
        ],
        'image-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
        ],
        'file-delete' => [
            'class' => 'venodon\imperavi\actions\DeleteFileAction',
            'url' => 'http://my-site.com/statics/', // Directory URL address, where files are stored.
            'path' => '/var/www/my-site.com/web/statics', // Or absolute path to directory where files are stored.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => Url::to(['/default/image-upload']),
        'imageDelete' => Url::to(['/default/file-delete']),
        'imageManagerJson' => Url::to(['/default/images-get']),
    ],
    'plugins' => [
        'imagemanager' => 'venodon\imperavi\bundles\ImageManagerAsset',              
    ],
]);
```

### Enable custom file manager with delete functionality

```php
// DefaultController.php
public function actions()
{
    return [
        'files-get' => [
            'class' => 'venodon\imperavi\actions\GetFilesAction',
            'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
        ],
        'file-upload' => [
            'class' => 'venodon\imperavi\actions\UploadFileAction',
            'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
            'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
            'uploadOnlyImage' => false, // For any kind of files uploading.
        ],
        'file-delete' => [
            'class' => 'venodon\imperavi\actions\DeleteFileAction',
            'url' => 'http://my-site.com/statics/', // Directory URL address, where files are stored.
            'path' => '/var/www/my-site.com/web/statics', // Or absolute path to directory where files are stored.
        ],
    ];
}

// View.php
echo \venodon\imperavi\Widget::widget([
    'selector' => '#my-textarea-id',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'fileUpload' => Url::to(['/default/file-upload']),
        'fileDelete' => Url::to(['/default/file-delete']),
        'fileManagerJson' => Url::to(['/default/files-get']),
    ],
    'plugins' => [
        'filemanager' => 'venodon\imperavi\bundles\FileManagerAsset',              
    ],
]);
```

## Testing

``` bash
$ phpunit
```

## Further Information

Please, check the [Imperavi Redactor v10](https://imperavi.com/assets/pdf/redactor-documentation-10.pdf) documentation for further information about its configuration options.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Vasile Crudu](https://github.com/venodon)
- [All Contributors](../../contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

## Upgrade guide

Please check the [UPGRADE GUIDE](UPGRADE.md) for details. 
