# Clouds-PHP-technical

## Requirements
- PHP ^7.3|^8.0
- Laravel 8.0+
- Mysql

## Notes
- Admin and Customer can log in from the same page. The admin control panel shows him different pages from the clients.
- Using Laravel Cashier for payment processing.
- System Generate a pdf invoice (support Arabic chars).

## Installation
- 1. Clone Repo from GitHub
```bash
git clone https://github.com/MahmoudShalma/Clouds-PHP-technical.git
```
- 2. create a `.env` file
```bash
cd Clouds-PHP-technical && cp .env.example .env
```
- 3. migrate && Seeding data in the database
```bash
php artisan migrate --seed
```

## Log In
- 1. Log In As Admin
```bash
Email: admin@admin.com
Password: password
```
- 2. Log In As Customer
```bash
You can Register As Customer
```

## Card Test
Name: Test

Number: 4242 4242 4242 4242

CSV: 123

ZIP: 12345

Expiration Month: 12

Expiration Year: 2028
