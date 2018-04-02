<?php

namespace jbangy\infrastructure\representation;

abstract class Representation
{
    public function convertAll(array $items, array $fields = []): array
    {
        $fields = empty($fields) ? $this->getDefaultFields() : $fields;
        return array_map(function ($item) use ($fields) {
            return $this->convert($item, $fields);
        }, $items);
    }

    public abstract function getDefaultFields(): array;

    public function convert($item, array $fields = []): array
    {
        $fields = empty($fields) ? $this->getDefaultFields() : $fields;
        $result = [];
        $fieldsConversion = $this->getFieldsConversion();
        foreach ($fields as $field) {
            if (array_key_exists($field, $fieldsConversion)) {
                $result[$field] = $fieldsConversion[$field]($item);
            }
        }
        return $result;
    }

    public abstract function getFieldsConversion(): array;
}