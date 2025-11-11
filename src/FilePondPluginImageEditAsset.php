<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginImageEditAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-image-edit/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-image-edit.js' : 'filepond-plugin-image-edit.min.js',
    ];

    /**
     * @var string[]
     */
    public $css = [
        YII_ENV_DEV ? 'filepond-plugin-image-edit.css' : 'filepond-plugin-image-edit.min.css',
    ];
}
