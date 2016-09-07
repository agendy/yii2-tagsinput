<?php

namespace efureev\tagsinput;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class TagsInput
 *
 * @package efureev\tagsinput
 */
class TagsInput extends InputWidget
{

    public $options = ['class' => 'form-control'];

    /** @var string Code prepend tagsinput */
    public $preJS;

    /** @var array tagsinput Options */
    public $clientOptions = [];

    /** @var array tagsinput Events */
    public $clientEvents = [];

    public function init()
    {
        if (!isset($this->options['id'])) {
            if ($this->hasModel()) {
                $this->options['id'] = Html::getInputId($this->model, $this->attribute);
            } else {
                $this->options['id'] = $this->getId();
            }
        }
        TagsInputAsset::register($this->getView());

        $this->registerScript();
        $this->registerEvent();
    }

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeInput('text', $this->model, $this->attribute, $this->options);
        } else {
            echo Html::input('text', $this->name, $this->value, $this->options);
        }
    }

    public function registerScript()
    {
        $js = [];
        if (!empty($this->preJS)) {
            $js[] = ';' . $this->preJS;
        }

        $clientOptions = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $js[] = "jQuery('#{$this->options["id"]}').tagsinput({$clientOptions});";
        $this->view->registerJs(implode(PHP_EOL, $js));
    }

    public function registerEvent()
    {
        if (!empty($this->clientEvents)) {
            $js = [];

            foreach ($this->clientEvents as $event => $handle) {
                $js[] = "jQuery('#{$this->options["id"]}').on('$event',$handle);";
            }

            $this->view->registerJs(implode(PHP_EOL, $js));
        }
    }
}