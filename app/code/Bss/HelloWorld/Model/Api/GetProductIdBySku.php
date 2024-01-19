<?php

namespace Bss\HelloWorld\Model\Api;

use Bss\HelloWorld\Api\GetProductIdBySkuInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class GetProductIdBySku implements GetProductIdBySkuInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the API endpoint
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function getProductIdBySku($sku)
    {
        try {
            $result = [];
            $product = $this->productRepository->get($sku);
            $result['product_id'] = $product->getId();
            return json_encode($result);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return null;
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\LocalizedException(__($e->getMessage()));
        }
    }
}
