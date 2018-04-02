<?php

namespace jbangy\utils;

use PHPUnit\Framework\TestCase;

class ParameterTest extends TestCase
{
    public function testExtractFieldsReturnsArray()
    {
        $result = Parameter::extractFields("field1");
        $this->assertThat($result, $this->equalTo(["field1"]));
    }

    public function testExtractFieldsReturnsArrayContainingCommaSeparatedValues()
    {
        $result = Parameter::extractFields("field1,field2");
        $this->assertThat($result, $this->equalTo(["field1", "field2"]));
    }

    public function testExtractFieldsReturnsTrimValues()
    {
        $result = Parameter::extractFields("field1 , field2");
        $this->assertThat($result, $this->equalTo(["field1", "field2"]));
    }

    public function testExtractFieldsWithEmptyReturnsEmptyArray()
    {
        $result = Parameter::extractFields("");
        $this->assertThat($result, $this->equalTo([]));
    }

    public function testExtractFieldsWithNullReturnsEmptyArray()
    {
        $result = Parameter::extractFields(null);
        $this->assertThat($result, $this->equalTo([]));
    }
}