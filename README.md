# Laravel Improved Resource Controllers
This simple package extends the ```php artisan make:controller``` command and generates
resource controllers with working resource functions out of the box to prevent you from writing 
the same basic controller functions over and over again.
Keep in mind the improved resource controllers are only meant as a starting point. 
You still have to add your own routes, validation, migrations, etc.

## Installation
Require the package with composer.
```
composer require timwassenburg/laravel-improved-resource-controllers
```

### Publish config (optional)
```
php artisan vendor:publish --provider="TimWassenburg\ImprovedResourceControllers\ImprovedResourceControllersServiceProvider" --tag="config"
```

### Publish stubs (optional)
To change the generated resource controllers you can override
the stubs and adjust it to your liking. The stubs will be stored in /resources/stubs.

```
php artisan vendor:publish --provider="TimWassenburg\ImprovedResourceControllers\ImprovedResourceControllersServiceProvider" --tag="stubs"
```

## Usage
The idea behind this package is that you can keep using the make:controller commands you are already used to. 
So no need to change your muscle memory. Checkout the example output to see the result for each command.

### Default resource controller
```
php artisan make:controller CustomerController --resource
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/DefaultResourceController.php)

### Default API resource controller
```
php artisan make:controller CustomerController --resource --api
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/DefaultApiResourceController.php)

### Model resource controller
```
php artisan make:controller CustomerController --resource --model=Customer
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/ModelResourceController.php)

### Model API resource controller
```
php artisan make:controller CustomerController --resource --model=Customer --api
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/ModelApiResourceController.php)

### Nested resource controller
```
php artisan make:controller CityController --resource --parent=Country --model=City
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/NestedResourceController.php)

### Nested API resource controller
```
php artisan make:controller CityController --resource --parent=Country --model=City --api
```
[Example output](https://github.com/timwassenburg/laravel-improved-resource-controllers/tree/master/examples/NestedApiResourceController.php)

### Variables
In the stubs you can use the following variables.

#### General
| Variable                  | Output                        |
| -------------             |-------------                  |
| {{ namespace }}           | App\Http\Controllers          |
| {{ namespacedModel }}     | App\Models\Order              |
| {{ class }}               | OrderController               |
| {{ model }}               | Order                         |
| {{ modelVariable }}       | order                         |
| {{ modelVariablePlural }} | orders                        |

#### With parent (--parent=Customer)
| Variable                          | Output                |
| -------------                     |-------------          |
| {{ namespacedParentModel }}       | App\Models\Customer   |
| {{ parentModelVariable }}         | customer              |
| {{ parentModelVariablePlural }}   | customers             |
