# REST API creating a filterable image
A simple REST API for creating a filterable image carousel.
# Technologies
1. PHP Version 7.2
2. Laravel Framework  6.20.32

# Getting started
1. `git clone https://github.com/Mostafa0220/filterable-image-carousel.git && cd filterable-image-carousel`
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. `php artisan storage:link`
6. `php artisan serve`

# CLI command to convert the input CSV file to a JSON and XML file.:
1. You could use the following command to upload the csv file `php artisan convert:csv`
2. The console will prompt for the full url of ur csv file you could enter example url : http://localhost:8000/csv/1.csv
3. if the csv's url is not valide a validation error will be displayed at the console
4. if csv file is imported and converted with no error a successfull message will displayed "2 files created!".
5. the code will covert the imported csv data to xml & json format and store the formatted data at the following paths
5.1 "/storage/public/items.json". 
5.2 "/storage/public/items.xml".

![CLI Command Success](https://www.screencast.com/t/2x26nnZexG)

![CLI Command Fail](https://www.screencast.com/t/M3zFBfEOt)

# REST API 1 to serve the contents of the JSON file.:
GET http://localhost:8000/api/items?name=Suit&pvp=500
 Rest API to filterable by name and pvp. Serving a filtered response in XML format.
![Rest API 1](https://www.screencast.com/t/xeKZGFJmHHdJ)

# REST API to serve the contents of the JSON file.:
GET http://localhost:8000/api/items
 Rest API to List all items without filter. Serving a response in XML format.
![Rest API 2](https://www.screencast.com/t/2jo2T6KJR)

# REST API 3 to serve the contents of the JSON file.:
 GET http://localhost:8000/api/items?name=Suit
 Rest API to filterable by name only. Serving a filtered response in XML format.
![Rest API 3](https://www.screencast.com/t/gcokVJIt)
