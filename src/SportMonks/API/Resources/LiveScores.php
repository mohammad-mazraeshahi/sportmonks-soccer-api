<?php

namespace SportMonksAPI\Soccer\Resources;


use SportMonksAPI\Soccer\Traits\Resource\Find;
use SportMonksAPI\Soccer\Traits\Resource\NextPage;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;

/**
 * Class LiveScores
 * @package SportMonksAPI\Soccer\Resources
 */
class LiveScores extends ResourceAbstract
{
    use InitTrait;

    use Find {
        find as traitFind;
    }

    use NextPage;

    public function today($params = [])
    {
        $this->setRoute('live_scores', 'livescores');

        return $this->traitFind(null, $params, 'live_scores');
    }

    public function inPlay($params = [])
    {
        $this->setRoute('live_scores_now', 'livescores/now');

        return $this->traitFind(null, $params, 'live_scores_now');
    }
}