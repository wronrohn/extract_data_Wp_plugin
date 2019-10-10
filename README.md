# A wordpress plugin to extract data from an external api and display it as categories on the sidebar


## Installation

You need a file to provide the plugin with a URL and a header for the URL as a ```config.php``` file

The format of that PhP file will be as follows:

```php
<?php
$url = "http://my-example-api-site-with-a-value-labelled-tags.com/modules";
$header= "nameOfTheHeaderKey: theUniqueAPIKey"
```


Please note that if there is no ```config.php``` and a value called ```data``` in your returned JSON from the API the plugin will *NOT* work.
Change the PhP file to have a better output for you JSON file.

Contact ```rohnitshetty15@gmail.com``` for suggestions and adivices on your API

