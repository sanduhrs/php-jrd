<?php

/**
 * @file
 * Contains \sanduhrs\Member\Subject.
 */

namespace sanduhrs\JRD\Member;

/**
 * Subject.
 *
 * @package sanduhrs\JRD
 */
class Subject
{
    /**
     * An URI string that identifies the entity.
     *
     * @var string
     */
    protected $subject;

    /**
     * Subject constructor.
     *
     * @param string $subject
     */
    public function __construct($subject = '')
    {
        $this->subject = '';

        if ($subject) {
            $this->setSubject($subject);
        }
    }

    /**
     * Set the subject.
     *
     * @param string $subject
     *   An URI string that identifies the entity.
     * @return Subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
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
     * Magic method
     *
     * @return string
     */
    public function __toString() {
        return $this->getSubject();
    }
}
