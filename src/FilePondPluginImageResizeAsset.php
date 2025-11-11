<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginImageResizeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-image-resize/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-image-resize.js' : 'filepond-plugin-image-resize.min.js',
    ];
}
