# 📜 CHANGELOG

All notable changes to this project will be documented in this file.

---

## [1.1.0] - 2026-02-08
### Added
- Full role-based access system (`admin` and `user`).
- Dynamic dashboard menu based on user role.
- Complete admin panel:
  - Create users with role selection.
  - Change user passwords.
  - View and unlock blocked users.
  - View online users and force logout.
- New CSS design for dashboard and admin panel.
- Improved project structure and file organization.
- English and Spanish README versions.
- Flowchart diagram for login logic.

### Changed
- Rewritten login logic with secure session handling.
- Updated database queries to include the `role` field.
- Improved error messages and user feedback.
- Enhanced security and code readability.

### Fixed
- Issue where the role was not being retrieved correctly from the database.
- Session inconsistencies after login.
- Styling inconsistencies across pages.

---

## [1.0.0] - Initial Version
### Added
- Basic PHP login system.
- Password hashing using `password_hash()`.
- Attempt counter and account lockout at 5 failed attempts.
- Simple dashboard with welcome message.
- Basic user creation script.
