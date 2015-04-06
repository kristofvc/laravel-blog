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
      ['as' => 'contact', 'uses' => 'Contact@create']);
    Route::post('contact', 
      ['as' => 'contact_store', 'uses' => 'Contact@store']);
```

- Add a template to `resources/views/contact/create.blade.php` from the file delivered with this project

- Add some methods to your Contact-controller:

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

## Starting the blog by adding post with title and body

- Start by executing same steps as for the contact-form
- Run `php artisan make:model BlogPost`
- Add fields to the created BlogPost
- Add a fillable array to your model

```php
    protected $fillable = ['title', 'body'];
``` 

- Change the database config in `config/database.php`

```php 
        'mysql' => [
			'driver'    => 'mysql',
			'host'      => env('DB_HOST', 'localhost'),
			'database'  => env('DB_DATABASE', 'laravelblog'),
			'username'  => env('DB_USERNAME', 'root'),
			'password'  => env('DB_PASSWORD', 'root'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'strict'    => false,
		],    
``` 

- Add fields to the `CreateBlogPostsTable` class
- Run `php artisan migrate` 