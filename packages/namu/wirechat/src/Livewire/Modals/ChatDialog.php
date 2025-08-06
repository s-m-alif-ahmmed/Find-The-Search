<?php

namespace Namu\WireChat\Livewire\Modals;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Reflector;
use Livewire\Component;
use Livewire\Mechanisms\ComponentRegistry;

class ChatDialog extends Component
{
    public ?string $activeComponent;

    public array $dialogComponents = [];

    public function resetState(): void
    {
        $this->dialogComponents = [];
        $this->activeComponent = null;
    }

    public function openChatDialog($component, $arguments = [], $modalAttributes = []): void
    {
        $componentClass = app(ComponentRegistry::class)->getClass($component);
        $id = md5($component.serialize($arguments));

        $arguments = collect($arguments)
            ->merge($this->resolveComponentProps($arguments, new $componentClass))
            ->all();

        $this->dialogComponents[$id] = [
            'name' => $component,
            'arguments' => $arguments,
            'modalAttributes' => array_merge(
                $componentClass::modalAttributes(), // Fetch reusable modal attributes
                $modalAttributes // Allow custom overrides
            ),
        ];

        $this->activeComponent = $id;

        $this->dispatch('activeDialogComponentChanged', id: $id);
    }

    public function resolveComponentProps(array $attributes, Component $component): Collection
    {
        return $this->getPublicPropertyTypes($component)
            ->intersectByKeys($attributes)
            ->map(function ($className, $propName) use ($attributes) {
                $resolved = $this->resolveParameter($attributes, $propName, $className);

                return $resolved;
            });
    }

    protected function resolveParameter($attributes, $parameterName, $parameterClassName)
    {
        $parameterValue = $attributes[$parameterName];

        if ($parameterValue instanceof UrlRoutable) {
            return $parameterValue;
        }

        if (enum_exists($parameterClassName)) {
            $enum = $parameterClassName::tryFrom($parameterValue);

            if ($enum !== null) {
                return $enum;
            }
        }

        $instance = app()->make($parameterClassName);

        if (! $model = $instance->resolveRouteBinding($parameterValue)) {
            throw (new ModelNotFoundException)->setModel(get_class($instance), [$parameterValue]);
        }

        return $model;
    }

    public function getPublicPropertyTypes($component): Collection
    {
        return collect($component->all())
            ->map(function ($value, $name) use ($component) {
                return Reflector::getParameterClassName(new \ReflectionProperty($component, $name));
            })
            ->filter();
    }

    public function destroyWireChatComponent($id): void
    {
        unset($this->dialogComponents[$id]);
    }

    public function getListeners(): array
    {
        return [
            'openChatDialog',
            'destroyWireChatComponent',
        ];
    }

    public function render()
    {
        return view('wirechat::livewire.modals.chat-dialog');
    }
}
