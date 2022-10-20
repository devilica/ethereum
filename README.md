Install "Laragon" or "XAMPP" or similar PHP Dev Platform
MySQL
Node v 16+  (Install v16+ node: https://nodejs.org/dist/v16.18.0/node-v16.18.0-x64.msi)



Run "composer update"
Run "npm install"
Duplicate .env.example file as .env
Add your mysql db details there(like DB_DATABASE=ethsearch)
php artisan key:generate
Run Migration as -- "php artisan migrate"


Terminal:
npm run dev
npm run build
php artisan serve
