<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond.js' : 'filepond.min.js',
    ];

    /**
     * @var string[]
     */
    public $css = [
        YII_ENV_DEV ? 'filepond.css' : 'filepond.min.css',
    ];
}
