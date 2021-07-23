 .env ფაილს ჩაგიგდებ.
 
alias sail='bash vendor/bin/sail' ეს ალიასი გაიწერე. vendor/bin/sail ბრძანება ხშირად გამოყენებადია.

მერე  უშვებ sail up -ს. იდეაში იგივე რაც docker-compose up

მერე ამ სეილით შეგვიძლია ბრძანებები გავუშვათ კონტეინერის გარემოში ამის გარეშე docker exec -it goto_laravel.test_1 bash

გაუშვი sail composer update

გაუშვი sail artisan migrate (იდეაში კონტეინერის გარემოში php artisan migrate არის)

