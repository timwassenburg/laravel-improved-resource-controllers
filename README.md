<br />
<div align="center">
  <a href="https://github.com/timwassenburg/laravel-improved-resource-controllers">
    <img src="img/wrench.png" alt="Logo" width=120>
  </a>

<h1 align="center">Laravel Improved Resource Controllers</h1>

  <p align="center">
    Quickly generate resource controllers with code for your projects!
  </p>
<br><br>
</div>

## Table of Contents
  <ol>
    <li><a href="#features">Features</a></li>
    <li>
        <a href="#getting-started">Getting started</a>
        <ul>
            <li><a href="#installation">Installation</a></li>
            <li><a href="#publish-config-(optional)">Publish config (optional)</a></li>
            <li><a href="#publish-stubs-(optional)">Publish stubs (optional)</a></li>
        </ul>
    </li>
    <li>
      <a href="#usage">Usage</a>
      <ul>
        <li><a href="#default-resource-controller">Default resource controller</a></li>
        <li><a href="#default-api-resource-controller">Default API resource controller</a></li>
        <li><a href="#model-resource-controller">Model resource controller</a></li>
        <li><a href="#model-api-resource-controller">Model API resource controller</a></li>
        <li><a href="#nested-resource-controller">Nested resource controller</a></li>
        <li><a href="#nested-api-resource-controller">Nested API resource controller</a></li>
      </ul>
    </li>
    <li>
        <a href="#variables">Variables</a>
        <ul>
            <li><a href="#general">General</a></li>
            <li><a href="#with-parent-(--parent=customer)">With parent (--parent=Customer)</a></li>
        </ul>
    </li>
    <li><a href="#more-generator-packages">More generator packages</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
  </ol>

## Features
This simple package extends the ```php artisan make:controller``` command and generates
resource controllers with working resource functions out of the box to prevent you from writing 
the same basic controller functions over and over again.
Keep in mind the improved resource controllers are only meant as a starting point. 
You still have to add your own routes, validation, migrations, etc.

## Getting started

### Installation
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

## Variables
In the stubs you can use the following variables.

### General
| Variable                  | Output                        |
| -------------             |-------------                  |
| {{ namespace }}           | App\Http\Controllers          |
| {{ namespacedModel }}     | App\Models\Order              |
| {{ class }}               | OrderController               |
| {{ model }}               | Order                         |
| {{ modelVariable }}       | order                         |
| {{ modelVariablePlural }} | orders                        |

### With parent (--parent=Customer)
| Variable                          | Output                |
| -------------                     |-------------          |
| {{ namespacedParentModel }}       | App\Models\Customer   |
| {{ parentModelVariable }}         | customer              |
| {{ parentModelVariablePlural }}   | customers             |

## More generator packages
Looking for more ways to speed up your workflow? Make sure to check out these packages.

- [Laravel Repository Generator](https://github.com/timwassenburg/laravel-repository-generator)
- [Laravel Service Generator](https://github.com/timwassenburg/laravel-service-generator)
- [Laravel Action Generator](https://github.com/timwassenburg/laravel-action-generator)

## Contributing
Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
