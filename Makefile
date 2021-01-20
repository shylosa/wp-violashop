#!/usr/bin/make

SHELL := /bin/sh
CURRENT_UID := $(shell id -u)
CURRENT_DIR := $(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))
PASS := 1

#test:
#	@echo $(CURRENT_UID)

#change owner and permissions for project folder
owner:
	echo $(PASS) | sudo -S chown -R $(CURRENT_UID):www-data $(CURRENT_DIR)
	sudo chmod -R 777 $(CURRENT_DIR)

build:
	docker-compose up --build -d

up:
	echo $(PASS) | sudo -S service mysql stop
	sudo service apache2 stop
	sudo service nginx stop
	docker-compose up -d

down:
	docker-compose down

restart:
	echo $(PASS) | sudo -S service mysql restart
	sudo service apache2 restart

stop:
	docker-compose stop

upgrade:
	echo $(PASS) | sudo -S rm -rf var/generation
	sudo rm -rf var/cache
	sudo rm -rf var/page_cache
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento cache:clean
	php bin/magento cache:flush
	sudo chown -R $(CURRENT_UID):www-data $(CURRENT_DIR)
	sudo chmod -R 777 $(CURRENT_DIR)

upd:
	php bin/magento setup:upgrade
	php bin/magento cache:flush
	echo $(PASS) | sudo -S chown -R $(CURRENT_UID):www-data $(CURRENT_DIR)
	sudo chmod -R 777 $(CURRENT_DIR)

#logging into the container with superuser rights
php:
	docker exec -u 0 -it magento23_php bash
