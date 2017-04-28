<?php
/**
 * @package    Leytech_SingleProductCategoryRedirect
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2017 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */

class Leytech_SingleProductCategoryRedirect_Model_Observer
{
    public function SingleProductCategoryRedirect($observer)
    {
        if (Mage::getStoreConfig("leytech_singleproductcategoryredirect/settings/enable_ext")) {
            $_category = $observer->getEvent()->getCategory();
            $products_count = $_category->getProductCollection()->addAttributeToFilter('status', 1)->addAttributeToFilter('visibility', array(3,4))->count();

            if ($products_count==1){
                $url = $_category->getProductCollection()->getFirstItem()->getProductUrl();
                return $observer->getEvent()->getControllerAction()->getResponse()->setRedirect($url);
            }
        }
    }
}