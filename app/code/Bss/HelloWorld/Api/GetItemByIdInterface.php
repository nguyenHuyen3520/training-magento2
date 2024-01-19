<?php

namespace Bss\HelloWorld\Api;

interface GetItemByIdInterface
{
    /**
     * Get item by ID
     *
     * @param string $id
     * @return int|null
     */
    public function getItemById($id);
}
