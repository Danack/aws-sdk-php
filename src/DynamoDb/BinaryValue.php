<?php
namespace Aws\DynamoDb;

use GuzzleHttp\Stream\Stream;

/**
 * Special object to represent a DynamoDB binary (B) value.
 */
class BinaryValue implements \JsonSerializable
{
    /** @var string Binary value. */
    private $value;

    /**
     * string|resource|Stream $value A binary value.
     */
    public function __construct($value)
    {
        if (!is_string($value)) {
            $value = Stream::factory($value);
        }
        $this->value = (string) $value;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
