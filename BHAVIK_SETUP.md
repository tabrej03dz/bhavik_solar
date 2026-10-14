# Bhavik Solar Laravel — Setup

1. Copy `.env.example` to `.env` and configure `APP_URL` and database settings.
2. Run `composer install` and `php artisan key:generate`.
3. Run `php artisan migrate` (preserves existing database tables).
4. Run `php artisan storage:link` for uploaded Services/Projects images.
5. Run `php artisan serve` and log in at `/login`.
6. Dashboard `/dashboard`; manage Services `/dashboard/manage/services`; Projects `/dashboard/manage/projects`.
7. Optional: `php artisan db:seed --class=ProductSeeder` for generic solar catalog entries. This does not delete old agricultural products; review the catalog separately.

Public 5-page website shares `resources/views/layouts/website.blade.php` plus `bhavik/partials/header.blade.php` and `footer.blade.php`. New managed service/project cards appear on public Services/Projects pages. Original static design elements remain for fidelity, so edit original Blade sections if you wish to replace existing fixed content.

For security: user registration is retained from the original project. For production, restrict admin routes with role/permission middleware and disable open registration if only staff should use the dashboard. Set `APP_DEBUG=false` and configure HTTPS.
