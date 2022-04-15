## Test NewWay

This application was developed to demonstrate the candidate's technical knowledge, such as programming logic, solutions used, design pattern and the like as shown below:.


- Desing Pattern (Service, Repository, DDD and Clean Code)
- Docker with composer install and artisan migration AUTOMATIC
- Docker with simple code: docker-compose.yml and folder docker-image
- Easy access route to view what was requested use NewWay.postman_collection.json

## How to start the project

First
- git clone https://github.com/JeandePaula/api-newway.git

Second
- Inside the project root, run the command: **docker-compose up -d**, and wait 30 seconds.

Third
- Import the requests made available in the **NewWay.postman_collection.json** file to postman

Fourth
- You can perform the tests on the following endpoint: **localhost:8000**


## How to make requests in the api


**First**
- Request the token via http://{{url}}/login and send a json containing email and password, json:
```json
{
    "email": "contato@joao.com.br",
    "password": "123456"
}
```

- Copy the generated token and paste in the token environment variable, json:
```json
{
    "token": "1|wlrL46PufNopJYQxLzdbWRH1Ye7ed1MqQwawWWJ9"
}
```

**Second**
- Make a get request at http://{{url}}/ranking/movie with the generated token to view the ranking of movies, json:
```json
{
    "data": [
        {
            "name": "Viúva Negra",
            "votes": 6
        },
        {
            "name": "Homem Aranha",
            "votes": 3
        },
        {
            "name": "Doutor Estranho",
            "votes": 3
        }
    ]
}
```

**Third**
- Make a post request at http://{{url}}/ranking to vote, just send the product_id, json:
```json
{
    "product_id": 3
}
```

## License

The Laravel framework is open-sourced software licensed under the MIT license(https://opensource.org/licenses/MIT).
