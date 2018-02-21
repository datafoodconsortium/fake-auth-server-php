.PHONY: build
build:
	docker build . -t dfc/fake-auth-server-php

.PHONY: start-lrqdo
start-lrqdo:
	docker run -it -d --rm \
		--name 'dfc_fake_auth_server_lrqdo' \
		-p '8001:8000' \
		-e PLATFORM_NAME='La Ruche qui dit Oui !' \
		-e PLATFORM_BGCOLOR='#FBCF06' \
		-e PLATFORM_LOGO='https://laruchequiditoui.fr/favicon.ico' \
		dfc/fake-auth-server-php

.PHONY: start-ofn
start-ofn:
	docker run -it -d --rm \
		--name 'dfc_fake_auth_server_ofn' \
		-p "8002:8000" \
		-e PLATFORM_NAME='Open Food Network' \
		-e PLATFORM_BGCOLOR='#F2795C' \
		-e PLATFORM_LOGO='https://www.openfoodfrance.org/favicon.ico' \
		dfc/fake-auth-server-php

.PHONY: stop-lrqdo
stop-lrqdo:
	docker stop -t 0 dfc_fake_auth_server_lrqdo

.PHONY: stop-ofn
stop-ofn:
	docker stop -t 0 dfc_fake_auth_server_ofn
