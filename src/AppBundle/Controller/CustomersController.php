<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerType;
use FOS\RestBundle\Controller\Annotations as FOSRestBundleAnnotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @FOSRestBundleAnnotations\View()
 */
class CustomersController extends FOSRestController implements ClassResourceInterface
{

    public function cgetAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository("AppBundle:Customer");
        $customers = $repository->findAll();

        return $customers;
    }

    public function getAction(Customer $customer)
    {
        return $customer;
    }

    public function postAction(Request $request)
    {
        $customer = new Customer();
        $customerForm = $this->createForm(new CustomerType(), $customer);

        $customerForm->handleRequest($request);

        if ($customerForm->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($customer);
            $em->flush();

            return $customer;
        }

        return $customerForm->getErrors();
    }
}