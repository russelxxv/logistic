include .env

# Development Environment
dev-build: ## Build Local containers
	docker compose -f docker-compose.yaml build

dev-build-no-cache:
	docker compose -f docker-compose.yaml build --no-cache

dev-up: ## Up containers and locally
	docker compose -f docker-compose.yaml --project-name ${PROJECT_NAME} up -d
	make dev-ssh

dev-down: ## stop and remove containers
	docker compose -f docker-compose.yaml --project-name ${PROJECT_NAME} down

dev-restart:
	make dev-down && make dev-up 

dev-ssh: # exec to laravel app
	docker exec -it ${APP_CONTAINER} /bin/bash

dev-restart-queues:
	docker restart ${QUEUE_CONTAINER}

dev-restart-scheduler:
	docker restart ${SCHEDULER_CONTAINER}