<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\FindAll;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Seasons
 * @package SportMonksAPI\Soccer\Resources
 */
class Seasons extends ResourceAbstract
{
    use InitTrait;

    use FindAll;

    use Find {
        find as traitFind;
    }

    use NextPage;

    /**
     * @param $id
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function find($id, array $params = [])
    {
        return $this->traitFind($id, $params);
    }

    /**
     * @param $seasonId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function standings($seasonId, array $params = [])
    {
        $this->setRoute('standings', 'standings/season/{season_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId
        ]);

        return $this->traitFind(null, $params, 'standings');
    }

    /**
     * @param $seasonId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function standingsLive($seasonId, array $params = [])
    {
        $this->setRoute('standings_live', 'standings/season/live/{season_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId
        ]);

        return $this->traitFind(null, $params, 'standings_live');
    }

    /**
     * @param $seasonId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function topScorers($seasonId, array $params = [])
    {
        $this->setRoute('top_scorers', 'topscorers/season/{season_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId
        ]);

        return $this->traitFind(null, $params, 'top_scorers');
    }

    /**
     * @param $seasonId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function rounds($seasonId, array $params = [])
    {
        $this->setRoute('rounds', 'rounds/season/{season_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId
        ]);

        return $this->traitFind(null, $params, 'rounds');
    }
}