<?php

namespace Customer;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Customer
 */
class Customer extends BaseUser
{

    /**
     * @var string
     */
    protected $id;

    /**
     * Customer constructor.
     * @param $id
     */
    public function __construct()
    {
        $this->id = $this->id ? $this->id : uniqid();
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}