Authorization App
=================

This app is a fake authentication layer for the [Data Food Consortium prototype](https://github.com/datafoodconsortium/dfc-prototype.github.io).

What's inside ?
---------------

- A basic [authorization interface](https://www.oauth.com/oauth2-servers/authorization/) for OAuth2,
supporting the implicit grant flow.

Requirements
------------

This project needs [Docker Composer](https://docs.docker.com/compose/).

How to use ?
------------

```sh
# start the project
docker-compose up

# browse!
xdg-open http://localhost:8000
```
