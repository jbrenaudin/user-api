<?php

namespace jbangy\infrastructure\representation\json;

use jbangy\infrastructure\representation\Representation;
use jbangy\infrastructure\representation\Representations;

class JsonRepresentations extends Representations
{
    /**
     * @return Representation
     */
    public function ofUser()
    {
        return new JsonUserRepresentation();
    }
}