<?php
class Leytech_SingleProductCategoryRedirect_Model_Observer
{
    public function SingleProductCategoryRedirect($observer)
    {
        if (Mage::getStoreConfig("leytech_singleproductcategoryredirect/settings/enable_ext")) {
            $_category = $observer->getEvent()->getCategory();
            $products_count = $_category->getProductCollection()->count();

            if ($products_count==1){
                $url = $_category->getProductCollection()->getFirstItem()->getProductUrl();
                return $observer->getEvent()->getControllerAction()->getResponse()->setRedirect($url);
            }
        }
    }
}