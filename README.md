# About Api-mutiple-choice

Api-mutiple-choice is a web application
<br>

## Environment require

-   [Laravel 9](https://laravel.com/docs/9.x/releases)

-   [Laradock](https://laradock.io/)

-   [PHP 8.1](https://www.php.net/releases/8.1/en.php)

-   [MySql 8.0](https://dev.mysql.com/doc/relnotes/mysql/8.0/en/)
    <br>
    <br>

## Extended commands

```
    php artisan make:trait {name}
    php artisan make:service {name}
    php artisan make:enum {name}
    php artisan make:repository {folderName}
```

<br>

## Installation

Clone OneStack-Laravel repository

```bash
    git@github.com:manh-cuong61/backend_mutiple-choice-test.git
```

Clone and update git submodule

```bash
    git submodule init
    git submodule update --init --recursive
```

In Project folder

```bash
    cp .env.dev .env
```

Init & Run Laradock

-   Config .env of Laradock

```bash
    cp laradock.env.example laradock/.env
```

-   Run docker

```bash
    cd laradock
    docker-compose up -d nginx mysql workspace
```

-   In /laradock folder install composer

```bash
    docker-compose exec workspace bash
    composer install
```

-   Run migration

```bash
    docker-compose exec workspace php artisan migrate
```

-   See result

```
    open browser with url: http://localhost
```

<br>

## VsCode extensions

-   Prettier
-   EditorConfig for VS Code
-   PHP Intelephense
-   Laravel Ide Helper (optional)
-   Laravel extension pack (optional)
-   Auto close tag (optional)
-   Auto rename tag (optional)
    <br>

## Các quy định chung trong việc thực hiện code:

-   Đặt tên cho các key trả về của response theo định dạng snake_case. Ví dụ:

```
{
    data: {
        ...
    },
    message: '',
    error_code: ''
}
```

-   Quy định chung cho route resource (CRUD) tuân theo quy tắc của Laravel. Ví dụ: <br/>
    Method get: /users: List <br/>
    Method get: /users/1: Detail <br/>
    Method post: /users: Create <br/>
    Method put/patch: /users/1: Update <br/>
    Method delete: /users/1: Delete <br/>

-   Quy định đặt tên cho route theo định dạng kebab-case. Ví dụ: <br/>
    /users/change-name <br/>
    /users/change-password
