<?php

namespace Bss\HelloWorld\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Registry;

class CategoryProducts extends Template
{
    protected $productCollectionFactory;
    protected $registry;

    public function __construct(
        Template\Context $context,
        CollectionFactory $productCollectionFactory,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productCollectionFactory = $productCollectionFactory;
        $this->registry = $registry;
    }

    public function getCategoryProducts()
    {
        $categoryId = $this->getData('category_id') ?: $this->getCurrentCategoryId();
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addCategoryFilter($categoryId);
        $productCollection->addAttributeToSelect('*'); // You can specify the attributes you want to select

        return $productCollection;
    }

    protected function getCurrentCategoryId()
    {
        $category = $this->registry->registry('current_category');
        return $category ? $category->getId() : null;
    }
}
