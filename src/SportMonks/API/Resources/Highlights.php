<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\FindAll;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Highlights
 * @package SportMonksAPI\Soccer\Resources
 */
class Highlights extends ResourceAbstract
{
    use InitTrait;

    use FindAll;

    use NextPage;
}