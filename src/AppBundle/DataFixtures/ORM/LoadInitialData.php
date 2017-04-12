<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use Blameable\Fixture\Document\Type;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadInitialData implements  ContainerAwareInterface, FixtureInterface
{
	/**
	 * @var ObjectManager
	 */
	private $em = null;

	/**
	 * The dependency injection container.
	 *
	 * @var ContainerInterface
	 */
	protected $container;

	public function load(ObjectManager $manager)
	{
		$this->em = $manager;
		$this->loadScript();
	}

	public function loadScript(){
		$filename = $this->container->get("kernel")->getRootDir().'/../src/AppBundle/DataFixtures/loadData.sql';
		$sql = file_get_contents($filename);
		$this->em->getConnection()->exec($sql);
		$this->em->flush();
	}


	/**
	 * {@inheritDoc}
	 */
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}
}