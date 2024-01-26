## How to run

You need to terminals. once runs JS and one serves PHP server

# First terminal:

```console
- nvm use 16
- npm install
- npm run dev
```
# Second Terminal

```console
- composer install
- php artisan migrate
- php artisan operations:process ##(This creates the Algolia Index)
- php artisan db:seed --class=ProductSeeder # ( This opens the JSON file and inserts into the DB)
```

TO see the pagination in the API:
http://127.0.0.1:8000/api/products?page=2

