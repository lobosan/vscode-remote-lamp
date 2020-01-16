FROM php:7.4.1-apache-buster

# Avoid warnings by switching to noninteractive
ENV DEBIAN_FRONTEND=noninteractive

# This Dockerfile adds a non-root user with sudo access. Use the "remoteUser"
# property in devcontainer.json to use it. On Linux, the container user's GID/UIDs
# will be updated to match your local UID/GID (when using the dockerFile property).
# See https://aka.ms/vscode-remote/containers/non-root-user for details.
ARG USERNAME=vscode
ARG USER_UID=1000
ARG USER_GID=$USER_UID
#
# Create the user
RUN groupadd --gid $USER_GID $USERNAME \
  && useradd -s /bin/bash --uid $USER_UID --gid $USER_GID -m $USERNAME
#
# [Optional] Add sudo support for the non-root user.
# Omit if you don't need to install software after connecting.
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  sudo \
  && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
  && chmod 0440 /etc/sudoers.d/$USERNAME
#
# Configure and update apt
RUN apt-get update \
  && apt-get install -y --no-install-recommends apt-utils dialog 2>&1
#
# Install useful tools and important libraries
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  build-essential \
  curl \
  default-mysql-client \
  dialog \
  git \
  iproute2 \
  libcurl4 \
  libcurl4-openssl-dev \
  libicu-dev \
  libonig-dev \
  libsqlite3-0 \
  libsqlite3-dev \
  libzip-dev \
  locate \
  lsb-release\
  openssl \
  procps \
  unzip \
  wget \
  zip \
  zlib1g-dev
#
# Install xdebug
RUN yes | pecl install xdebug \
  && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini
#
# Other PHP7 Extensions
RUN docker-php-ext-install pdo_mysql \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install zip \
  && docker-php-ext-install -j$(nproc) intl \
  && docker-php-ext-install gettext
#
# Install Freetype
RUN apt-get install -y --no-install-recommends \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  && docker-php-ext-configure gd \
  && docker-php-ext-install -j$(nproc) gd
#
# Enable apache modules
RUN a2enmod rewrite headers
#
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
# Update the mlocate.db database before first use
RUN updatedb
#
# Cleanup
RUN apt-get autoremove -y \
  && apt-get clean -y \
  && rm -rf /usr/src/* \
  && rm -rf /var/lib/apt/lists/*
#
# Switch back to dialog for any ad-hoc use of apt-get
ENV DEBIAN_FRONTEND=
