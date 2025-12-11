# Exam-21 — Laravel Blog

A minimal blog application built with Laravel and Blade templates. This repository contains a public-facing blog layout and a simple admin UI for managing posts, categories, banners, and profile data. The admin interface includes Tailwind-styled forms with client-side live previews for images and post content.

**This README helps developers quickly set up and understand the project.**

**Contents**

-   `app/Http/Controllers` — controllers for front and admin routes
-   `resources/views` — Blade templates (public site + `resources/views/admin` for admin pages)
-   `routes/web.php` — web routes including an `/admin` group
-   `database/migrations` — migrations used by the app

**Key features**

-   Public blog home page, categories listing, blog list and detail views (Blade templates)
-   Admin UI with pages for: dashboard, profile, add/update blog, manage blogs, and banner add/update
-   Client-side image upload and live preview using JavaScript FileReader for admin forms
-   Tailwind CSS used via CDN for rapid styling and a classical blog aesthetic

> Note: Some admin forms currently provide client-side preview only; server-side persistence for uploaded images and complete CRUD may need additional wiring depending on your desired workflow.

**Prerequisites**

-   PHP 8.0+ (match your environment)
-   Composer
-   Node.js and npm (for frontend build if you want to run Vite)
-   MySQL / SQLite / any supported database

## Quick setup

1. Clone the repository

```bash
git clone https://github.com/dev-habibhossain/assignment-21.git
cd app.blogs
```

2. Install PHP dependencies

```bash
composer install
```

3. Copy `.env` and set environment variables (DB credentials, app URL)

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env` and run migrations

```bash
php artisan migrate
```

5. (Optional) Create the storage symlink for uploaded files

```bash
php artisan storage:link
```

6. Install JS dependencies and build assets (optional — Tailwind CDN is used in the views)

```bash
npm install
npm run dev
```

7. Serve the app locally

```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

## Admin area

-   Admin routes are prefixed with `/admin` (see `routes/web.php`).
-   There is an `AdminController` and multiple Blade views under `resources/views/admin`.
-   Many admin forms include client-side preview logic. To enable full create/update persistence you can implement controllers to store data into database models (`Post`, `Category`, etc.) and save uploaded files to `storage/app/public`.

## Testing

Run tests with:

```bash
php artisan test
# or if you use Pest:
./vendor/bin/pest
```

## TODOs / Next steps

-   Wire form submission to controllers and Eloquent models (`Post`, `Banner`, `Category`) if not yet connected.
-   Validate and store uploaded images to `storage/app/public` and use `Storage::url()` in views.
-   Add authentication/authorization for admin routes (Laravel Breeze, Jetstream, or custom middleware).
-   Add seeders for sample posts and categories for demo purposes.

## Contributing

Feel free to open issues or PRs. Keep changes small and focused; run tests and verify UI behavior locally.

## License

This project currently has no license file. Add a `LICENSE` if you want an open-source license.

## Contact

For questions, open an issue or contact the repository owner.
