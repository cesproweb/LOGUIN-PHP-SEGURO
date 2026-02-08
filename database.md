
---

## 🗄️ Database Structure

The `users` table must contain:

| Field       | Type        | Description                         |
|-------------|-------------|-------------------------------------|
| id          | INT (PK, AI)| Unique identifier                   |
| username    | VARCHAR     | Username                            |
| password    | VARCHAR     | Hashed password                     |
| role        | VARCHAR     | User role (`admin` or `user`)       |
| attempts    | INT         | Failed login attempts               |
| locked      | TINYINT     | 1 = locked, 0 = active              |
| logged_in   | TINYINT     | 1 = online, 0 = offline             |

### Default recommended user
- Username: **admin**
- Password: **123456**  
  (Insert hashed using `password_hash()`)

---

## 🔐 Security Features

- Hashed passwords.
- Failed login attempt tracking.
- Automatic account lockout.
- Attempt counter reset on successful login.
- Role-based access control.
- Protected admin panel.
- Secure session handling.
- Clean and maintainable code.

---

## 🛠️ Requirements

- PHP 8+
- MySQL
- XAMPP, WAMP, or similar
- Modern web browser

---

## 📌 Notes

This version is significantly more complete than the original.  
It includes roles, an admin panel, a dynamic menu, and improved CSS styling.

The project is ready for future enhancements:
- Password recovery
- Activity logs
- Access auditing
- REST API
- JWT authentication
- And more.

---

## 📄 License

Free for educational and personal use.
