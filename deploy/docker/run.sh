#!/bin/bash

echo "Running master web"
docker stop soul.technology || true && docker rm soul.technology || true
docker run -d -p 80:80 --name soul.technology registry.github.com/soul-technology-labs/soul.technology:v0.1
