<?php
namespace AppBundle\GraphQL\Types\Municipality;

use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\State\StateType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class MunicipalityType extends AbstractObjectType {

	public function build( $config ) {
		$config->addFields([
			'id'=> [
				'type'=>new IdType(),
				'decription'=>'Unique Id of Municipality'
			],
			'name' => new StringType(),
			'state' => new StateType(),
			'isActive' => new BooleanType()
		]);
	}
}