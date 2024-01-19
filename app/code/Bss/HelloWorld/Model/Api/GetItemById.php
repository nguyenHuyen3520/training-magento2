<?php

namespace Bss\HelloWorld\Model\Api;

use Bss\HelloWorld\Api\GetItemByIdInterface;

class GetItemById implements GetItemByIdInterface
{
    /**
     * @var array
     */
    private $items = [
        ['id' => 1, 'name' => 'Item 1', 'class' => 'Class A'],
        ['id' => 2, 'name' => 'Item 2', 'class' => 'Class B'],
        ['id' => 3, 'name' => 'Item 3', 'class' => 'Class C'],
        ['id' => 4, 'name' => 'Item 4', 'class' => 'Class D'],
        ['id' => 5, 'name' => 'Item 5', 'class' => 'Class E'],
    ];

    /**
     * {@inheritdoc}
     */
    public function getItemById($id)
    {

        foreach ($this->items as $item) {
            if ($item['id'] == $id) {
                return json_encode($item);
            }
        }
        return ['error' => 'Item not found'];
    }
}
