migrate-seed:
	./vendor/bin/sail artisan migrate:fresh --seed 

start-dev:
	./vendor/bin/sail up -d
	./vendor/bin/sail npm run watch 