<?php

namespace jbangy\infrastructure\representation\json;

use jbangy\infrastructure\representation\Representation;

class JsonUserRepresentation extends Representation
{
    public function getFieldsConversion(): array
    {
        return [
            'id' => function ($item) {
                return $item->getId();
            },
            'firstname' => function ($item) {
                return $item->getFirstname();
            },
            'surname' => function ($item) {
                return $item->getSurname();
            },
        ];
    }

    public function getDefaultFields(): array
    {
        return [
            'id',
            'firstname',
            'surname',
        ];
    }
}