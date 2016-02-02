<?php

/**
 * @file
 * Contains \sanduhrs\Member\Property.
 */

namespace sanduhrs\JRD\Member;

/**
 * Property.
 *
 * @package sanduhrs\JRD
 */
class Property
{
    /**
     * The property identifier.
     *
     * @var string
     */
    protected $name;

    /**
     * The property value.
     *
     * @var string
     */
    protected $value;

    /**
     * Property constructor.
     *
     * @param string $name
     * @param string $value
     */
    public function __construct($name = '', $value = '')
    {
        $this->name = '';
        $this->value = '';

        if ($name) {
            $this->setName($name);
        }

        if ($value) {
            $this->setValue($value);
        }
    }

    /**
     * Set the property identifier.
     *
     * @param $name
     * @return Property
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the property identifier.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the property value.
     *
     * @param $value
     * @return Property
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the property value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
