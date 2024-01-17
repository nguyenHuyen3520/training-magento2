<?php

namespace Bss\HelloWorld\Block;

use Magento\Framework\View\Element\Html\Link;
use Magento\Store\Model\StoreManagerInterface;

class CustomLink extends Link
{
    /**
     * @var string
     */
    protected $customLabel;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    /**
     * CustomLink constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
        // Access argument 'label' using getData method
        $label = $this->getData('label');

        // Do something with the label value
        if ($label) {
            $this->customLabel = $label;
        }
    }

    /**
     * @return string
     */
    public function getHref()
    {
        // Return the URL for your custom link
        $currentUrl = $this->getCurrentWebsiteBaseUrl();
        $fullUrl = $currentUrl . "helloworld/Index/Index";
        return $this->getUrl($fullUrl);
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        // If custom label is set, return it; otherwise, use the default label
        return $this->customLabel ?: __('Custom Link');
    }

    /**
     * @return string
     */
    public function getCurrentWebsiteBaseUrl()
    {
        return $this->storeManager->getStore()->getWebsite()->getDefaultStore()->getBaseUrl();
    }

    /**
     * Get the template for the block
     *
     * @return string
     */
    protected function _toHtml()
    {

        $this->setTemplate('Bss_HelloWorld::customLink.phtml');

        return parent::_toHtml();
    }
}
