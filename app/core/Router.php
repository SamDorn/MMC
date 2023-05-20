<?php

namespace App\core;

class Router
{
    private Controller $controller;
    private Request $request;
    public array $routes = [];
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->controller = new Controller();
    }
    /**
     * Adds a GET route to the routes array by processing the path and callback
     * parameters.
     * 
     * @param string path A string representing the URL path for the route.
     * @param mixed callback The  parameter is a mixed type variable that represents the
     * function or method that will be executed when the specified route is accessed with the HTTP GET
     * method. It can be a closure, an array containing an object and a method name, or a string
     * containing a view.
     */
    public function get(string $path, mixed $callback): void
    {
        //Removes the slash from the beginning and the end of the string.
        $path = trim($path, '/');
        //Replaces the curly braces with a regex expression.
        $path = preg_replace('/{[^}]+}/', '(.+)', $path);
        $this->routes['get'][$path] = $callback;
    }
    /**
     * Adds a POST route to the routes array by processing the path and callback
     * parameters.
     * 
     * @param string path A string representing the URL path for the route.
     * @param mixed callback The  parameter is a mixed type, which means it can accept any
     * data type. In this case, it is expected to be a function or a method that will be executed when
     * the HTTP POST request is made to the specified path.
     */
    public function post(string $path, mixed $callback): void
    {
        $this->routes['post'][trim($path, '/')] = $callback;
    }
    /**
     * Based on the request made(URL) check if there
     * is a valid method that corrisponds to the 
     * path. If none is found a 404 code is thrown 
     * If it's just a string it renders the view.
     * If it's an array or callable invoke the call_user_func
     * which will execute the function.
     *
     * @return mixed html page, json
     */
    public function resolve(): mixed
    {
        $parsedUrl = $this->request->parseUrl($this->routes);
        $callback = $parsedUrl[0];
        $params = $parsedUrl[1];

        // Throws a 404 error if it doesn't exist and renders the view
        if (!$callback) {
            http_response_code(404);
            return $this->controller->render("_404");
        }

        // If the callback provided is a string, it just renders the view
        if (is_string($callback)) {
            return $this->controller->render($callback);
        }

        // If it's an array, it needs to create an instance of the class
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        /**
         * Execute the method inside the object which will be $callback[0]
         * and the method which will be in $callback[1].
         * call_user_func allows an array as the first argument only if it 
         * has two items with 0->class/object and 1->method
         */
        return call_user_func($callback, $this->request, $params);
    }
}
