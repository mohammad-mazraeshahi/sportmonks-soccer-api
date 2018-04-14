<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Squad
 * @package SportMonksAPI\Soccer\Resources
 */
class Squad extends ResourceAbstract
{
    use InitTrait;

    use Find {
        find as traitFind;
    }

    use NextPage;

    /**
     * @param integer $seasonId
     * @param integer $teamId
     * @param array $params
     * @return array|null
     */
    public function getBySeasonAndTeam($seasonId, $teamId, $params = [])
    {
        $this->setRoute('squad_by_season_team', 'squad/season/{season_id}/team/{team_id}');
        $this->setRouteParameters([
            'season_id' => $seasonId,
            'team_id' => $teamId
        ]);

        return $this->traitFind(null, $params, 'squad_by_season_team');
    }
}