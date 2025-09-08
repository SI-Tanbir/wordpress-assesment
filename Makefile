SHELL := /bin/bash

DEV_PROXY ?= http://localhost:8080
DEV_FILES ?= wp/wp-content/themes/**
DEV_PORT ?= 3000
DEV_UI_PORT ?= 3001

.PHONY: dev bs compose-up compose-down bs-docker logs

dev: compose-up
	@set -e; \
	trap 'echo ""; echo "Stopping..."; docker compose down --remove-orphans; exit 0' INT TERM; \
	npx browser-sync@2 start \
	  --proxy '$(DEV_PROXY)' \
	  --files '$(DEV_FILES)' \
	  --no-open --port $(DEV_PORT) --ui-port $(DEV_UI_PORT) \
	  --watch-options-use-polling true; \
	trap - INT TERM

bs: dev

compose-up:
	docker compose up -d

compose-down:
	docker compose down --remove-orphans

logs:
	docker compose logs -f browsersync
