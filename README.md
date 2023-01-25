# PsicolAcademy Prueba Tecnica

### Dependencias

-   Xampp 8+
-   Composer

### Instalacion

1. Clonar repositorio

2. Abrir el proyecto en la consola de preferencia

3. Instalamos las dependencias, ejecutamos el siguiente comando: `composer install`

4. Configuramos el archivo .env

5. Generamos una key: `php artisan key:generate`

6. Ejecutamos las migraciones: `php artisan migrate:fresh --seed`

7. Para ingresar al proyecto, escribimos en el navegador `localhost/psicolacademy/public`

<br>

# Descripcion

Este proyecto es una aplicacion Monolitica y la vez contiene todos los endpoints para funcionar como API REST.

<br>

## Aplicacion monolitca

<br>

### Tecnologias

-   Bootstrap 5
-   Laravel 9
-   Blade
-   JavaScript
-   CkEditor
-   DataTable
-   MySQL
-   ChartJs
-   DomPdf

<br>

## API

<br>

`Para usar utiilizar los endpoints es necesario que la que la peticion contenga un token Bearer Authentication. Cuando un usuario inicia sesion se le retorna un token.`

<br>

## Autentificacion:

<br>

-   La ruta para hacer login es: [localhost/psicolacademy/public/api/login](localhost/psicolacademy/public/api/login), metodo POST, requiere de dos parametros email y password. Retorna un mensaje de login exitoso y el token del usuario.

<br>

## Usuarios

<br>

1. Todas los usuarios:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/usuarios](localhost/psicolacademy/public/api/usuarios)

2. Ver un usuario, Recibe como parametro el id del usuario:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/usuarios/3](localhost/psicolacademy/public/api/usuarios/3)

3. Crear un usuario, recibe como parametros: name, email, password, rol_id [ 1, 2, 3].

    Metodo POST, Ruta: [localhost/psicolacademy/public/api/usuarios](localhost/psicolacademy/public/api/usuarios)

<br>

## Estudiantes

<br>

1. Todos los estudiantes:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/estudiantes](localhost/psicolacademy/public/api/estudiantes)

2. Ver un estudiante, Recibe como parametro el id del estudiante

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/estudiantes/1](localhost/psicolacademy/public/api/estudiantes/1)

3. Editar un estudiante, Recibe como parametro el id del estudiante

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/estudiantes/1/edit](localhost/psicolacademy/public/api/estudiantes/1/edit)

4. Crear un estudiante, recibe como parametros: documento, nombres, apellidos, telefono, email, direccion, departamento, ciudad.

    Metodo POST, Ruta: [localhost/psicolacademy/public/api/estudiantes](localhost/psicolacademy/public/api/estudiantes)

5. Actualizar un estudiante, recibe como parametros: documento, nombres, apellidos, telefono, email, direccion, departamento, ciudad, estado y el id del estudiante en la url.

    Metodo PUT, Ruta: [localhost/psicolacademy/public/api/estudiantes/1](localhost/psicolacademy/public/api/estudiantes/1)

<br>

## Profesores

<br>

1. Todos los profesores:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/profesores](localhost/psicolacademy/public/api/profesores)

2. Ver un profesor, Recibe como parametro el id del profesor

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/profesores/1](localhost/psicolacademy/public/api/profesores/1)

3. Editar un profesor, Recibe como parametro el id del profesor

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/profesores/1/edit](localhost/psicolacademy/public/api/profesores/1/edit)

4. Crear un profesor, recibe como parametros: documento, nombres, apellidos, telefono, email, direccion, departamento, ciudad.

    Metodo POST, Ruta: [localhost/psicolacademy/public/api/profesores](localhost/psicolacademy/public/api/profesores)

5. Actualizar un profesor, recibe como parametros: documento, nombres, apellidos, telefono, email, direccion, departamento, ciudad, estado y el id del profesor en la url.

    Metodo PUT, Ruta: [localhost/psicolacademy/public/api/profesores/1](localhost/psicolacademy/public/api/profesores/1)

<br>

## Asignaturas

<br>

1. Todos las asignaturas:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/asignaturas](localhost/psicolacademy/public/api/asignaturas)

2. Ver una asignatura, Recibe como parametro el id de la asignatura

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/asignaturas/1](localhost/psicolacademy/public/api/asignaturas/1)

3. Editar un asignatura, Recibe como parametro el id de la asignatura

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/asignaturas/1/edit](localhost/psicolacademy/public/api/asignaturas/1/edit)

4. Crear una asignatura, recibe como parametros: nombre, area_id, descripcion, creditos, tipo_asignatura [ 1, 2].

    Metodo POST, Ruta: [localhost/psicolacademy/public/api/asignaturas](localhost/psicolacademy/public/api/asignaturas)

5. Actualizar una asignatura, recibe como parametros: nombre, area_id, descripcion, creditos, tipo_asignatura, estado y el id de la asignatura en la url.

    Metodo PUT, Ruta: [localhost/psicolacademy/public/api/asignaturas/1](localhost/psicolacademy/public/api/asignaturas/1)

<br>

## Clases

<br>

1. Todas las clases activas:

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/clases](localhost/psicolacademy/public/api/clases)

2. Ver una clase, Recibe como parametro el id de la clase

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/clases/1](localhost/psicolacademy/public/api/clases/1)

3. Editar una clase, Recibe como parametro el id de la clase

    Metodo GET, Ruta: [localhost/psicolacademy/public/api/clases/1/edit](localhost/psicolacademy/public/api/clases/1/edit)

4. Crear una clase, recibe como parametros: profesor_id, asignatura_id, hora_inicio, hora_fin.

    Metodo POST, Ruta: [localhost/psicolacademy/public/api/clases](localhost/psicolacademy/public/api/clases)

5. Actualizar una clase, recibe como parametros: profesor_id, asignatura_id, hora_inicio, hora_fin, estado y el id de la clase en la url.

    Metodo PUT, Ruta: [localhost/psicolacademy/public/api/clases/1](localhost/psicolacademy/public/api/clases/1)
