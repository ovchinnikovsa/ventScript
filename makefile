run:
	docker-compose up -d

up:
	docker-compose up

stop:
	docker-compose down

build:
	docker-compose build

composer-install:
	docker-compose exec --user root ventscript_php composer install

composer-autoload:
	docker-compose exec --user root ventscript_php composer dump-autoload

composer-update:
	docker-compose exec --user root ventscript_php composer update

prod:
	docker-compose -f docker-compose-prod.yml up -d

sprod:
	docker-compose -f docker-compose-prod.yml stop