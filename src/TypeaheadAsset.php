<?php

namespace efureev\tagsinput;

/**
 * Class TypeaheadAsset
 *
 * @package efureev\tagsinput
 */
class TypeaheadAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/typeahead.js';

    public $js = [
        'dist/typeahead.bundle.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

}