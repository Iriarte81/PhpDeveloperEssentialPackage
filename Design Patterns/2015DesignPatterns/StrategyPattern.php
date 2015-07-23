<?php
/* The Strategy pattern:
 * Defines a family of algorithms (a number of classes that perform similar functions)
 * encapsulates each one (makes them adhere to an interface)
 * and makes them interchangeable.
 * Leveraging polymorphism we are able to build
 * loosely coupled applications where we are able to
 * swap in and out various components at runtime.
 */


interface Logger {
    public function log($data);
}


class LogToFile implements Logger {

    public function log($data) {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger{

    public function log($data) {
        var_dump('Log the data to a database');
    }
}

class LogToXWebService implements Logger{

    public function log($data) {
        var_dump('Log the data to a Sass Web Service');
    }
}

class App {
    public function log($data, Logger $logger) {
        $logger->log($data);
    }
}

$app = new App;

$app->log('Some informatin here', new LogToFile);
$app->log('Some informatin here', new LogToDatabase);
$app->log('Some informatin here', new LogToXWebService);