<?php

namespace Ammarindo\WebBridge\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper{

    protected $scopeConfig;

    const XML_PATH_STATUS = 'Ammarindo_webbridge/general/enable';
    const XML_PATH_PROMOTION_ID = 'ammarindo_webbridge/general/promotion_id';
    const XML_PATH_SITE_WEB_ID = 'ammarindo_webbridge/general/site_web_id';
    const XML_PATH_CATEGORIES = 'ammarindo_webbridge/general/categories';

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function getConfigStatus() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $output = $this->scopeConfig->getValue(self::XML_PATH_STATUS, $storeScope);

        return $output;
    }

    public function getConfigPromotionId() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $output = $this->scopeConfig->getValue(self::XML_PATH_PROMOTION_ID, $storeScope);

        return $output;
    }

    public function getConfigSiteWebId() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $output = $this->scopeConfig->getValue(self::XML_PATH_SITE_WEB_ID, $storeScope);

        return $output;
    }

    public function getConfigCategories() {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $output = $this->scopeConfig->getValue(self::XML_PATH_CATEGORIES, $storeScope);

        return $output;
    }
}
