<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class FixturesBetween
 * @package SportMonksAPI\Soccer\Resources
 */
class FixturesBetween extends ResourceAbstract
{
    use InitTrait;

    use Find {
        find as traitFind;
    }

    use NextPage;

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @param integer | null $teamId
     * @param array $params
     *
     * @return null | array
     */
    public function period(\DateTime $from, \DateTime $to, $teamId = null, $params = [])
    {
        if(is_null($teamId)) {
            $this->setRoute('fixtures_period', 'fixtures/between/{from}/{to}');
        }else{
            $this->setRoute('fixtures_period', 'fixtures/between/{from}/{to}/{team_id}');
        }
        $this->setRouteParameters([
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'team_id' => $teamId
        ]);
        $params = array_merge($params, self::$param);

        return $this->traitFind(null, $params, 'fixtures_period');
    }
}