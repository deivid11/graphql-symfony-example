<?php
namespace AppBundle\GraphQL\Types\State;

use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\Municipality\MunicipalityType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class StateType extends AbstractObjectType {

	public function build( $config ) {
		$config->addFields([
			'id'=> [
				'type'=>new IdType(),
				'decription'=>'Unique Id of State',
				'args'=>[
					'id' => new IntType()
				],
			],
			'name' => new StringType(),
			'country' => new CountryType(),
			'municipalities' => new ListType(new MunicipalityType()),
			'code' => new StringType(),
			'isActive' => new BooleanType(),
		]);
	}
}