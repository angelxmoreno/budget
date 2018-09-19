# Vars
CONTAINER_PREFIX = budget

help: ## Help menu
	@echo "App Tasks"
	@cat $(MAKEFILE_LIST) | pcregrep -o -e "^([\w]*):\s?##(.*)"
	@echo

ssh: ## connect to fpm container
	docker exec -it budget-fpm ash

start: ## starts docker compose
	docker-compose up -d

restart: ## starts docker compose
	docker-compose restart

stop: ## stops all containers
	docker-compose stop
