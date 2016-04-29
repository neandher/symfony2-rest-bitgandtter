<?php

namespace AppBundle\Entity;

use Customer\Customer as CustomerBase;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer ORM Entity
 *
 * @Serializer\XmlRoot("customer")
 *
 * @Hateoas\Relation("self", href=@Hateoas\Route("get_customers", parameters={"customer" = "expr(object.getId())"}))
 * @Hateoas\Relation("customers", href = @Hateoas\Route("cget_customers"))))
 */
class Customer extends CustomerBase
{

}
