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
   
3. Change any of the following environment variables in the `.env` file if you're experiencing conflicts with ips or ports:

   ```properties
    WEB_HOSTNAME=127.0.0.200
    IPV4_NETWORK=173.25.2
    REDIS_PORT=6380
    DATABASE_HOST_PORT=3307
   ```

The above values are intended to avoid conflicts with other services running on your machine. You can change them to whatever you want.

4. MacOS Instructions

   * The `cp .env.example .env` instructions had to run prior to running the docker-compose up --build -d after running into this error message Failed to load /Users/test/Documents/projects/laravel-sandbox/.env: open /Users/test/Documents/projects/laravel-sandbox/.env: no such file or directory

   * if running an M1 or M2 ARM processor add the platform property listed below

      ```properties
      db:
         container_name: sandbox_app_db
         platform: linux/amd64 # needed for macos
      ```

      the error message will look something like this 
      `failed to solve: mysql:5.7: no match for platform in manifest sha256:f566819f2eee3a60cf5ea6c8b7d1bfc9de62e34268bf62dc34870c4fca8a85d1: not found`

   * Error: SQLSTATE[HY000] [2002] Connection refused 
      * At this point I userd the .env.docker file instead of the .env.example file provided in the instructions.  
      * Updated the mysql credentials in the docker/mysql/vars.env to match the docker files credentials 
      * Commented out the code below
         ```properties
            # Customized values for the sandbox
            # This prevents conflicts with other containers
            # WEB_HOSTNAME=127.0.0.200
            # IPV4_NETWORK=173.25.2
            # REDIS_PORT=6380
            # DATABASE_HOST_PORT=3307
         ```
