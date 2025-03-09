# Notify Me When Available - Laravel Package

## Overview

**Notify Me When Available** is a Laravel package that allows users to be notified via email when an out-of-stock product becomes available. It provides an admin dashboard for managing products and notifying users.

## Features

- Users can request notifications for out-of-stock products.
- Admin can update product price and quantity.
- Automatic email notifications using **Mailtrap** (for local development).
- Uses Laravel **middleware** for authentication.
- Supports **role-based access** (Admin & Client).

---

## Installation

### Step 1: Clone the Repository

```sh
 git clone https://github.com/FakhrCloudSecrets/notify-me-when-available.git
 cd notify-me-when-available
```

### Step 2: Install Dependencies

```sh
composer install
```

### Step 3: Set Up Environment

Copy the `.env.example` file and update the values:

```sh
cp .env.example .env
```

### Step 4: Generate Application Key

```sh
php artisan key:generate
```

### Step 5: Configure Database

Then run:

```sh
php artisan migrate --seed
```

This will create tables and seed them with:

- **Products (5 sample products)**
- **Two users:**
  - **Admin:** `admin@notifyme.com` / `password`
  - **User:** `user@notifyme.com` / `password`

### Step 6: Configure Mailtrap (For Email Notifications)

In `.env`:

```ini
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="Notify Me App"
```

---

## Usage

### Admin Panel (Manage Products)

- Login as **Admin** at `/login`.
- Update **product quantity and price**.
- When quantity is updated, users who requested notifications will receive an email.

### User (Client)

- Users can browse products.
- If a product is **out of stock**, they can press the **"Notify Me"** button.
- Once the product is back in stock, they will receive an email.

---

## API Endpoints

### Notify User When Product is Available

#### Request:

```http
POST /notify/create
```

#### Data:

```json
{
    "product_id": 1,
    "user_id": 2
}
```

---

## Authentication & Middleware

- Uses Laravel **middleware** for authentication.
- Role-based access (`admin` & `client`).
- **Protected Routes:**
  - `/dashboard` - Admin-only
  - `/product/update` - Admin-only

---

## Troubleshooting

If emails are not being sent:

1. Ensure your **Mailtrap credentials** are correct.
2. Run `php artisan config:clear` and `php artisan cache:clear`.
3. Check logs: `storage/logs/laravel.log`.

---

## License

This project is open-source under the **MIT License**.

---

## Author

Developed by **Mohamed Fakhr**. Reach out at [your-email@example.com](mailto\:your-email@example.com).

