# Project Title: Simple Auth

## Description
This project is a simple user authentication system built with PHP and MySQL. It allows users to register, log in, and log out, validating their credentials against a database. The project demonstrates basic authentication, session management, and access control for protected pages.

## Features
- User registration with unique username and email
- Secure password hashing
- User login and logout
- Session-based authentication
- Protected admin page (accessible only to logged-in users)
- Clean, responsive frontend design
- URL rewriting for clean routes (`/login`, `/register`, `/admin`, `/logout`)

## File Structure
```
testsite
├── index.php                # Landing page
├── database.php             # Database connection settings
├── .htaccess                # URL rewrite rules
├── src
│   ├── css
│   │   └── style.css        # CSS styles for the frontend
│   └── page
│       ├── login.php        # Login page
│       ├── register.php     # Registration page
│       ├── admin.php        # Protected admin page
│       └── logout.php       # Logout script
└── README.md                # Project documentation
```

## Setup Instructions
1. **Clone the repository** or download the project files.
2. **Set up the database**:
   - Create a MySQL database (e.g., `testsite`).
   - Create a `users` table with the following structure:
     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(50) NOT NULL UNIQUE,
         email VARCHAR(100) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL
     );
     ```
   - (Optional) Insert a test user:
     ```sql
     INSERT INTO users (username, email, password)
     VALUES ('testuser', 'test@example.com', '<hashed_password>');
     ```
     To generate a hashed password, use PHP's `password_hash()` function.
3. **Configure `database.php`**:
   - Update the database connection settings in `database.php` with your MySQL credentials.
4. **Run the project**:
   - Place the project folder in the `htdocs` directory of your XAMPP installation.
   - Start the Apache and MySQL services in XAMPP.
   - Access the project in your web browser at `http://localhost/testsite/`.

## Usage
- **Landing Page:** Visit `/testsite/` to see the landing page.
- **Register:** Go to `/testsite/register` to create a new account.
- **Login:** Go to `/testsite/login` to log in.
- **Admin Page:** After logging in, you will be redirected to `/testsite/admin` (protected).
- **Logout:** Click the logout link or visit `/testsite/logout` to end your session.

## URL Routing
URL rewriting is handled by the `.htaccess` file. The following routes are available:
- `/login` → `src/page/login.php`
- `/register` → `src/page/register.php`
- `/admin` → `src/page/admin.php`
- `/logout` → `src/page/logout.php`

## Security Notes
- Passwords are securely hashed using PHP's `password_hash()` and verified with `password_verify()`.
- All user input is validated and prepared statements are used to prevent SQL injection.
- Sessions are used to manage user authentication and protect restricted pages.
- **For production:** Always use HTTPS, implement CSRF protection, and further harden your code.

## Screenshots
![image](https://github.com/user-attachments/assets/3dc1dfd0-993d-439d-9fc5-cbcc1960f792)
![image](https://github.com/user-attachments/assets/ea3e9f16-6c3f-4e69-991e-980f7beb0069)
![image](https://github.com/user-attachments/assets/7bb50639-582b-41fc-be16-5c7a2412039c)

## License
This project is intended for educational purposes. You are free to use and modify it as needed.
