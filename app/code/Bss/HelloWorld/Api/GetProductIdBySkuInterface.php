<?php

namespace Bss\HelloWorld\Api;

interface GetProductIdBySkuInterface
{
    /**
     * Get product id by sku
     *
     * @param string $sku
     * @return array
     */
    public function getProductIdBySku($sku);
}
