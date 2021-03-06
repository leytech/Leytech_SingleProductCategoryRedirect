<?php
/**
 * @package    Leytech_SingleProductCategoryRedirect
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */

class Leytech_SingleProductCategoryRedirect_Helper_Data extends Mage_Core_Helper_Abstract
{

    const XML_PATH_IS_ENABLED = 'leytech_singleproductcategoryredirect/settings/enabled';

    public function isEnabled()
    {
        return (bool) Mage::getStoreConfig(self::XML_PATH_IS_ENABLED);
    }

}