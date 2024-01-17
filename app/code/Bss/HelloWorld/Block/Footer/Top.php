<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Bss\HelloWorld\Block\Footer;

use Magento\Framework\View\Element\Template;
use Magento\Cms\Model\BlockFactory;

class Top extends Template
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $blockFactory;

    /**
     * CustomBlock constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        BlockFactory $blockFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->blockFactory = $blockFactory;
    }

    /**
     * Get the content of the static block by identifier
     *
     * @param string $blockIdentifier
     * @return string
     */
    public function getStaticBlockContent($blockIdentifier)
    {
        $block = $this->blockFactory->create()->load($blockIdentifier);
        return $block->getContent();
    }
}
