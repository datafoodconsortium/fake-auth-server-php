Authorization App
=================

This app is a fake authentication layer for the [Data Food Consortium prototype](https://github.com/datafoodconsortium/dfc-prototype.github.io).

What's inside ?
---------------

- A basic [authorization interface](https://www.oauth.com/oauth2-servers/authorization/) for OAuth2,
supporting the implicit grant flow.

Requirements
------------

This project needs [Docker](https://docs.docker.com).

How to use ?
------------

The application uses environment variables to customize the authorization interface (name, background color and logo).

```sh
# build the docker image
docker build . -t dfc/fake-auth-server-php

# start a container mapping to host port 8001
docker run -it --rm \
    -p '8001:8000' \
    -e PLATFORM_NAME='La Ruche qui dit Oui !' \
    -e PLATFORM_BGCOLOR='#FBCF06' \
    -e PLATFORM_LOGO='https://laruchequiditoui.fr/favicon.ico' \
    dfc/fake-auth-server-php

# browse!
xdg-open http://localhost:8001
```

A `Makefile` is provided to help with those steps:

```
make build

make start-lrqdo
make start-ofn

make stop-lrqdo
make stop-ofn
```
