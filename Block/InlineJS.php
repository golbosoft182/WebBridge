<?php
namespace Ammarindo\WebBridge\Block;

class InlineJS extends \Magento\Framework\View\Element\Template
{
    protected $scopeConfig;
    protected $storeManager;
	protected $_coreRegistry;
	protected $_checkoutSession;
    protected $order;
    protected $_orderModel;
    protected $_orderFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Registry $coreRegistry,
		\Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\Order $orderModel,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->_coreRegistry = $coreRegistry;
		$this->_checkoutSession = $checkoutSession;
        $this->_orderModel = $orderModel;
        $this->_orderFactory = $orderFactory;
        parent::__construct($context, $data);
    }

    public function getConfigValue($value = '')
    {
        return $this->scopeConfig->getValue($value, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getWebsiteId()
    {
        return $this->storeManager->getStore()->getWebsiteId();
    }

    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    public function getPromotionId()
    {
        return $this->getConfigValue('ammarindo_webbridge/general/promotion_id');
    }

    public function getSiteWebId()
    {
        return $this->getConfigValue('ammarindo_webbridge/general/site_web_id');
    }

    /**
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        if(!$this->order) {
            /** @var \Magento\Sales\Model\Order $order */
            $this->order = $this->_checkoutSession->getLastRealOrder();
        }
        return $this->order;
    }

    public function quoteItems()
    {
        return $this->_checkoutSession->getQuote()->getAllVisibleItems();
    }
}
