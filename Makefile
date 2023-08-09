
build:
	docker build -t login_system:latest .

start:
	docker-compose up -d 
stop: 
	docker-compose stop
remove:
	docker-compose down --volumes

db:
	docker-compose exec postgres bash
shell:
	docker-compose exec php bash

reset: stop remove start