Выполнение тестового "Feedback form"
========================
## Install
-  `curl -s "https://laravel.build/test-feedback-form" | bash`
-	`pstorm test-feedback-form `
-  `git init`
-  `gti add .`
-  `git commin -m'git init project `
-  `sail build --no-cache`
-  `sail up -d`
-  `sail php -v`

## Create Feedback
- `sail artisan make:model Feedback -mc`
- `sail artisan make:mail FeedbackMailer`

## Added Auth
-  `sail composer req laravel/ui`
-  `sail artisan ui vue --auth`
-  `sail npm install`
-  `sail npm run dev`
-  `sail npm run watch`
- `sail artisan migrate`

## Role and Permissions

- `sail composer require spatie/laravel-permission `
- `sail composer require laravelcollective/html`
- `sail artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
- `sail artisan migrate`
- `sail artisan make:seeder PermissionTableSeeder`
- `sail artisan db:seed --class=PermissionTableSeeder`
- `sail artisan make:seeder CreateManagerSeeder`
- `sail artisan db:seed --class=CreateManagerSeeder`
- `sail artisan make:seeder CreateClientSeeder`
- `sail artisan db:seed --class=CreateClientSeeder`
- `sail artisan migrate:refresh --seed`
- `sail artisan storage:link`


## Queue
- `sail artisan queue:table`
- `sail artisan migrate`
- `sail artisan make:job QueueSenderEmail`
- `sail artisan queue:work`


## Create  models

- `sail artisan make:model Permition -mfs`
- `sail artisan make:model Role -mfs`
- `sail artisan make:migration create_permission_user_table --create=permission_user`
- `sail artisan make:migration create_role_users_table --create=role_user`
- `sail artisan make:migration create_permission_role_table --create=permission_role`
- `sail artisan migrate`
- `sail artisan make:provider PermissionsServiceProvider`
-  `sail artisan make:seeder UserSeeder`
-  `sail artisan migrate:refresh --seed`

## Blade


			@role('manager')

			 Hello Manager

			@endrole

## RoleMiddleware

- `sail artisan make:middleware RoleMiddleware`
