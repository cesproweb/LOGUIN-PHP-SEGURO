# 🔐 Secure PHP Login System (with Roles & Admin Panel)

This project implements a secure authentication system in PHP with role management, account lockout protection, and a complete administration panel.  
It is a fully improved version of the original login system, now structured professionally and with advanced features.

---

## 🚀 Main Features

### 🔒 1. Secure Login
- Passwords stored using `password_hash()`.
- Verification using `password_verify()`.
- Failed login attempt tracking:
  - After **5 failed attempts**, the account is automatically locked.
  - If the user logs in successfully before the 5th attempt, the counter resets to 0.
- Secure session handling.

---

### 👤 2. Role Management
The system supports two roles:

- **admin**
- **user
