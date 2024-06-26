
# Online Returned Order System

## A project of someone

# Prerequisite
- Docker Desktop, Engine
- Docker Compose Plugin
- Installed Make GNU

# Build and Run Local Development

## Build Docker Images
- make dev-build-no-cache
- make dev-up

## Install Composer, Migration and Seed Data
- composer install
- php artisan app:init

## Build User Interface
- npm i
- npm build

## Users ang Host
- Link: `http://localhost:87` By default nginx is mapped to `port 87`
- `username: super_admin@example.com`
- `password: super_admin`
