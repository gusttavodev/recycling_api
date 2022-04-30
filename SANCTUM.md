# Install

Execute para instalar o pacote

```
    composer require laravel/sanctum
```

Execute para adicionar as migrations do sanctum

```
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

Execute suas migrations

```
    php artisan migrate
```


Adicione o Middleware do Sanctum ao Kernel do seu projeto
- app/Http/Kernel.php

```php
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
```

# Usando 
Para começar a emitir tokens para usuários, seu Model de User deve ter a Trait Laravel\Sanctum\HasApiTokens:

```php
use Laravel\Sanctum\HasApiTokens;
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```


Agora para emitir seu token pode usar o método createToken() que retorna uma instância Laravel\Sanctum\NewAccessToken.
Os tokens de API são hash usando o hash SHA-256 antes de serem armazenados em seu banco de dados, mas você pode acessar o valor de texto simples do token usando a propriedade plainTextToken da instância NewAccessToken. Você deve exibir esse valor para o usuário imediatamente após a criação do token

```php
use Illuminate\Http\Request;
 
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});
```


# Criando um sistema Auth
```
    php artisan make:controller AuthController
```

https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum
