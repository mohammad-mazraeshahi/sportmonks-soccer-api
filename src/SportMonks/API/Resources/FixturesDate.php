<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class FixturesDate
 * @package SportMonksAPI\Soccer\Resources
 */
class FixturesDate extends ResourceAbstract
{
    use InitTrait;

    use Find {
        find as traitFind;
    }

    /**
     * @param \DateTime $date
     * @param array $params
     *
     * @return null|\stdClass
     */
    public function day(\DateTime $date, $params = [])
    {
        $this->setRoute('fixtures_date', 'fixtures/date/{date}');
        $this->setRouteParameters([
            'date' => $date->format('Y-m-d')
        ]);

        return $this->traitFind(null, $params, 'fixtures_date');
    }
}