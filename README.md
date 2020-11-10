# Connex
> **Author**
> Ben Hirst

### Installation
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
To clone this repository and set everything up, run the following commands
1. `cd connex`
2. `composer update`
3. `npm i`
4. `php artisan migrate`
5. `php artisan db:seed`

### Logs
In order to see which Microservices the request payload will be sent to, you'll need to view the logs:
`tail -f storage/logs/laravel.log`

### Run the Queue Worker
`php artisan queue:work`

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
