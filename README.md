graphql-symfony-example
=======================

 
This project is running with a mysql database, GraphQL can work with any database and ORM or ODM.

The database structure is a simple Country-State-Municipality, types and field are defined in a folder per Entity.

This is the graphQL bunlde used in this example [youshidobundle](https://github.com/Youshido/GraphQLBundle)
 
## Install
```
composer install
```
```
php bin/console doctrine:database:create
```
```
php bin/console doctrine:schema:update --force
```
```
php bin/console doctrine:fixtures:load
```
```
php bin/console assets:install --symlink
```

## Run
```
php bin/console server:start
``` 
Go to http://127.0.0.1:8000/graphql/explorer

## Security
In AppBundle\Security\GraphQLVoter you can set the permissions to root queries, im not using field permissions becasuse increase server load.
```php
	private $permissions = [
		"__schema" => "*",
		"countries" => "*",
		"country" => "*",
		"states" => "*",
		"state" => ["ROLE_USER"],
		"municipality" => ["ROLE_ADMIN", "ROLE_IDK]
	];
```
## Sample query
```
{
  municipalities{
    id
    name
    isActive
   	state{
      id
      name
      country{
        id
        name
        code
      }
    }
  }
}
```
Response:
```
{
  "data": {
    "municipalities": [
      {
        "id": "1",
        "name": "Abala",
        "isActive": false,
        "state": {
          "id": "31",
          "name": "Yucatan",
          "country": {
            "id": "435",
            "name": "México",
            "code": null
          }
        }
      },
      ...
```