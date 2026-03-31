<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca de Laravel

Laravel es un framework para aplicaciones web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia placentera y creativa para ser verdaderamente gratificante. El marco de trabajo de se basa en el patrón arquitectónico <strong> Modelo-Vista-Controlador (MVC)</strong>. Este patrón de diseño organiza el código de la aplicación en tres componentes distintos e interconectados, promoviendo la separación de responsabilidades, lo que da como resultado un código más limpio, modular y fácil de mantener.

## Requisitos

Este proyecto requiere que estés utilizando PHP > 8.2 y Laravel 11.31 o superior

## Como usar

1. Instalamos las dependencias con:

```bash
composer install
```

2. Ejecutamos las migraciones de laravel:

```bash
php artisan migrate
```

3. Creamos la api key de la aplicacion:

```bash
php artisan key:generate
```

4. Montamos el servidor con:

```bash
php artisan serve
```

o

```bash
composer run dev
```

## Modelos

En <span style="color:green">app/models/Contact.php</span>

```bash
type Genero = "femenino" | "masculino" | "otro";
type EstadoCivil = "soltero" | "casado" | "divorciado" | "viudo";

interface Contact {
  cedula: string;
  nombre: string;
  apellido: string;
  edad: number;
  genero: Genero;
  numero_telefono: string[];
  correo_electronico: string[];
  estado_civil: EstadoCivil;
  direccion: string;
  departamento: string;
  cargo: string;
}
```
