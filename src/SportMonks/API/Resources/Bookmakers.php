<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\FindAll;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Bookmakers
 * @package SportMonksAPI\Soccer\Resources
 */
class Bookmakers extends ResourceAbstract
{
    use InitTrait;

    use FindAll;

    use Find;

    use NextPage;
}