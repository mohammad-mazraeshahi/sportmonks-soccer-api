<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Rounds
 * @package SportMonksAPI\Soccer\Resources
 */
class Rounds extends ResourceAbstract
{
    use InitTrait;

    use Find;
}