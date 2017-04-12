<?php
namespace AppBundle\GraphQL\Types;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Field\AbstractField as BaseAbstractField;


abstract class AbstractField  extends BaseAbstractField implements ContainerAwareInterface
{
	use ContainerAwareTrait;

	/**
	 * Shortcut to return the Doctrine Registry service.
	 *
	 * @return Registry
	 *
	 * @throws \LogicException If DoctrineBundle is not available
	 */
	protected function getDoctrine()
	{
		if (!$this->container->has('doctrine')) {
			throw new \LogicException('The DoctrineBundle is not registered in your application.');
		}

		return $this->container->get('doctrine');
	}

	/**
	 * @return EntityManager
	 */
	protected function getEntityManager(){
		$em = $this->getDoctrine()->getManager();
		return $em;
	}
}