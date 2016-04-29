<?php

namespace Customer;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

class AuthCode extends BaseAuthCode
{
    protected $id;
    protected $client;
    protected $customer;
}