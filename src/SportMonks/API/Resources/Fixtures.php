<?php

namespace SportMonksAPI\Soccer\Resources;

use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\FindAll;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Resource\PreviousPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Fixtures
 * @package SportMonksAPI\Soccer\Resources
 *
 */
class Fixtures extends ResourceAbstract
{
    use InitTrait;
    use NextPage;
    use PreviousPage;

    use Find {
        find as traitFind;
    }

    /**
     * {@inheritdoc
     */
    public function find($id, array $params = [])
    {
        return $this->traitFind($id, $params);
    }

    /**
     * @param integer $fixtureId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function commentaries($fixtureId, array $params = [])
    {
        $this->setRoute('commentaries', 'commentaries/fixture/{fixture_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId
        ]);

        return $this->traitFind($fixtureId, $params, 'commentaries');
    }

    /**
     * @param integer $fixtureId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function videoHighlights($fixtureId, array $params = [])
    {
        $this->setRoute('highlights', 'highlights/fixture/{fixture_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId
        ]);

        return $this->traitFind($fixtureId, $params, 'highlights');
    }

    /**
     * @param integer $fixtureId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function tvStations($fixtureId, array $params = [])
    {
        $this->setRoute('tvStations', 'tvstations/fixture/{fixture_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId
        ]);

        return $this->traitFind($fixtureId, $params, 'tvStations');
    }

    public function odds($fixtureId, array $params = [])
    {
        $this->setRoute('odds_by_bookmaker', 'odds/fixture/{fixture_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId
        ]);

        return $this->traitFind($fixtureId, $params, 'odds_by_bookmaker');
    }

    public function oddsByBookmaker($fixtureId, $bookmakerId, array $params = [])
    {
        $this->setRoute('odds_by_bookmaker', 'odds/fixture/{fixture_id}/bookmaker/{bookmaker_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId,
            'bookmaker_id' => $bookmakerId
        ]);

        return $this->traitFind($fixtureId, $params, 'odds_by_bookmaker');
    }

    public function oddsByMarket($fixtureId, $marketId, array $params = [])
    {
        $this->setRoute('odds_by_market', 'odds/fixture/{fixture_id}/market/{market_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId,
            'market_id' => $marketId
        ]);

        return $this->traitFind($fixtureId, $params, 'odds_by_market');
    }

    public function oddsInPlay($fixtureId, array $params = [])
    {
        $this->setRoute('odds_in_play', 'odds/inplay/fixture/{fixture_id}');
        $this->setRouteParameters([
            'fixture_id' => $fixtureId
        ]);

        return $this->traitFind($fixtureId, $params, 'odds_in_play');
    }

    public static function getValidEndpoints()
    {
        return array_merge(parent::getValidEndpoints(), [
            'between' => FixturesBetween::class,
            'date' => FixturesDate::class
        ]);
    }


    /**
     * @param \DateTime $date
     * @param array $params
     *
     * @return null|\stdClass
     */
    public function date(\DateTime $date, $params = [])
    {
        $this->setRoute('fixtures_date', 'fixtures/date/{date}');
        $this->setRouteParameters([
            'date' => $date->format('Y-m-d')
        ]);

        return $this->traitFind(null, $params, 'fixtures_date');
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @param integer | null $teamId
     * @param array $params
     *
     * @return null | array
     */
    public function betweenDate(\DateTime $from, \DateTime $to, $teamId = null, $params = [])
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