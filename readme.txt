:::: ESPAÑOL ::::

# LOGIN SEGURO EN PHP (CON ROLES Y PANEL DE ADMINISTRACIÓN)

Este proyecto implementa un sistema de autenticación en PHP con enfoque en seguridad, gestión de roles y administración de usuarios.  
Es una versión completamente mejorada respecto a la inicial, con nuevas funciones, mejor estructura y un panel de administración más completo.

---

## ✔️ FUNCIONALIDADES PRINCIPALES

### 🔐 1. Login seguro con PHP y MySQL
- Las contraseñas se almacenan usando `password_hash()`.
- La verificación se realiza con `password_verify()`.
- Se controla el número de intentos fallidos:
  - A los **5 intentos fallidos**, la cuenta se bloquea automáticamente.
  - Si el usuario acierta antes del quinto intento, el contador se reinicia a 0.

### 👤 2. Gestión de roles
El sistema soporta dos roles:
- **admin**
- **user**

El rol se almacena en la base de datos en el campo `role`.

Dependiendo del rol:
- Los usuarios normales acceden solo al dashboard.
- Los administradores acceden al panel de administración.

### 🧭 3. Dashboard con menú dinámico
Una vez logado:
- Se muestra un mensaje de bienvenida con el nombre del usuario.
- El menú superior cambia según el rol:
  - Si es **admin**, aparece el enlace al panel de administración.
  - Si es **user**, solo aparece el menú básico.

### 🛠️ 4. Panel de administración (solo para admin)
Incluye:
- Crear nuevos usuarios (con rol admin o user).
- Cambiar contraseñas.
- Ver usuarios bloqueados y desbloquearlos.
- Ver usuarios conectados y forzar su logout.
- Menú superior con opción de cerrar sesión.

Todo sin JavaScript, solo PHP + CSS.

---

## ✔️ ESTRUCTURA DEL PROYECTO


