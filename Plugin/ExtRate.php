<?php

/**
 * @author Mygento Team
 * @copyright 2016-2020 Mygento (https://www.mygento.ru)
 * @package Mygento_Shipment
 */

namespace Mygento\Shipment\Plugin;

class ExtRate
{
    /**
     * @param \Magento\Quote\Model\Quote\Address\Rate $subject
     * @param mixed $result
     * @param \Magento\Quote\Model\Quote\Address\RateResult\AbstractResult $rate
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterImportShippingRate(
        \Magento\Quote\Model\Quote\Address\Rate $subject,
        $result,
        \Magento\Quote\Model\Quote\Address\RateResult\AbstractResult $rate
    ) {
        $result->setEstimateDate($rate->getEstimateDate());
        $result->setEstimateTime($rate->getEstimateTime());
        $result->setEstimate($rate->getEstimate());

        $result->setPickupPoints($rate->getPickupPoints());

        // deprecated
        $result->setLatitude($rate->getLatitude());
        $result->setLongitude($rate->getLongitude());

        return $result;
    }
}
