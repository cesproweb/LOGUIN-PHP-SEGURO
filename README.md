# 🔐 Login Seguro en PHP (con Roles y Panel de Administración)

Este proyecto implementa un sistema de autenticación seguro en PHP con gestión de roles, control de intentos fallidos, bloqueo automático de cuentas y un panel de administración completo.  
Es una versión totalmente mejorada respecto a la inicial, con una estructura más profesional y funcionalidades avanzadas.

---

## 🚀 Características Principales

### 🔒 1. Login seguro
- Contraseñas almacenadas con `password_hash()`.
- Verificación mediante `password_verify()`.
- Control de intentos fallidos:
  - A los **5 intentos**, la cuenta se bloquea automáticamente.
  - Si el usuario acierta antes del quinto intento, el contador vuelve a 0.
- Sistema de sesiones seguro.

---

### 👤 2. Gestión de roles
El sistema soporta dos roles:

- **admin**
- **user**

El rol se almacena en la base de datos en el campo `role`.

Dependiendo del rol:
- Los usuarios normales acceden solo al dashboard.
- Los administradores acceden al panel de administración.

---

### 🧭 3. Dashboard con menú dinámico
Una vez logado, el usuario ve:

- Un mensaje de bienvenida con su nombre.
- Un menú superior que cambia según el rol:
  - Si es **admin**, aparece el enlace al panel de administración.
  - Si es **user**, solo aparece el menú básico.

---

### 🛠️ 4. Panel de administración (solo administradores)
Incluye:

- Crear nuevos usuarios (admin o user).
- Cambiar contraseñas.
- Ver usuarios bloqueados y desbloquearlos.
- Ver usuarios conectados y forzar su logout.
- Menú superior con opción de cerrar sesión.

Todo implementado **sin JavaScript**, únicamente con PHP + CSS.

---

## 📁 Estructura del Proyecto

