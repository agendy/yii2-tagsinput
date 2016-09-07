<?php

namespace efureev\tests\unit\tagsInput;

use efureev\tagsinput\TagsInput;
use efureev\tagsinput\TagsInputAsset;
use efureev\tagsinput\TypeaheadAsset;
use yii\base\Model;
use yii\web\View;

/**
 * Class MainTest
 *
 * @package efureev\tests\unit\tagsInput
 */
class MainTest extends \efureev\tests\unit\TestCase
{

    public function testMain()
    {
        $this->assertInstanceOf('efureev\tagsInput\TagsInput', new TagsInput());
        $this->assertInstanceOf('efureev\tagsInput\TagsInputAsset', new TagsInputAsset());
        $this->assertInstanceOf('efureev\tagsInput\TypeaheadAsset', new TypeaheadAsset());
    }


    public function testRegisterScript()
    {
        $input = new TagsInput();
        $input->preJS = 'var fake = 1234;';
        $input->registerScript();
        $view = $input->view;
        $jsArray = $view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);

        $this->assertTrue(array_key_exists("jQuery('#w1').tagsinput();", $jsArray));
        $this->assertTrue(array_key_exists(";var fake = 1234;" . PHP_EOL . "jQuery('#w1').tagsinput();", $jsArray));
    }

    public function testRegisterEvent()
    {
        $input = new TagsInput(['options' => ['id' => 'tag-input']]);
        $input->clientEvents = [
            'itemAdded' => 'function(event) { console.log(event.item); });'
        ];
        $input->registerEvent();
        $view = $input->view;
        $jsArray = $view->js[ View::POS_READY ];
        $jsArray = array_flip($jsArray);
        $this->assertTrue(array_key_exists("jQuery('#tag-input').on('itemAdded',function(event) { console.log(event.item); }););", $jsArray));
    }

    public function testRun()
    {
        $input = TagsInput::widget(['id' => 'tag-input']);
        $this->assertEquals($input, '<input type="text" id="tag-input" class="form-control">');
    }

    public function testModel()
    {
        $model = new UserForm();
        $model->title = 'test';

        $input = new TagsInput(
            [
                'model'     => $model,
                'attribute' => 'title'
            ]
        );

        ob_start();
        ob_implicit_flush(false);
        $input->run();
        $return = ob_get_clean();

        $this->assertEquals($return, '<input type="text" id="userform-title" class="form-control" name="UserForm[title]" value="test">');
    }

}

class UserForm extends Model
{
    public $title;
}