<?php

namespace SportMonksAPI\Soccer\Traits\Resource;


use SportMonksAPI\Soccer\Exceptions\MissingParameterException;
use SportMonksAPI\Soccer\Exceptions\RouteException;

trait NextPage
{
    /**
     * List all of this resource
     *
     * @return boolean
     * @throws MissingParameterException
     */
    public function nextPage()
    {
        if(!property_exists(self::$response->meta, 'pagination')){
            return false;
        }
        $pagination = & self::$response->meta->pagination;

        $nextPage = $pagination->current_page + 1;
        if($nextPage > $pagination->total_pages){
            return false;
        }

        self::$param = array_merge(self::$param, [
            'query' => [
                'page' => $nextPage
            ]
        ]);

        return true;
    }
}