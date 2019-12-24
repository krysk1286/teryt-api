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
 * @author Marcin Pudełek <marcin@pudelek.org.pl>
 */

/**
 * Created by Marcin Pudełek <marcin@pudelek.org.pl>
 * Date: 06.09.2017
 */

namespace mrcnpdlk\Teryt\ResponseModel\Territory;

/**
 * Class JednostkaTerytorialna
 */
class JednostkaTerytorialna extends AbstractResponseModel
{
    /**
     * Nazwa jednostki
     *
     * @var string
     */
    public $name;
    /**
     * Typ jednostki podziału terytorialnego
     *
     * @var string
     */
    public $typeName;

    /**
     * JednostkaTerytorialna constructor.
     *
     * @param \stdClass $oData Obiekt zwrócony z TerytWS1
     *
     * @throws \mrcnpdlk\Teryt\Exception
     */
    public function __construct(\stdClass $oData)
    {
        $this->provinceId    = $oData->WOJ;
        $this->districtId    = $oData->POW;
        $this->communeId     = $oData->GMI;
        $this->communeTypeId = $oData->RODZ;
        $this->name          = $oData->NAZWA;
        $this->typeName      = $oData->NAZWA_DOD;
        $this->statusDate    = $oData->STAN_NA;

        try {
            $this->statusDate = $oData->STAN_NA ? (new \DateTime($oData->STAN_NA))->format('Y-m-d') : null;
        } catch (\Exception $e) {
            $this->statusDate = null;
        }

        if ($this->provinceId && $this->districtId && $this->communeId && $this->communeTypeId) {
            $this->tercId = (int)sprintf('%s%s%s%s',
                $this->provinceId,
                $this->districtId,
                $this->communeId,
                $this->communeTypeId);
        }

        parent::__construct();
    }
}
