<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginFilePosterAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-file-poster/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-file-poster.js' : 'filepond-plugin-file-poster.min.js',
    ];

    /**
     * @var string[]
     */
    public $css = [
        YII_ENV_DEV ? 'filepond-plugin-file-poster.css' : 'filepond-plugin-file-poster.min.css',
    ];
}
