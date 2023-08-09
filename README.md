# My PHP Application

This is a PHP application developed using Docker Compose for local development. It includes a PostgreSQL database, PHP-FPM, and Nginx.

## Requirements

- Docker
- Docker Compose
- git
- gnu-make

## Getting Started

1. Clone the repository:

```sh
git clone https://github.com/delirehberi/php_login_system.git
cd php_login_system
```

## Commands

### Build the Docker image:

```sh
make build
```

This command builds the Docker image named `login_system:latest`.

### Start the containers:

```sh
make start
```

This command starts the Docker containers in the background.

### Stop the containers:

```sh
make stop
```

This command stops the running Docker containers.

### Remove the containers and volumes:

```sh
make remove
```

This command stops and removes the containers, as well as associated volumes.

### Access the PostgreSQL container:

```sh
make db
```

This command opens a bash shell in the PostgreSQL container.

### Access the PHP container:

```sh
make shell
```

This command opens a bash shell in the PHP container.

### Reset (stop, remove, and start):

```sh
make reset
```

This command performs a full reset by stopping, removing containers and volumes, and then starting again.

### Install Composer Dependencies:

```sh
make shell
composer install
```

This command connects to the PHP container and runs `composer install` to install project dependencies.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
