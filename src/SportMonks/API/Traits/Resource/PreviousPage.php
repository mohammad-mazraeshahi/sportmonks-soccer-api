<?php

namespace SportMonksAPI\Soccer\Traits\Resource;


use SportMonksAPI\Soccer\Exceptions\MissingParameterException;
use SportMonksAPI\Soccer\Exceptions\RouteException;

trait PreviousPage
{
    /**
     * List all of this resource
     *
     * @return boolean
     * @throws MissingParameterException
     */
    public function previousPage()
    {
        if(!property_exists(self::$response->meta, 'pagination')){
            return false;
        }
        $pagination = & self::$response->meta->pagination;

        $previousPage = $pagination->current_page - 1;
        if($previousPage < 1){
            return false;
        }

        self::$param = array_merge(self::$param, [
            'query' => [
                'page' => $previousPage
            ]
        ]);

        return true;
    }
}