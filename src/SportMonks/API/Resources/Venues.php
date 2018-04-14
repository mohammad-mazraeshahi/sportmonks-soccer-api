<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Venues
 * @package SportMonksAPI\Soccer\Resources
 */
class Venues extends ResourceAbstract
{
    use InitTrait;

    use Find;

    use NextPage;
}