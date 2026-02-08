
---

## 🗄️ Base de Datos

La tabla `users` debe contener:

| Campo       | Tipo        | Descripción                         |
|-------------|-------------|-------------------------------------|
| id          | INT (PK, AI)| Identificador único                 |
| username    | VARCHAR     | Nombre de usuario                   |
| password    | VARCHAR     | Contraseña hasheada                 |
| role        | VARCHAR     | Rol del usuario (`admin` o `user`) |
| attempts    | INT         | Intentos fallidos                   |
| locked      | TINYINT     | 1 = bloqueado, 0 = activo           |
| logged_in   | TINYINT     | 1 = conectado, 0 = desconectado     |

### Usuario por defecto recomendado
- Usuario: **admin**
- Contraseña: **123456**  
  (Insertar en la BD usando `password_hash()`)

---

## 🔐 Seguridad Implementada

- Contraseñas hasheadas.
- Control de intentos fallidos.
- Bloqueo automático de cuentas.
- Reinicio de intentos al acertar.
- Roles con permisos diferenciados.
- Panel admin protegido.
- Sesiones seguras.
- Código organizado y mantenible.

---

## 🛠️ Requisitos

- PHP 8+
- MySQL
- XAMPP, WAMP o similar
- Navegador moderno

---

## 📌 Notas

Esta versión es mucho más completa que la inicial.  
Incluye roles, panel de administración, menú dinámico y mejoras visuales en CSS.

El proyecto está preparado para futuras ampliaciones:
- Recuperación de contraseña
- Logs de actividad
- Auditoría de accesos
- API REST
- JWT
- etc.

---

## 📄 Licencia

Proyecto libre para uso educativo y personal.
