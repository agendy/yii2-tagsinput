yii2-tagsinput
==============

[![GitHub version](https://badge.fury.io/gh/efureev%2Fyii2-tagsinput.svg)](https://badge.fury.io/gh/efureev%2Fyii2-tagsinput) [![Build Status](https://travis-ci.org/efureev/yii2-tagsinput.svg?branch=master)](https://travis-ci.org/efureev/yii2-tagsinput) [![Dependency Status](https://gemnasium.com/badges/github.com/efureev/yii2-tagsinput.svg)](https://gemnasium.com/github.com/efureev/yii2-tagsinput) ![](https://reposs.herokuapp.com/?path=efureev/yii2-tagsinput) [![Code Climate](https://codeclimate.com/github/efureev/yii2-tagsinput/badges/gpa.svg)](https://codeclimate.com/github/efureev/yii2-tagsinput) [![Test Coverage](https://codeclimate.com/github/efureev/yii2-tagsinput/badges/coverage.svg)](https://codeclimate.com/github/efureev/yii2-tagsinput/coverage)


## without Model

```js
var inputUsers = $('<input type="text">'),
    users = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch      : {
            url   : '/users.json',
            cache : false,
            filter: function (list) {
                return $.map(list, function (users) {
                    return {text: user.name};
                });
            }
        }
    });
hubs.initialize();

inputUsers.tagsinput({
    typeaheadjs: {
        displayKey: 'text',
        trimValue : true,
        valueKey  : 'text',
        name      : 'users',
        source    : users.ttAdapter()
    }
});
```
## with Model

```php
<?= $form->field($model, 'users', ['options' => [
    'class' => 'form-group',
]])->widget(
    \efureev\tagsinput\TagsInput::className(),
    [
        'preJS' => 'var users = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace("title"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch : { url : "/users", cache : false,
                filter: function (list) {
                    return $.map(list, function (user) {
                        return {text: user.name};
                    });
                }
            }
        });',
        'clientOptions' => [
            'typeaheadjs' => [
                'displayKey' => 'text',
                'trimValue'  => true,
                'valueKey'   => 'text',
                'name'       => 'users',
                'source'     => new \yii\web\JsExpression('users.ttAdapter()')
            ]
        ]
    ]
);
?>
```