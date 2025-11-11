<?php

declare(strict_types=1);

namespace id161836712\filepond;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

use function array_merge;
use function file_exists;
use function implode;

/**
 * @inheritdoc
 */
final class FilePond extends InputWidget
{
    public string $language = 'en';

    public bool $multiple = false;

    public array $pluginOptions = [];

    public bool $allowFilePoster = true;

    public bool $allowFileSizeValidation = true;

    public bool $allowFileTypeValidation = true;

    public bool $allowImageCrop = true;

    public bool $allowImageEdit = true;

    public bool $allowImageExifOrientation = true;

    public bool $allowImagePreview = true;

    public bool $allowImageResize = true;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        $this->options['class'] = 'filepond';
        $this->options['multiple'] = $this->multiple;

        $this->configurePluginOptions();
    }

    /**
     * @inheritdoc
     */
    public function run(): string
    {
        $this->registerClientScript();

        return $this->hasModel()
            ? Html::activeFileInput($this->model, $this->attribute, $this->options)
            : Html::fileInput($this->name, $this->value, $this->options);
    }

    private function registerClientScript(): void
    {
        $view = $this->getView();

        $this->registerAssets($view);

        $id = $this->options['id'];

        $options = Json::encode($this->pluginOptions);

        $plugins = $this->getPluginNames();

        if ($plugins) {
            $js = ';FilePond.registerPlugin(' . implode(',', $plugins) . ')';
        } else {
            $js = '';
        }

        $js .= ";const filePond_{$id} = FilePond.create(document.getElementById('{$id}'), {$options});";

        $view->registerJs($js);
    }

    private function configurePluginOptions(): void
    {
        $this->pluginOptions['allowMultiple'] = $this->multiple;
        if (!$this->multiple) {
            $this->pluginOptions['maxFiles'] = 1;
        }

        $this->pluginOptions['allowFilePoster'] = $this->allowFilePoster;
        $this->pluginOptions['allowFileSizeValidation'] = $this->allowFileSizeValidation;
        $this->pluginOptions['allowFileTypeValidation'] = $this->allowFileTypeValidation;
        $this->pluginOptions['allowImageCrop'] = $this->allowImageCrop;
        $this->pluginOptions['allowImageEdit'] = $this->allowImageEdit;
        $this->pluginOptions['allowImageExifOrientation'] = $this->allowImageExifOrientation;
        $this->pluginOptions['allowImagePreview'] = $this->allowImagePreview;
        $this->pluginOptions['allowImageResize'] = $this->allowImageResize;

        $this->configureLanguage();
    }

    private function configureLanguage(): void
    {
        if ($this->language !== 'en') {
            $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'locale' . DIRECTORY_SEPARATOR . "{$this->language}.php";

            if (file_exists($filePath)) {
                $translation = require $filePath;

                $this->pluginOptions = array_merge($this->pluginOptions, $translation);
            }
        }
    }

    private function registerAssets(View $view): void
    {
        FilePondAsset::register($view);

        if ($this->allowFilePoster) {
            FilePondPluginFilePosterAsset::register($view);
        }
        if ($this->allowFileSizeValidation) {
            FilePondPluginFileValidateSizeAsset::register($view);
        }
        if ($this->allowFileTypeValidation) {
            FilePondPluginFileValidateTypeAsset::register($view);
        }
        if ($this->allowImageCrop) {
            FilePondPluginImageCropAsset::register($view);
        }
        if ($this->allowImageEdit) {
            FilePondPluginImageEditAsset::register($view);
        }
        if ($this->allowImageExifOrientation) {
            FilePondPluginImageExifOrientationAsset::register($view);
        }
        if ($this->allowImagePreview) {
            FilePondPluginImagePreviewAsset::register($view);
        }
        if ($this->allowImageResize) {
            FilePondPluginImageResizeAsset::register($view);
        }
    }

    private function getPluginNames(): array
    {
        $plugins = [];

        if ($this->allowFilePoster) {
            $plugins[] = 'FilePondPluginFilePoster';
        }
        if ($this->allowFileSizeValidation) {
            $plugins[] = 'FilePondPluginFileValidateSize';
        }
        if ($this->allowFileTypeValidation) {
            $plugins[] = 'FilePondPluginFileValidateType';
        }
        if ($this->allowImageEdit) {
            $plugins[] = 'FilePondPluginImageEdit';
        }
        if ($this->allowImageExifOrientation) {
            $plugins[] = 'FilePondPluginImageExifOrientation';
        }
        if ($this->allowImageCrop) {
            $plugins[] = 'FilePondPluginImageCrop';
        }
        if ($this->allowImageResize) {
            $plugins[] = 'FilePondPluginImageResize';
        }
        if ($this->allowImagePreview) {
            $plugins[] = 'FilePondPluginImagePreview';
        }

        return $plugins;
    }
}
