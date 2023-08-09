# Laravel 10x Sandbox Project

Welcome to the Laravel 10x Sandbox project! This repository serves as a test environment for different purposes. The project is containerized using Docker to ensure a smooth and consistent setup across different machines. Below are the instructions to set up and run the project.

## Prerequisites

1. [Docker](https://www.docker.com/get-started) - Ensure Docker is installed on your machine.
2. [Docker Compose](https://docs.docker.com/compose/install/) - Docker Compose is used to define and manage multi-container Docker applications.

## Setup & Installation

1. **Clone the Repository**

   Start by cloning the repository to your local machine:

   ```
   git clone https://github.com/Elentra-Training/laravel-sandbox.git laravel-sandbox
   cd laravel-sandbox
   ```

2. **Start Docker Containers**

   Use Docker Compose to build and start the services:

   ```
   docker-compose up --build -d
   ```

   This command will:

    - `--build`: Build the images if necessary.
    - `-d`: Run the containers in detached mode (in the background).

3. **Setup Laravel Environment**

   After the Docker containers are up, copy the `.env.example` to `.env`:

   ```
   cp .env.docker .env
   ```

    Then go into the `sandbox_app` container and execute the installation command.

   ```
   docker exec -it sandbox_app bash
   ```

   This command will install all composer dependencies, generate the application key and run migrations.

   ```
   install-app
   ```

4. **Setup Hosts Enviroment**

   Add the following line to your `/etc/hosts` file:

   ```
   127.0.0.200     laravel-sandbox.com
   ```

   You can change the IP address to whatever you want with the following env var.

   ```properties
   WEB_HOSTNAME=127.0.0.200 
   ```

5. **Access the Application**

   With the containers running, you should be able to access the Laravel application via your browser:

   ```
   laravel-sandbox.com
   ```

## Usage

Once you've set up the project, you can create features for the project.

## Troubleshooting

If you encounter any issues while setting up or running the project:

1. Check Docker logs for any evident issues:

   ```
   docker-compose logs
   ```

2. Ensure all Docker services are running:

   ```
   docker-compose ps
   ```
