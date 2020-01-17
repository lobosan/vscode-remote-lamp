# VSCode Remote Docker Container - LAMP Stack


## Introduction

This platform, it is built using a `.devcontainer.json` which uses a `docker-compose.yml` file that consists of the following software:

* Linux Debian 10.0
* PHP 7.4
* Apache 2.4
* MySQL 8.0
* PhpMyAdmin 4.9
* Composer 1.9


## Clone repository and setup environment variables as needed

```shell
git clone https://github.com/lobosan/vscode-remote-lamp.git
cd vscode-remote-lamp/
cp sample.env .env
```


## Install and setup VSCode

Install Visual Studio Code and also add the following extensions:

* ms-azuretools.vscode-docker
* ms-vscode-remote.remote-containers


## Reopen folder in container

After installing the extension `Remote Containers`, the configuration file .devcontainer.json will be recognized and once the prompt appears, click on the blue button `Reopen in container` to start building the docker images.

Alternatively, click on the green icon `><` on the lower left corner and select the command `Remote-Containers:Reopen in Container`

> To learn more about `Remote Containers`, go to https://code.visualstudio.com/docs/remote/containers


## Install composer dependencies

```shell
composer install
```

Once the process is finished, your LAMP stack is ready to be used as your PHP development environmet.
You can access it via `http://localhost`.


## Configuration Variables

The following configuration variables are available and you can customize them by overwritting your own `.env` file.

_**DOCUMENT_ROOT**_

It is a document root for Apache server. The default value for this is `./www`. All your sites will go here and will be synced automatically.

_**MYSQL_DATA_DIR**_

This is MySQL data directory. The default value for this is `./data/mysql`. All your MySQL data files will be stored here.

_**VHOSTS_DIR**_

This is for virtual hosts. The default value for this is `./config/vhosts`. You can place your virtual hosts conf files here.

> Make sure you add an entry to your system's `hosts` file for each virtual host.

_**APACHE_LOG_DIR**_

This will be used to store Apache logs. The default value for this is `./logs/apache2`.

_**MYSQL_LOG_DIR**_

This will be used to store MySQL logs. The default value for this is `./logs/mysql`.


## Web Server

Apache is configured to run on port 80. So, you can access it via `http://localhost`.

#### Apache Modules

By default following modules are enabled.

* rewrite
* headers

> If you want to enable more modules, just update `./bin/webserver/Dockerfile`.
> You have to rebuild the docker image and restart the docker containers.

#### Connect via SSH

You can connect to web server using `docker-compose exec` command to perform various operations on it. Use below command to login to container via ssh.

```shell
docker-compose exec webserver bash
```
#### Extensions

By default following extensions are installed.

* mysqli
* pdo_sqlite
* pdo_mysql
* mbstring
* zip
* intl
* mcrypt
* curl
* json
* iconv
* xml
* xmlrpc
* gd

> If you want to install more extension, just update `./bin/webserver/Dockerfile`.
> You have to rebuild the docker image and restart the docker containers.


## PhpMyAdmin

PhpMyAdmin is configured to run on port 8080. Use the following default credentials.

http://localhost:8080/
username: root
password: root123!@
