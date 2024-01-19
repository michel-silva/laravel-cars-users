<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel cars users

Passos para rodar o projeto em localhost:

1 - Clonar o repositorio:
```
git clone https://github.com/michel-silva/laravel-cars-users.git && cd laravel-cars-users
```

2 - Criar arquivo .env
```
cp .env.example .env
```

3 - Criar o banco no MySQL (ex: laravel_cars_users) e incluir os parametros de conexão no .env

4 - Instalar as dependencias
```
composer install
```

5 - Gerar chave de encriptação
```
php artisan key:generate
```

6 - Rodar as migrations
```
php artisan migrate --seed
```

7 - Rodar os testes
```
php artisan test
```

8 - Iniciar o servidor local
```
php artisan serve
```

## Rotas da aplicação

Rotas publicas de autenticação:
```
POST - http://localhost:8000/api/register
POST - http://localhost:8000/api/login
POST - http://localhost:8000/api/logout (privada)
```

Rota privadas para recuperar as marcas e modelos de carros:
```
GET - http://localhost:8000/api/brand
```

Rotas privadas para manipulação dos carros:
```
GET - http://localhost:8000/api/car
GET - http://localhost:8000/api/car/{id}
POST - http://localhost:8000/api/car
PUT - http://localhost:8000/api/car/{id}
DELETE - http://localhost:8000/api/car/{id}
```

Rotas privadas para manipulação dos usuarios:
```
GET - http://localhost:8000/api/user
GET - http://localhost:8000/api/user/{id}
POST - http://localhost:8000/api/user
PUT - http://localhost:8000/api/user/{id}
DELETE - http://localhost:8000/api/user/{id}

GET - http://localhost:8000/api/user/{id}/cars
POST - http://localhost:8000/api/user/assignCar
POST - http://localhost:8000/api/user/unassignCar
```