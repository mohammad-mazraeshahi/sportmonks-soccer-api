<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Teams
 * @package SportMonksAPI\Soccer\Resources
 */
class Teams extends ResourceAbstract
{
    use InitTrait;

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
     * @param integer $seasonId
     * @param array $params
     *
     * @return array|null|\stdClass
     */
    public function season($seasonId, array $params = [])
    {
        $this->setRoute('seasonTeams', 'teams/season/{season_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId
        ]);

        return $this->traitFind($seasonId, $params, 'seasonTeams');
    }
}