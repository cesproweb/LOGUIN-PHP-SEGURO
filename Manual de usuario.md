
---

# 📗 **MANUAL DE USUARIO (user_manual.md)**

```markdown
# 📗 Manual de Usuario — Login Seguro en PHP

Este documento explica cómo utilizar el sistema de login seguro, tanto para usuarios normales como para administradores.

---

# 👤 1. Inicio de sesión

1. Accede a:
http://localhost/LOGUIN-PHP-SEGURO/login.php

2. Introduce tu **usuario** y **contraseña**.
3. Pulsa **Entrar**.

### Posibles mensajes:
- **Contraseña incorrecta** → Has fallado un intento.
- **Atención: último intento antes del bloqueo** → Te queda 1 intento.
- **Cuenta bloqueada** → Has superado los 5 intentos fallidos.

---

# 🧭 2. Dashboard (usuarios y administradores)

Una vez dentro verás:

- Un mensaje de bienvenida con tu nombre.
- Un menú superior con opciones según tu rol.

### Si eres usuario normal:
- Verás solo:
- **Inicio**
- **Cerrar sesión**

### Si eres administrador:
- Verás además:
- **Panel admin**

---

# 🛠️ 3. Panel de Administración (solo administradores)

Accede desde el menú superior → **Admin**

El panel permite:

---

## 🟦 3.1 Crear usuarios

1. Rellena:
- Nombre de usuario
- Contraseña
- Rol (admin o user)
2. Pulsa **Crear usuario**

---

## 🟩 3.2 Cambiar contraseñas

1. Introduce el **ID del usuario**
2. Escribe la nueva contraseña
3. Pulsa **Cambiar contraseña**

---

## 🟥 3.3 Usuarios bloqueados

Aquí puedes:

- Ver qué usuarios están bloqueados
- Desbloquearlos con un botón

---

## 🟨 3.4 Usuarios conectados

Muestra los usuarios con sesión activa.

Puedes:

- Forzar su cierre de sesión

---

# 🔐 4. Seguridad del sistema

El sistema incluye:

- Contraseñas hasheadas
- Control de intentos fallidos
- Bloqueo automático
- Roles con permisos
- Sesiones seguras

---

# 🚪 5. Cerrar sesión

En cualquier momento puedes pulsar:

**Cerrar sesión**

Esto te devolverá a la pantalla de login.

---

# 🎉 6. Fin del manual

El sistema está diseñado para ser sencillo, seguro y fácil de administrar.
