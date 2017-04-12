<?php
namespace AppBundle\GraphQL\Types\Country\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;


class CountryField extends AbstractField {
	public function __construct( array $config = [] ) {
		$config["args"]= [
			'id' =>
				['type' => new NonNullType(new IdType()),
					'description' => 'Unique Country Id'
				],
		];
		parent::__construct( $config );
	}

	public function getType() {
		return  new CountryType();
	}

	public function resolve($value, array $args, ResolveInfo $info ) {
		$repo =$this->getEntityManager()->getRepository("AppBundle:Country");
		$country = $repo->findOneBy(['id'=>$args['id']]);
		return $country;
	}
}