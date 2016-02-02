<?php

/**
 * @file
 * Contains \sanduhrs\JRD.
 */

namespace sanduhrs\JRD;

use sanduhrs\JRD\Member\Alias;
use sanduhrs\JRD\Member\Link;
use sanduhrs\JRD\Member\Property;
use sanduhrs\JRD\Member\Subject;
use JsonSerializable;

/**
 * JSON Resource Descriptor (JRD).
 *
 * @package sanduhrs\JRD
 */
class JRD implements JsonSerializable
{
    /**
     * A URI that identifies the entity that the JRD describes.
     *
     * @var string
     */
    protected $subject;

    /**
     * An array of URI strings that identify the same entity as the "subject" URI.
     *
     * @var array
     */
    protected $aliases;

    /**
     * Properties are used to convey additional information about the subject.
     *
     * @var array
     */
    protected $properties;

    /**
     * An array of link relation objects.
     *
     * @var array
     */
    protected $links;

    /**
     * JRD constructor.
     *
     * @param string $subject
     */
    public function __construct($subject = '')
    {
        $this->subject = '';
        $this->aliases = array();
        $this->properties = array();
        $this->links = array();

        if ($subject) {
            $this->setSubject($subject);
        }
    }

    /**
     * Set the subject.
     *
     * @param $uri
     * @return Subject
     */
    public function setSubject($uri)
    {
        $subject = new Subject($uri);
        $this->subject = $subject;
        return $subject;
    }

    /**
     * Get the subject.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set an alias.
     *
     * @param $uri
     * @return \sanduhrs\JRD\Member\Alias
     */
    public function setAlias($uri)
    {
        $alias = new Alias($uri);
        array_push($this->aliases, $alias);
        return $alias;
    }

    /**
     * Get aliases.
     *
     * @return array
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * Set a property.
     *
     * @param $name
     * @param $value
     * @return \sanduhrs\JRD\Member\Property
     */
    public function setProperty($name, $value)
    {
        $property = new Property($name, $value);
        array_push($this->properties, $property);
        return $property;
    }

    /**
     * Get a property.
     *
     * @param $name
     * @return mixed
     */
    public function getProperty($name)
    {
        return $this->properties[$name];
    }

    /**
     * Get properties.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set a link.
     *
     * @param $uri
     * @return \sanduhrs\JRD\Member\Link
     */
    public function setLink($uri)
    {
        $link = new Link($uri);
        array_push($this->links, $link);
        return $link;
    }

    /**
     * Get links.
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        // The subject.
        if (!empty($this->subject)) {
            $json['subject'] = (string) $this->getSubject();
        }

        // The subject's aliases.
        if (!empty($this->properties)) {
            $json['aliases'] = array();
            foreach ($this->getAliases() as $alias) {
                array_push($json['aliases'], (string) $alias);
            }
        }

        // The properties.
        if (!empty($this->properties)) {
            $json['properties'] = array();
            foreach ($this->getProperties() as $property) {
                array_push($json['properties'], array(
                    $property->getName() => $property->getValue()
                ));
            }
        }

        // The links.
        if (!empty($this->links)) {
            $json['links'] = array();
            foreach ($this->getLinks() as $link) {
                $object = (object) NULL;
                $object->rel = $link->getRel();
                $object->type = $link->getType();
                $object->href = $link->getHref();
                $object->titles = $link->getTitles();
                foreach ($link->getProperties() as $property) {
                    $object->properties[$property->getName()] = $property->getValue();
                }
                array_push($json['links'], $object);
            }
        }
        return $json;
    }
}
