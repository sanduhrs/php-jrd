<?php

/**
 * @file
 * Contains \sanduhrs\Member\Link.
 */

namespace sanduhrs\JRD;

/**
 * Link.
 *
 * @package sanduhrs\JRD
 */
class Link
{
    /**
     * The relation type.
     *
     * The value of the "rel" member is a string that is either a URI or a
     * registered relation type. The URI or registered relation type identifies
     * the type of the link relation.
     * @see https://tools.ietf.org/html/rfc5988
     *
     * @var string
     */
    protected $rel;

    /**
     * The media type of the result.
     *
     * The value of the "type" member is a string that indicates the media type of
     * the target resource.
     * @see https://tools.ietf.org/html/rfc6838
     *
     * @var string
     */
    protected $type;

    /**
     * The target URI.
     *
     * The value of the "href" member is a string that contains a URI pointing to
     * the target resource.
     *
     * @var string
     */
    protected $href;

    /**
     * An array of link titles, one per language.
     *
     * @var array
     */
    protected $titles;

    /**
     * An array of properties.
     *
     * @var array
     */
    protected $properties;

    /**
     * Link constructor.
     *
     * @param $rel
     *   The relation type.
     */
    public function __construct($rel)
    {
        $this->rel = '';
        $this->type = '';
        $this->href = '';
        $this->titles = array();
        $this->properties = array();

        $this->setRel($rel);
    }

    /**
     * Set the relation type.
     *
     * @param $rel
     * @return Link
     */
    public function setRel($rel)
    {
        $this->rel = $rel;
        return $this;
    }

    /**
     * Get the relation type.
     *
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set the media type of the target resource.
     *
     * @param $type
     * @return Link
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the media type of the target resource.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the URI of the target resource.
     *
     * @param $href
     * @return Link
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Get the URI of the target resource.
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set the title.
     *
     * @param $title
     * @param string $language
     * @return Link
     */
    public function setTitle($title, $language = 'und')
    {
        array_push($this->titles, array($language => $title));
        return $this;
    }

    /**
     * Get the title.
     *
     * @return array
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * Get the title.
     *
     * @return array
     */
    public function getTitle($language = 'und')
    {
        return $this->titles[$language];
    }

    /**
     * Set a property.
     *
     * @param $name
     * @param $value
     * @return Link
     */
    public function setProperty($name, $value)
    {
        array_push($this->properties, new Property($name, $value));
        return $this;
    }

    /**
     * Get the properties.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
