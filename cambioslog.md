# 📜 CHANGELOG

Historial de cambios importantes realizados en este proyecto.

---

## [1.1.0] - 08/02/2026
### Añadido
- Sistema completo de roles (`admin` y `user`).
- Menú dinámico en el dashboard según el rol del usuario.
- Panel de administración totalmente funcional:
  - Crear usuarios con selección de rol.
  - Cambiar contraseñas.
  - Ver usuarios bloqueados y desbloquearlos.
  - Ver usuarios conectados y forzar su cierre de sesión.
- Nuevo diseño CSS más moderno y limpio.
- Reestructuración del proyecto para mayor claridad.
- README en español e inglés.
- Diagrama de flujo del proceso de login.

### Modificado
- Lógica del login reescrita para mayor seguridad.
- Consultas SQL actualizadas para incluir el campo `role`.
- Mejoras en los mensajes de error y retroalimentación al usuario.
- Código reorganizado y más legible.

### Corregido
- Problema donde el rol no se cargaba correctamente desde la base de datos.
- Inconsistencias en la sesión después del login.
- Errores visuales en el dashboard y el panel admin.

---

## [1.0.0] - Versión inicial
### Añadido
- Login básico en PHP.
