<?php

/**
 * @file
 * Contains \sanduhrs\Member\Alias.
 */

namespace sanduhrs\JRD;

/**
 * Alias.
 *
 * @package sanduhrs\JRD
 */
class Alias
{
    /**
     * An URI string that identifies the same entity as the subject.
     *
     * @var string
     */
    protected $alias;

    /**
     * Subject constructor.
     *
     * @param string $uri
     */
    public function __construct($uri = '')
    {
        $this->alias = '';

        if ($uri) {
            $this->setAlias($uri);
        }
    }

    /**
     * Set the alias.
     *
     * @param string $uri;
     *   An URI string that identifies the entity.
     * @return Alias
     */
    public function setAlias($uri)
    {
        $this->alias = $uri;
        return $this;
    }

    /**
     * Get the alias.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Magic method
     *
     * @return string
     */
    public function __toString() {
        return $this->getAlias();
    }
}
