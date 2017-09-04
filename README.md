# Installation

### 1.) Environment
```sh
php -r "copy('.env.example', '.env');"
Anschließend die .env Datei anpassen (Mysql)
```

### 2.) Vendor / Database
```sh
composer install --no-dev
php artisan key:generate
php artisan migrate (only local, srv has mysql replication)
```

##### 2b) Plastic config erstellen / kopieren


### 3.) NPM Packages
```sh
npm install
npm run dev|production
```

### 4.) Production
```sh
echo "" | sudo -S service php7.1-fpm reload
php artisan cache:clear
php artisan view:clear
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan opcache:clear  
```
