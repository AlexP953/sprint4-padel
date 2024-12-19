#!/bin/bash

# Salir en caso de error
set -e

# 1. Copiar el archivo .env.example a .env
echo "Copiando el archivo .env.example a .env..."
cp .env.example .env

# 2. Instalar dependencias PHP con Composer
echo "Instalando dependencias PHP con Composer..."
composer install

# 3. Instalar dependencias Node.js con npm
echo "Instalando dependencias Node.js con npm..."
npm install
npm run build

# 4. Generar la clave de la aplicación
echo "Generando la clave de la aplicación..."
php artisan key:generate

# 5. Crear la base de datos (padel)
# Asegúrate de que tienes un servidor de base de datos MySQL funcionando
echo "Creando la base de datos 'padel'..."
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS padel;"

# 6. Ejecutar migraciones y sembrar datos
echo "Ejecutando migraciones y sembrando datos..."
php artisan migrate:fresh --seed

# 7. Ejecutar npm run dev en segundo plano
echo "Ejecutando npm run dev..."
npm run dev &

# 8. Iniciar el servidor de Laravel
echo "Iniciando el servidor de Laravel..."
php artisan serve

echo "El entorno está listo. Puedes probar la aplicación con las siguientes credenciales:"
echo "Email: alexperis95@gmail.com"
echo "Contraseña: 1234"
