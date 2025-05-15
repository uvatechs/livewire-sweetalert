# Livewire SweetAlert

A simple reusable package to integrate SweetAlert2 with Laravel Livewire.

## Installation

1. Add the package to your Laravel app (if locally linked):

```bash
composer require uvatechs/livewire-sweetalert
```

2. Add component to your layout:

```blade
<livewire:sweet-alert />
```

3. Use the trait in your Livewire components:

```php
use Uvatechs\\LivewireSweetAlert\\Traits\\WithSweetAlert;

class SomeComponent extends Component
{
    use WithSweetAlert;

    public function save()
    {
        $this->alert('Saved!', 'Item saved successfully.', 'success');
    }
}
```

4. Trigger confirmation dialogs:

```php
$this->confirm('deleteConfirmed', ['id' => $id], [
            'title' => 'Are you sure?',
            'text' => 'This action cannot be undone.',
        ]);
```

```php
public function deleteConfirmed($id)
    {
        // Handle confirmed deletion...
    }
```

## Publishing Views

```bash
php artisan vendor:publish --tag=views
```
### Contributing

Contributions are welcome! Feel free to open issues or submit pull requests.


### License

This package is open-sourced software licensed under the MIT license.