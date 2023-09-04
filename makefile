start: docker-up server-start ## Start the project
stop: docker-down server-stop ## Stop the project

docker-up: ## Start docker containers
	docker compose up -d

docker-down: ## Stop docker containers
	docker compose down

server-start: ## Start server
	symfony server:start -d

server-stop: ## Stop server
	symfony server:stop