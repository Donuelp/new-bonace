# Bon-Ace

Laravel and Vue storefront for Bon-Ace Fashion Tools.

## Requirements

- PHP 8.0 or later
- Composer
- Node.js and npm
- MySQL or MariaDB

## Set up on a new computer

1. Clone the repository and open its folder.

2. Install PHP dependencies:

   ```powershell
   composer install
   ```

3. Create the local environment file:

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

4. Create a local MySQL database named `new_bonace`, then confirm the database settings in `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=new_bonace
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Create the database tables:

   ```powershell
   php artisan migrate
   ```

6. Create the storage shortcut used by admin-uploaded product and journal images:

   ```powershell
   php artisan storage:link
   ```

7. Install frontend dependencies and start the site:

   ```powershell
   npm ci
   npm run dev
   php artisan serve
   ```

Open the site at the address shown by `php artisan serve`, usually `http://127.0.0.1:8000`.

## Production frontend build

```powershell
npm run build
```

## Database data

The migration files recreate the application schema on another computer. They do not include existing local database records, such as products, settings, journal entries, users, or images uploaded through the admin area.

Before moving machines, export the `new_bonace` database from phpMyAdmin or MySQL and import it on the new computer. Copy `storage/app/public` separately if you need locally uploaded product or journal images; this folder is intentionally not committed because it can contain generated user content.

## Verification

```powershell
php artisan test
npm run build
```
