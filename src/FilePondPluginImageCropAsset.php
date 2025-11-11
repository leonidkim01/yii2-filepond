<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginImageCropAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-image-crop/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-image-crop.js' : 'filepond-plugin-image-crop.min.js',
    ];
}
