<?php

/**
 * @author Mygento Team
 * @copyright 2016-2020 Mygento (https://www.mygento.ru)
 * @package Mygento_Shipment
 */

namespace Mygento\Shipment\Plugin;

class ShippingAddressManagement
{
    /**
     * @var \Mygento\Shipment\Helper\Data
     */
    private $helper;

    /**
     * @param \Mygento\Shipment\Helper\Data $helper
     */
    public function __construct(
        \Mygento\Shipment\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Quote\Model\ShippingAddressManagement $subject
     * @param int $cartId
     * @param \Magento\Quote\Api\Data\AddressInterface $address
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeAssign(
        \Magento\Quote\Model\ShippingAddressManagement $subject,
        $cartId,
        \Magento\Quote\Api\Data\AddressInterface $address
    ) {
        $extAttributes = $address->getExtensionAttributes();
        if (!empty($extAttributes)) {
            try {
                $address->setPickupPoint($extAttributes->getPickupPoint());
            } catch (\Exception $e) {
                $this->helper->critical($e->getMessage(), ['exception' => $e]);
            }
        }
    }
}
