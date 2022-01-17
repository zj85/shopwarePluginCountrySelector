#!/usr/bin/env bash
# Description: Generates all images and dumps converts the markdown files.

docker build -t shopware-plattform-plantuml dev-ops/docs/docker/plantuml/.
sh ./dev-ops/docs/scripts/render_puml.sh __DOCS_DIR__

bin/console docs:convert -i platform/src/Docs/Resources/current/ -o build/docs -u /shopware-platform-dev
