```mermaid
flowchart TD

A[Usuario introduce usuario y contraseña] --> B{¿Existe el usuario?}
B -- No --> Z[Mostrar error: Credenciales incorrectas]

B -- Sí --> C{¿Cuenta bloqueada?}
C -- Sí --> L[Mostrar error: Cuenta bloqueada]

C -- No --> D{¿Contraseña correcta?}
D -- No --> E[Incrementar intentos en +1]
E --> F{¿Intentos >= 5?}
F -- Sí --> G[Bloquear cuenta]
G --> H[Mostrar error: Cuenta bloqueada]
F -- No --> I[Mostrar error: Contraseña incorrecta]

D -- Sí --> J[Reiniciar intentos a 0]
J --> K[Iniciar sesión: user_id, username, role]
K --> R{¿Rol = admin?}
R -- Sí --> S[Redirigir al dashboard con menú admin]
R -- No --> T[Redirigir al dashboard con menú usuario]
