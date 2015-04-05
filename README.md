# Laravel Blog

This is my first project with Laravel. Steps will be written below.

## Set-up project

- Start with the ansible folder and the Vagrantfile deliver with this project
- Run `vagrant up` 
- Run `vagrant ssh`
- `cd /vagrant` 
- Run `composer create-project laravel/laravel --prefer-dist laravel`
- Copy all contents of the now created /vagrant/laravel folder to /vagrant/
- Delete the vendor dir
- Add this to `composer.json`:

```json
    "config": {
        ...,
    	"bin-dir": "bin"
    }
```

- Add the following required package to composer `"illuminate/html": "~5.0"`
- Run `composer update`

## Start to build the contact form

- Add `'Illuminate\Html\HtmlServiceProvider'` to `config/app.php` to the providers array
- Add the following to the aliases array in `config/app.php` 
 
 ```php 
    'Form'      => 'Illuminate\Html\FormFacade',
    'HTML'      => 'Illuminate\Html\HtmlFacade'
 ``` 

- Add a controller by running `php artisan make:controller --plain Contact` 
- Add some routes to `app/Http/routes.php

```php
    Route::get('contact', 
      ['as' => 'contact', 'uses' => 'AboutController@create']);
    Route::post('contact', 
      ['as' => 'contact_store', 'uses' => 'AboutController@store']);
```

- Add a template to `resources/views/contact/create.blade.php` from the file delivered with this project

- Add some methodes to your Contact-controller:

```php
    public function create()
    {
        return view('about.contact');
    }
    
    public function store()
    {
        return \Redirect::route('contact')
              ->with('message', 'Thank you for contacting us!');
    }
```

- Add a app/Http/Requests/ContactFormRequest class by running `php artisan make:request ContactFormRequest` and return true in the authorize method
- Add some rules

```php 
    public function rules()
    {
      return [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
      ];
    }
```