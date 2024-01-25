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
- php artisan operations:process ( This creates the Algolia Index)
```