<?php
namespace AppBundle\GraphQL\Types\Country;

use AppBundle\GraphQL\Types\State\Fields\StatesField;
use AppBundle\GraphQL\Types\State\StateType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CountryType extends AbstractObjectType {

	public function build( $config ) {
		$config->addFields([
			'id'=> [
				'type'=>new IdType(),
				'decription'=>'Unique Id of country',
				'args'=>[
					'id' => new IntType()
				],
			],
			'code' => new StringType(),
			'name' => new StringType(),
			'states' => new ListType(new StateType()),
			'isActive' => new BooleanType(),
		]);
	}
}