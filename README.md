# Connex
> **Author**
> Ben Hirst

The main functionality behind this project lives within the `app` folder. When an incoming request hits the payload endpoint (routes to `App\Http\Controllers\Api\PayloadController@payload`) within the api route it'll dispatch a `Payload` job to be processed. This currently works off the database Queue connection, which reads data from the `jobs` table within the database. The `Payload` job (`App\Jobs\Payload`) loads the Microservices we need to send the payload to using eloquent queries on the Microservice model (`App\Models\Microservice`)

#### Key files:
1. `app/Http/Controllers/Api/PayloadController.php`
2. `app/Jobs/Payload.php`
3. `app/Models/Microservice.php`

I've used a model & database table for storing the Microservice data as I imagine a dashboard could be created in order to allow changing the permissions for these microservices.

### Installation
If you haven't already set up Laravel and Laravel Valet then you'll need to follow the steps below
1. `brew update`
2. `brew install php`
3. Install [Composer](https://getcomposer.org/)
4. `composer global require laravel/installer`
5. `composer global require laravel/valet`
6. `valet install`
7. `valet link`
8. `brew install mysql@5.7`
9. `brew services start mysql@5.7`
10. `mysql_secure_installation`

### Getting Started
First, you'll need to set up a database for the tables to be created in. By default we call this `connex` within the `.env.example` file.
1. Start up mysql
    `mysql -u root`
2. Run the create database command
    `CREATE DATABASE connex;`
3. Exit out of mysql
    `exit`


To clone this repository and set everything up, run the following commands
1. `cd connex`
2. `composer update`
3. `npm i`
4. `cat .env.example > .env`
5. Edit the contents of the new `.env` file
    - Add your database credentials (required for next steps)
6. `php artisan migrate`
7. `php artisan db:seed`

### Run the Queue Worker
`php artisan queue:work`

### Logs
In order to see which Microservices the request payload will be sent to, you'll need to view the logs:
`tail -f storage/logs/laravel.log`

### Making a request
```
curl --location --request POST 'http://connex.test/api/payload' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "Jimmy Joe",
    "phone": "07707000001",
    "email": "jim@collier.com",
    "query_type": {
        "id": 5678,
        "title": "DECLINED OFFER"
    },
    "call_stats": {
        "id": 1213,
        "length": "00:56:43",
        "recording_url": "http://remote.system/recording/1213"
    },
    "campaign": {
        "id": 1011,
        "name": "Campaign A",
        "description": "A lovely campaign for Michael"
    }
}'
```
