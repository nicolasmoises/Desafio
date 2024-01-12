Este proyecto es un sistema de gestión desarrollado en Laravel y utiliza Filament como interfaz de administración. El objetivo principal es administrar la información de los estudiantes en una universidad, permitiendo el registro de estudiantes, carreras, materias y usuarios. Además, el sistema facilita la vinculación de estudiantes con carreras específicas y lleva un registro histórico de su progreso académico.

Requisitos del Sistema
Asegúrate de tener instalados los siguientes requisitos en tu entorno de desarrollo:

PHP >= 7.3
Composer
Laravel >= 8.x
Filament >= 1.x
Instalación
Clona el repositorio:

bash
Copy code
git clone https://github.com/tu-usuario/universidad-system.git
Accede al directorio del proyecto:

bash
Copy code
cd universidad-system
Instala las dependencias:

bash
Copy code
composer install
Copia el archivo de configuración:

bash
Copy code
cp .env.example .env
Genera la clave de la aplicación:

bash
Copy code
php artisan key:generate
Configura tu base de datos en el archivo .env:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=usuario_de_tu_base_de_datos
DB_PASSWORD=contraseña_de_tu_base_de_datos
Ejecuta las migraciones y las semillas:

bash
Copy code
php artisan migrate --seed
Uso
Inicia el servidor de desarrollo:

bash
Copy code
php artisan serve
Accede a la interfaz de administración de Filament en http://localhost:8000/filament e inicia sesión con las credenciales predeterminadas.

Explora las diversas funcionalidades del sistema, como el registro de estudiantes, carreras, materias y usuarios.