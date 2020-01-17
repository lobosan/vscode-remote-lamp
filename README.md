# VSCode Remote Docker Container - LAMP Stack


## Introduction

This platform is built using a `.devcontainer.json` which uses a `docker-compose.yml` file that consists of the following software:

* Linux Debian 10.2
* PHP 7.4
* Apache 2.4
* MySQL 8.0
* PhpMyAdmin 4.9
* Composer 1.9


## Prerequisites

This tutorial assumes you are running `Ubuntu 18.04 LTS x86_64`. To start developing remote containers, you need to install Docker locally following the next steps:

### Set up the Docker repository

Update the apt package index.

```shell
$ sudo apt-get update
```

Install packages to allow apt to use a repository over HTTPS:

```shell
$ sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common
```

Add Docker’s official GPG key:

```shell
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```

Verify that you now have the key with the fingerprint 9DC8 5822 9FC7 DD38 854A E2D8 8D81 803C 0EBF CD88, by searching for the last 8 characters of the fingerprint.

```shell
$ sudo apt-key fingerprint 0EBFCD88
    
pub   rsa4096 2017-02-22 [SCEA]
      9DC8 5822 9FC7 DD38 854A  E2D8 8D81 803C 0EBF CD88
uid           [ unknown] Docker Release (CE deb) <docker@docker.com>
sub   rsa4096 2017-02-22 [S]
```

Use the following command to set up the stable repository.

```shell
$ sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
```

### Install Docker Engine - Community

Update the apt package index.

```shell
$ sudo apt-get update
```

Install the latest version of Docker Engine - Community and containerd, or go to the next step to install a specific version:

```shell
$ sudo apt-get install docker-ce docker-ce-cli containerd.io
```

### Manage Docker as a non-root user

Add your user to the docker group created during installation.

```shell
$ sudo usermod -aG docker $USER
```

Activate the changes to groups.

```shell
$ newgrp docker
```

Verify that you can run docker commands without sudo.

```shell
$ docker run hello-world
```

> To learn more about how to install Docker, go to https://docs.docker.com/install/linux/docker-ce/ubuntu/ and https://docs.docker.com/install/linux/linux-postinstall/

### Install and setup VSCode

Download `.deb` version of VSCode from `https://code.visualstudio.com/`, install it, open it and add the following extensions:

* ms-azuretools.vscode-docker
* ms-vscode-remote.remote-containers

### Clone repository

Open a terminal and run the following commands:

```shell
$ mkdir Code
$ cd Code
$ git clone https://github.com/lobosan/vscode-remote-lamp.git
$ cd vscode-remote-lamp/
$ cp sample.env .env
$ code .
```

> Setup your environment variables as needed in your .env file.


## Developing in the Remote Container

Once Visual Studio Code opens our project, the configuration file `.devcontainer.json` will be recognized and a notification should appear on the lower right corner. Click on the blue button `Reopen in container` to start building the docker images.

Alternatively, click on the green icon `><` on the lower left corner and select the command `Remote-Containers:Reopen in Container`

> To learn more about `Remote Containers`, go to https://code.visualstudio.com/docs/remote/containers


### Install composer dependencies

Once the building process finishes successfuly, open a terminal in Visual Studio Code with the command ``CTRL+SHIFT+` `` and run:

```shell
$ composer install
```

After the process is finished, your LAMP stack is ready to be used as your PHP development environment.
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
