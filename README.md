# Blog Application

A simple and powerful blog application built with Laravel, featuring user authentication, post management, and a clean, responsive design.

## 🌟 Overview

This blog application is a web-based platform developed using Laravel framework, designed to provide a robust and user-friendly blogging experience. The application includes essential features for managing blog posts, user authentication, and responsive design for optimal viewing across different devices.

## 🚀 Features

- **User Authentication System**
    - Secure login and registration
    - User profile management
    - Role-based access control

- **Blog Post Management**
    - Create, read, update, and delete posts
    - Rich text editing capabilities
    - Post categorization and tagging
    - Comments system

- **Responsive Design**
    - Mobile-friendly interface
    - Clean and modern UI
    - Cross-browser compatibility

## 💻 Technical Stack

- **Backend Framework:** Laravel
- **Frontend:** Blade templating engine
- **Database:** MySQL (assumed based on Laravel standard)
- **Authentication:** Laravel's built-in authentication system

## 🛠️ Project Structure

The project follows Laravel's standard MVC architecture:

```
blog/
├── app/                    # Core application code
│   ├── Console/           # Artisan commands
│   ├── Exceptions/        # Exception handlers
│   ├── Http/              # Controllers, Middleware, Requests
│   │   ├── Controllers/   # Application controllers
│   │   └── Middleware/    # HTTP middleware
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
│
├── bootstrap/             # Framework bootstrap files
│   ├── app.php           # Application bootstrap
│   └── cache/            # Framework cached files
│
├── config/               # Configuration files
│   ├── app.php          # Application configuration
│   ├── auth.php         # Authentication configuration
│   ├── database.php     # Database configuration
│   └── ...              # Other configuration files
│
├── database/             # Database files
│   ├── factories/       # Model factories
│   ├── migrations/      # Database migrations
│   └── seeders/        # Database seeders
│
├── lang/                # Language files
│   └── en/             # English language files
│
├── public/              # Publicly accessible files
│   ├── css/            # Compiled CSS files
│   ├── js/             # Compiled JavaScript files
│   ├── index.php       # Entry point
│   └── .htaccess       # Apache configuration
│
├── resources/           # Raw resources
│   ├── css/            # CSS source files
│   ├── js/             # JavaScript source files
│   └── views/          # Blade templates
│       ├── layouts/    # Layout templates
│       ├── components/ # View components
│       └── pages/      # Page templates
│
├── routes/              # Route definitions
│   ├── api.php         # API routes
│   ├── web.php         # Web routes
│   ├── channels.php    # Broadcasting channels
│   └── console.php     # Console routes
│
├── storage/             # Storage directory
│   ├── app/            # Application storage
│   ├── framework/      # Framework storage
│   └── logs/           # Application logs
│
├── tests/              # Test files
│   ├── Feature/        # Feature tests
│   └── Unit/           # Unit tests
│
├── vendor/             # Composer dependencies (not in repo)
│
├── .env.example        # Environment variables example
├── .gitattributes     # Git attributes
├── .gitignore         # Git ignore rules
├── artisan            # Laravel Artisan CLI
├── composer.json      # Composer dependencies
├── package.json       # NPM dependencies
├── phpunit.xml        # PHPUnit configuration
├── postcss.config.js  # PostCSS configuration
├── tailwind.config.js # Tailwind CSS configuration
└── vite.config.js     # Vite configuration
```

## 🔧 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/mina20088/blog.git
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Configure environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Set up database:
   ```bash
   php artisan migrate
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

## 👥 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📝 License

This project is open-sourced software.

## 🔗 Links

- [Repository](https://github.com/mina20088/blog)
- [Issues](https://github.com/mina20088/blog/issues)

## 👤 Author

- **Mina** - [@mina20088](https://github.com/mina20088)

---
Last Updated: 2025-07-19
