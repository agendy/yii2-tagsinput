<?php

namespace efureev\tagsinput;


/**
 * Class TagsInputAsset
 *
 * @package efureev\tagsinput
 */
class TagsInputAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/fe-tagsinput';

    public $js = [
        'dist/bootstrap-tagsinput.js'
    ];

    public $css = [
        'dist/bootstrap-tagsinput.css'
    ];

    public $depends = [
        'efureev\tagsinput\TypeaheadAsset'
    ];

}