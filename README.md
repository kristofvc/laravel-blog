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

- Run `composer update`

