clean:
	rm -rf build

update:
	ppm --generate-package="src/Isolib"

build:
	mkdir build
	ppm --no-intro --compile="src/Isolib" --directory="build"

install:
	ppm --no-intro --no-prompt --fix-conflict --install="build/net.intellivoid.isolib.ppm"

install_fast:
	ppm --no-intro --no-prompt --skip-dependencies --fix-conflict --install="build/net.intellivoid.isolib.ppm"