<?php
/**
 * TERYT-API
 *
 * Copyright (c) 2017 pudelek.org.pl
 *
 * @license MIT License (MIT)
 *
 * For the full copyright and license information, please view source file
 * that is bundled with this package in the file LICENSE
 * @author  Marcin Pudełek <marcin@pudelek.org.pl>
 */

namespace mrcnpdlk\Teryt;

use mrcnpdlk\Teryt\Model\City;

/**
 * Class Api
 */
class Api
{
    /**
     * @var NativeApi
     */
    private $oNativeApi;

    /**
     * Api constructor.
     *
     * @param Client $oClient
     */
    public function __construct(Client $oClient)
    {
        $this->oNativeApi = NativeApi::create($oClient);
    }

    /**
     * Get information about City
     *
     * @param string $id
     *
     * @throws \mrcnpdlk\Teryt\Exception
     * @throws \mrcnpdlk\Teryt\Exception\Connection
     * @throws \mrcnpdlk\Teryt\Exception\InvalidArgument
     * @throws \mrcnpdlk\Teryt\Exception\NotFound
     *
     * @return City
     */
    public function getCity(string $id): City
    {
        $oCity = new City();

        return $oCity->find($id);
    }
}
