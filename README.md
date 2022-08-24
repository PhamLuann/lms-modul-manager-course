# lms-modul-manager-course
0) terminal:    composer update
1) terminal: 	cp .env.example .env	to create file .env
2) config database conection in file .env
3) terminal: 	php artisan migrate 		to create data table
4) terminal:   php artisan storage:link	to create shortcut public/images from storage/app/images
5) terminal:   php artisan serve
