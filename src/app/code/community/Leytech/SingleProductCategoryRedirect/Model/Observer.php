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
        $helper = Mage::helper('leytech_singleproductcategoryredirect');

        if ($helper->isEnabled()) {
            $_category = $observer->getEvent()->getCategory();
            $products_count = $_category->getProductCollection()->count();

            if ($products_count == 1) {
                $url = $_category->getProductCollection()->getFirstItem()->getProductUrl();
                return $observer->getEvent()->getControllerAction()->getResponse()->setRedirect($url);
            }
        }
    }
}