<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Exceptions\MissingParameterException;
use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class Head2Head
 * @package SportMonksAPI\Soccer\Resources
 */
class Head2Head extends ResourceAbstract
{
    use InitTrait;

    use NextPage;

    use Find {
        find as traitFind;
    }

    /**
     * @param array $teams
     * @param array $params
     *
     * @return array|null|\stdClass
     *
     * @throws MissingParameterException
     */
    public function get(array $teams, array $params = [])
    {
        list($team1, $team2) = $teams;
        if((int)$team1 <= 0){
            throw new MissingParameterException(__METHOD__, ['team1']);
        }
        if((int)$team2 <= 0){
            throw new MissingParameterException(__METHOD__, ['team2']);
        }

        $this->setRoute('head2head', 'head2head/{team_1}/{team_2}');
        $this->setRouteParameters([
            'team_1' => $team1,
            'team_2' => $team2
        ]);

        return $this->traitFind(null, $params, 'head2head');
    }
}