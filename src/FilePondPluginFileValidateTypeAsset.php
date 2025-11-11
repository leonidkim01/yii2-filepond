<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
final class FilePondPluginFileValidateTypeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/filepond-plugin-file-validate-type/dist';

    /**
     * @var string[]
     */
    public $js = [
        YII_ENV_DEV ? 'filepond-plugin-file-validate-type.js' : 'filepond-plugin-file-validate-type.min.js',
    ];
}
