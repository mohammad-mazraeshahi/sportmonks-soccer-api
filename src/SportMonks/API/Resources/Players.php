<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\FindAll;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Players
 * @package SportMonksAPI\Soccer\Resources
 */
class Players extends ResourceAbstract
{
    use InitTrait;

    use Find;
}