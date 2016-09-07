<?php

namespace efureev\tagsinput\tests\unit\tagsInput;

use efureev\tagsinput\TagsInput;
use efureev\tagsinput\TagsInputAsset;
use efureev\tagsinput\TypeaheadAsset;

/**
 * Class MainTest
 *
 * @package efureev\tagsinput\tests\unit\tagsInput
 */
class MainTest extends \efureev\fontawesome\tests\unit\TestCase
{

    public function testMain()
    {
        $this->assertInstanceOf('efureev\tagsInput\TagsInput', new TagsInput());
        $this->assertInstanceOf('efureev\tagsInput\TagsInputAsset', new TagsInputAsset());
        $this->assertInstanceOf('efureev\tagsInput\TypeaheadAsset', new TypeaheadAsset());
    }

}