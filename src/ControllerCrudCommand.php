<?php

namespace TimWassenburg\ImprovedResourceControllers;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;

class ControllerCrudCommand extends ControllerMakeCommand
{
    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in the base namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $replace = [];

        if ($this->option('crud') || config('crud.use_by_default')) {
            $replace = $this->buildCrudReplacements($replace, $name);
        }

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

    /**
     * @return array
     */
    protected function buildParentReplacements()
    {
        $replace = parent::buildParentReplacements();

        $parentModelVariable = $replace['{{ parentModelVariable }}'];
        $replace['{{ parentModelVariablePlural }}'] = Str::plural($parentModelVariable);

        return $replace;
    }

    /**
     * @return mixed
     */
    protected function buildCrudReplacements($replace, $name)
    {
        $controllerName = str_replace($this->getNamespace($name).'\\', '', $name);
        $modelName = $replace['{{ model }}'] ?? str_replace('Controller', '', $controllerName);
        $modelName = Str::singular($modelName);
        ($this->option('model') || $this->option('empty')) ?: $this->checkIfModelExists($modelName);

        $replace['{{ model }}'] = $modelName;
        $replace['{{ namespacedModel }}'] = config('crud.model_namespace').$modelName;
        $replace['{{ modelVariable }}'] = Str::singular(Str::camel($modelName));
        $replace['{{ modelVariablePlural }}'] = Str::plural(Str::camel($modelName));

        return $replace;
    }

    protected function checkIfModelExists($modelName)
    {
        $modelClass = $this->parseModel($modelName);

        if (! class_exists($modelClass)) {
            if ($this->confirm("A {$modelClass} model does not exist. Do you want to generate it?", true)) {
                $this->runCommand('make:model', ['name' => $modelClass], new ConsoleOutput);
            }
        }
    }

    /**
     * @return array|array[]
     */
    protected function getOptions()
    {
        $options = parent::getOptions();
        $options[] = ['crud', 'c', InputOption::VALUE_NONE, 'Generate a crud controller class.'];
        $options[] = ['empty', 'e', InputOption::VALUE_NONE, 'Generate a empty resource controller class.'];

        return $options;
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        if ($this->option('empty')) {
            return parent::resolveStubPath($stub);
        }

        if (file_exists(app('path.resources').$stub)) {
            return app('path.resources').$stub;
        }

        if ($this->option('crud') || config('crud.use_by_default')) {
            return __DIR__.'/..'.$stub;
        }

        return parent::resolveStubPath($stub);
    }
}
