<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginImagePreviewAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-image-preview/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-image-preview.js' : 'filepond-plugin-image-preview.min.js',
    ];

    /**
     * @var string[]
     */
    public $css = [
        YII_ENV_DEV ? 'filepond-plugin-image-preview.css' : 'filepond-plugin-image-preview.min.css',
    ];
}
