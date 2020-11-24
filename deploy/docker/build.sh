#!/bin/bash

echo "Build master web"
export TAG="v0.1"

#echo "$CI_REGISTRY_PASSWORD" | docker login registry.gitlab.com --username "$CI_REGISTRY_USERNAME" --password-stdin

cd ../../
docker build -t registry.github.com/soul-technology-labs/soul.technology:$TAG --file deploy/docker/Dockerfile .
#docker push registry.gitlab.com/soul.id/soul.id/website:$TAG
