# Phalcon Test

phpunit test for phalcon project

## step

1. `docker-compose up -d` 启动服务
2. `cd src` and `compose install` (如果不需要测试则不可不安装)

## IDE 配置

在 `php/php.ini` 中注意以下配置

```ini
zend_extension=xdebug.so
[xdebug]
xdebug.mode=debug,develop
xdebug.discover_client_host=0
xdebug.idekey=docker
xdebug.start_with_request=yes
xdebug.client_port=19003
xdebug.client_host=host.docker.internal

# remember your port, here is 19003, IDE Key is docker
```

在 `docker-compose.yaml` 中注意以下配置

```yaml
services:
  php:
    environment:
      PHP_IDE_CONFIG: "serverName=docker-php"
    extra_hosts:
      - host.docker.internal:host-gateway

# remember the serverName docker-php
```

### PHPStorm

安装插件

* PHP Remote Interpreter
* PHP Docker
* FTP/SFTP/WebDAV Connectivity
* Docker

#### Web Debug

![PHP-Debug-DBGp Proxy](./docs/imgs/DBGp.jpg)

注意 `IDE key` 和 访问端口

![PHP-Servers](./docs/imgs/servers.jpg)

注意：`Name` 要跟 `PHP_IDE_CONFIG` 配置的相同

![PHP-Debug](./docs/imgs/xdebug-port.jpg)

注意：如果你本地已经安装了 php 和 xdebug，那么需要移除 `9003,9000` 端口，否则会一直提示 `9003 is busy`

![Web Debug 配置](./docs/imgs/web-debug.jpg)

![Web Debug OK](./docs/imgs/web-debug-ok.jpg)

#### PHPUnit(PHP Cli)

* add docker

![Docker](./docs/imgs/docker.jpg)

* add php cli

![php cli](./docs/imgs/docker-php-cli.jpg)
![php cli](./docs/imgs/docker-php-cli2.jpg)

在 Docker Desktop 中进入 php 服务，或者通过命令进入 `docker-compose exec php sh`，执行测试操作 `php phpunit.phar -c ./phpunit.xml`

![phpunit in docker](./docs/imgs/phpunit-docker.jpg)

如果需要在 PHPStorm 中执行，还需要以下配置

![php cli test](./docs/imgs/php-cli-test.jpg)

在 PHPStorm 中实现相同的命令

![test 全部](./docs/imgs/phpunit-phpstorm.jpg)

单独测试一个控制器

![test controller](./docs/imgs/phpstorm-test.jpg)