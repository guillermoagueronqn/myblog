# :computer: PWA 2024

- **Trabajo Práctico 3: Laravel**

> En este proyecto se desarrolló una aplicación web utilizando el framework [Laravel](https://laravel.com). La aplicación consiste en un blog que puede ser adaptable a distintos dominios, ya que permite a los usuarios explorar contenido organizado en diferentes categorías, y ofrece herramientas para la gestión y actualización constante de los posts.

> Como trabajo adicional, se implementó [Laravel Lang](https://laravel-lang.com/installation.html) y [Tailwind Dark Mode](https://tailwindcss.com/docs/dark-mode), permitiendo al usuario modificar dinámicamente el idioma y el tema de cualquier vista del proyecto. A su vez, se trató el proceso de baja de un posteo en dos pasos, permitiendo al usuario enviar un posteo a una papelera, en la cual podrá tomar como última decisión recuperar o eliminar dicho posteo.

## :office: Universidad Nacional del Comahue - Facultad de Informática

- **Carrera:** Tecnicatura Universitaria en Desarrollo Web
- **Materia:** Programación Web Avanzada
- **Año:** 2024

## :muscle: Integrantes (Grupo X)

| Nombre                              |  Legajo    | Mail                                     | GitHub                                                      |
|:-----------------------------------:|:----------:|:----------------------------------------:|:-----------------------------------------------------------:|
| **Agüero Mendez, Guillermo Andres** | FAI-3844   | guillermo.aguero@est.fi.uncoma.edu.ar    | [guillermoagueronqn](https://github.com/guillermoagueronqn)|
| **Herrera, Julio Federico**         | FAI-4285   | julio.herrera@est.fi.uncoma.edu.ar       | [ELHACHESALTA](https://github.com/ELHACHESALTA)             |

## :wrench: :gear: Guía de instalación

1. Abrir una nueva terminal y clonar el repositorio ejecutando el comando: `git clone https://github.com/guillermoagueronqn/myblog.git`
    - Necesario tener instalado [git](https://git-scm.com/download/win)  
2. Acceder a la carpeta del repositorio mediante el comando: `cd myblog`  
3. Instalar [XAMPP](https://www.apachefriends.org/es/index.html)  
4. Instalar [Composer](https://getcomposer.org/)  
5. Abrir Panel de XAMPP e iniciar el módulo Apache y MySQL, dándole en el botón Start en ambos  
6. Crear base de datos MySQL con nombre `myblog`  
7. Ejecutar el comando `php artisan migrate:fresh`, para crear las tablas necesarias para el proyecto en la base de datos    
8. Ejecutar el comando `npm install`, para instalar las dependencias necesarias de Node.js  
9. Ejecutar el comando `composer install`, para instalar las dependencias necesarias de Composer  
10. Ejecutar el comando `npm run dev`, que gestiona los script de Node.js, compilando el código e iniciando un servidor de desarrollo  
11. Abrir una nueva terminal y ejecutar el comando `php artisan serve`, que inicia el servidor de desarrollo de Laravel  
12. Abrir el proyecto en un navegador desde la dirección [localhost:8000](http://localhost:8000/)