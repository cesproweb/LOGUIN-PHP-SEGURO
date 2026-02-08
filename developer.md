# 📘 Manual Técnico para Desarrolladores — Login Seguro en PHP

Este documento describe la arquitectura interna del proyecto, su funcionamiento técnico y las pautas necesarias para extenderlo o modificarlo correctamente.

---

# 🧱 1. Arquitectura del Proyecto

El sistema sigue una estructura simple basada en PHP procedural:

/loginseguro
/includes
db.php           → Conexión a la base de datos
functions.php    → Funciones de negocio y utilidades
/assets
style.css        → Estilos globales
login.php          → Formulario de login
procesar_login.php→ Lógica de autenticación
dashboard.php      → Panel principal según rol
admin.php          → Panel de administración
logout.php         → Cierre de sesión


---

# 🗄️ 2. Base de Datos

Tabla principal: **users**

| Campo       | Tipo        | Descripción                         |
|-------------|-------------|-------------------------------------|
| id          | INT (PK, AI)| Identificador único                 |
| username    | VARCHAR     | Nombre de usuario                   |
| password    | VARCHAR     | Contraseña hasheada                 |
| role        | VARCHAR     | Rol (`admin` o `user`)              |
| attempts    | INT         | Intentos fallidos                   |
| locked      | TINYINT     | 1 = bloqueado, 0 = activo           |
| logged_in   | TINYINT     | 1 = conectado, 0 = desconectado     |

---

# 🔐 3. Seguridad Implementada

- Contraseñas con `password_hash()` y `password_verify()`.
- Control de intentos fallidos.
- Bloqueo automático a los 5 intentos.
- Reinicio de intentos al iniciar sesión correctamente.
- Sesiones seguras con `session_start()`.
- Roles con permisos diferenciados.
- Panel admin protegido por verificación de rol.

---

# 🧠 4. Flujo de Autenticación

1. El usuario envía usuario + contraseña.
2. Se verifica si existe.
3. Se comprueba si está bloqueado.
4. Se valida la contraseña:
   - Si falla → incrementa intentos.
   - Si llega a 5 → bloquea.
5. Si acierta → reinicia intentos y crea sesión.
6. Redirige según rol.

---

# 🧩 5. Funciones Principales (includes/functions.php)

### `getUserByUsername($username)`
Obtiene un usuario completo desde la BD.

### `resetAttempts($username)`
Reinicia el contador de intentos.

### `incrementAttempts($username)`
Incrementa el contador de intentos fallidos.

### `lockAccount($username)`
Bloquea la cuenta del usuario.

### `createUser($username, $password, $role)`
Crea un usuario nuevo con contraseña hasheada.

### `changePassword($id, $newPassword)`
Actualiza la contraseña de un usuario.

### `forceLogout($id)`
Marca al usuario como desconectado.

### `getLockedUsers()`
Devuelve todos los usuarios bloqueados.

---

# 🧭 6. Gestión de Roles

$_SESSION['role']


En cada página protegida se valida:

```php
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
$_SESSION['role']


En cada página protegida se valida:

```php
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
🛠️ 7. Extender el Proyecto
Añadir nuevos roles
Añadir el rol en la BD.

Ajustar el menú en dashboard.php.

Añadir permisos en admin.php si aplica.

Añadir nuevas páginas protegidas
Crear archivo PHP.

Incluir validación de sesión.

Incluir validación de rol si es necesario.

Añadir logs o auditoría
Crear tabla logs y registrar:

Fecha

Usuario

Acción

IP

🧪 8. Buenas Prácticas
Nunca almacenar contraseñas sin hash.

Usar siempre consultas preparadas.

Validar siempre la sesión antes de mostrar contenido.

Mantener funciones de negocio en functions.php.

No mezclar HTML y lógica compleja en la misma página.

🧩 9. Requisitos Técnicos
PHP 8+

MySQL/MariaDB

Extensión PDO habilitada

Servidor Apache (XAMPP recomendado)

📄 10. Licencia
Uso libre para fines educativos y personales.


---

# 🛠️ **MANUAL DE MANTENIMIENTO (maintenance_manual.md)**

```markdown
# 🛠️ Manual de Mantenimiento — Login Seguro en PHP

Este documento describe las tareas necesarias para mantener el sistema funcionando correctamente a lo largo del tiempo.

---

# 🔍 1. Revisión Periódica de Usuarios

### 1.1 Usuarios bloqueados
- Revisar la sección “Usuarios bloqueados” en el panel admin.
- Desbloquear manualmente si es necesario.

### 1.2 Usuarios conectados
- Verificar usuarios que permanecen conectados demasiado tiempo.
- Forzar logout si es necesario.

---

# 🔐 2. Mantenimiento de Seguridad

### 2.1 Actualizar contraseñas
Recomendar a los usuarios cambiar su contraseña cada cierto tiempo.

### 2.2 Revisar intentos fallidos
Si hay muchos bloqueos:
- Revisar posibles ataques de fuerza bruta.
- Considerar añadir CAPTCHA.

### 2.3 Actualizar PHP
Mantener PHP actualizado para evitar vulnerabilidades.

---

# 🗄️ 3. Mantenimiento de la Base de Datos

### 3.1 Copias de seguridad
Realizar backups periódicos de la base de datos:

mysqldump -u root login_seguro > backup.sql


### 3.2 Limpieza de registros
Si se implementan logs, vaciar o archivar periódicamente.

---

# 🧩 4. Mantenimiento del Código

### 4.1 Revisar funciones
- Mantener `functions.php` organizado.
- Eliminar funciones obsoletas.

### 4.2 Mejorar estructura
Si el proyecto crece:
- Migrar a MVC.
- Separar controladores y vistas.

### 4.3 Validación de formularios
Añadir validaciones adicionales si se amplía el sistema.

---

# 🧪 5. Pruebas Periódicas

### 5.1 Pruebas de login
- Intentos correctos
- Intentos fallidos
- Bloqueo
- Desbloqueo

### 5.2 Pruebas de roles
- Usuario normal → sin acceso al panel admin
- Admin → acceso completo

### 5.3 Pruebas de sesión
- Cerrar sesión correctamente
- Evitar acceso directo a páginas protegidas

---

# 🛠️ 6. Actualizaciones del Sistema

Cuando se añadan nuevas funciones:
- Actualizar README
- Actualizar CHANGELOG
- Actualizar manual técnico
- Actualizar manual de usuario

---

# 📄 7. Recomendaciones Finales

- Mantener el código limpio y comentado.
- Revisar periódicamente la seguridad.
- Hacer pruebas después de cada cambio.
- Mantener el repositorio Git actualizado.



El rol se almacena en la sesión:

