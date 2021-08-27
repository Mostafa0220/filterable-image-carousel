# REST API creating a filterable image
A simple REST API for creating a filterable image carousel.
1. CLI command to convert the input CSV file  to a JSON and XML file store it "/storage/public/items.json" & "/storage/public/items.xml".

`<SourceCode>` : <https://github.com/Mostafa0220/filterable-image-carousel/blob/master/app/Console/Commands/ConvertCsv.php>

2. REST API to serve the contents of the JSON file filterable by name and pvp. Serving a
filtered response in XML format.

`<SourceCode>` : <https://github.com/Mostafa0220/filterable-image-carousel/blob/master/app/Http/Controllers/API/ItemController.php>


3. UniteTest:

3.1 `<Test ConvertCsv Command>` : <https://github.com/Mostafa0220/filterable-image-carousel/blob/master/tests/Feature/ConvertCsvTest.php>

3.2 `<Test Rest Api>` : <https://github.com/Mostafa0220/filterable-image-carousel/blob/master/tests/Feature/RestApiTest.php>


# Technologies
1. PHP Version 7.2
2. Laravel Framework  6.20.32

# Getting started
1. `git clone https://github.com/Mostafa0220/filterable-image-carousel.git && cd filterable-image-carousel`
2. `composer install`
3. `php artisan storage:link`
4. `php artisan serve`

# CLI command to convert the input CSV file to a JSON and XML file.:
1. You could use the following command to upload the csv file `php artisan convert:csv`
2. The console will prompt for the full url of your csv file you could enter example url : http://localhost:8000/csv/1.csv
3. if the csv's url is not valide a validation error will be displayed at the console
4. if csv file is imported and converted with no error a successfull message will displayed "2 files created!".
5. the code will covert the imported csv data to xml & json format and store the formatted data at the following paths
5.1 "/storage/public/items.json". 
5.2 "/storage/public/items.xml".

![CLI Command Success](http://mostafa.website/screenshot/cli-success.png)

![CLI Command Fail](http://mostafa.website/screenshot/cli-fail.png)

# REST API 1 to serve the contents of the JSON file.:
##### GET http://localhost:8000/api/items?name=Suit&pvp=500
 Rest API to filterable by name and pvp. Serving a filtered response in XML format.
![Rest API 1](http://mostafa.website/screenshot/rest-api1.png)

# REST API to serve the contents of the JSON file.:
##### GET http://localhost:8000/api/items
 Rest API to List all items without filter. Serving a response in XML format.
![Rest API 2](http://mostafa.website/screenshot/rest-api2.png)

# REST API 3 to serve the contents of the JSON file.:
 ##### GET http://localhost:8000/api/items?name=Suit
 Rest API to filterable by name only. Serving a filtered response in XML format.
![Rest API 3](http://mostafa.website/screenshot/rest-api3.png)

# TestCase of code:
 Running Tests. To run tests using PHP unit the Application, navigate to project root directory and run `./vendor/bin/phpunit` command
![Rest API 3](http://mostafa.website/screenshot/test.png)
