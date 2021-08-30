# Laravel improved resource controllers

This simple package extends the ```php artisan make:controller``` command and generates
resource controllers with working resource functions out of the box to prevent you from writing 
the same basic controller functions over and over again.
Keep in mind the improved resource controllers are only meant as a starting point. 
You still have to add your own routes, validation, migrations, etc.

## Installation
Require this package with composer. It is recommended to only require the package for development.
```
composer require timwassenburg/improved-resource-controllers --dev
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

### Default API resource controller
```
php artisan make:controller CustomerController --resource --api
```

### Model resource controller
```
php artisan make:controller CustomerController --resource --model=Customer
```

### Model API resource controller
```
php artisan make:controller CustomerController --resource --model=Customer --api
```

### Nested resource controller
```
php artisan make:controller CityController --resource --parent=Country --model=City
```

### Nested API resource controller
```
php artisan make:controller CityController --resource --parent=Country --model=City --api
```

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
