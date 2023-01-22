# Learn About Php
## Some Key Points to remember
- Declaring a Variable
    ```php
        <?php
            $name = "Pawan kushwah";
            $class = 12;

            echo "My name is $name. I have passed out $class th";
            echo "My name is" . $name . ". I have passed out " . $class . "th class";
        ?>
    ```
- In PHP we can comment with "#" , "//" and "/* */"
  ```php
    <?php
        # single line comment
        // this is also single line comment
        /* 
            This is multi line comment 
         */
    ?>
  ```
- We can access global variable with the help of "global" keyword
```php
    <?php
        $x = 5;
        $y = 10;

        // Function in PHP
        function myTest() {
            global $x, $y;
            $y = $x + $y;
        }

        myTest();
        echo $y; // outputs 15
    ?>
```
- One more way to access global variables is GLOBAL array
```php
    <?php
        $x = 5;
        $y = 10;

        function myTest() {
            $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
        }

        myTest();
        echo $y; // outputs 15
    ?>
```
- When a function is completed/executed, all of its variables are deleted. However, sometimes we want a local variable NOT to be deleted. We need it for a further job. Then, each time the function is called, that variable will still have the information it contained from the last time the function was called.
```php
    <?php
        function myTest() {
            static $x = 0;
            echo $x;
            $x++;
        }

        myTest();
        myTest();
        myTest();
    ?>
```
- echo returns nothing, echo is faster than print, echo can takes multiple argument
- print returns 1, take one argument only
```php
    <?php
        $technology = "PHP";
        $message = "Hello World!";

        echo "<h2>",$techology, " is Fun!</h2>";
        print $message . "<br>";
        print "I'm about to learn PHP!";
    ?>
```
- Data Types in PHP
    * String
    * Integer
    * Float (floating point numbers - also called double)
    * Boolean
    * Array
    * Object
    * NULL
    * Resource
- var_dump() function returns the data type and value
```php
    <?php
        $x = 5985;
        var_dump($x);
    ?>
```
- Array in php
```php
    <?php
        $cars = array("Volvo","BMW","Toyota");
        var_dump($cars);
    ?>
```
- A class is a template for objects, and an object is an instance of a class. Below is an example of object
```php
    <?php
        class Car {
            public $color;
            public $model;
            public function __construct($color, $model) {
                $this->color = $color;
                $this->model = $model;
            }
            public function message() {
                return "My car is a " . $this->color . " " . $this->model . "!";
            }
        }

        $myCar = new Car("black", "Volvo");
        echo $myCar -> message();
        echo "<br>";
        $myCar = new Car("red", "Toyota");
        echo $myCar -> message();
    ?>
```

### String Functions
* strlen( ) - returns length of string
* str_word_count( ) - Returns Word Count
* strrev( ) - Returns string with reverse order
* strpos( , ) - returns the position of char from where given string is starting
* str_replace( , , ) - 
```php
    <?php
        // Replace world with dolly in hello world!
        echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
    ?>
```
* [String Reference](https://www.w3schools.com/php/php_ref_string.asp)
* Some constants in for numbers
  * PHP_INT_MAX - The largest integer supported
  * PHP_INT_MIN - The smallest integer supported
  * PHP_INT_SIZE -  The size of an integer in bytes
* Checking whether variable is string or not : is_int(), is_integer() and is_long()
* [Numbers reference](https://www.w3schools.com/php/php_numbers.asp)
* [Math functions reference](https://www.w3schools.com/php/php_ref_math.asp)
* Constants in PHP
  * syntax: define(name, value, is_case-insensitive <default false>)
  * Constants are global
* Operators in PHP
  * \** - Exponentiation
  * <> - not equal to
  * <=> - spaceship returns { -1 : less than, 0 : equal, 1 : greater than }
  * . - concatenation 
  * .= - concatenation assignment
  * ??	- Null coalescing
    ```php
        <?php
            // variable $user is the value of $_GET['user']
            // and 'anonymous' if it does not exist
            echo $user = $_GET["user"] ?? "anonymous";
            echo("<br>");
            
            // variable $color is "red" if $color does not exist or is null
            echo $color = $color ?? "red";
        ?>
    ```
* conditionals keyword : if..elseif..if
* Loops : while, do..while, for and foreach...as
* starting strict mode
```php
    <?php 
        declare(strict_types=1); // strict requirement
        function setHeight(int $minheight = 50) {
            echo "The height is : $minheight <br>";
        }

        setHeight(350);
        setHeight(); // will use the default value of 50
        setHeight(135);
        setHeight(80);
    ?>
```
* To declare a type for the function return, add a colon ( : ) and the type right before the opening curly ( { )bracket when declaring the function.
```php
    <?php declare(strict_types=1); // strict requirement
        function addNumbers(float $a, float $b) : float {
            return $a + $b;
        }
        echo addNumbers(1.2, 5.2);
    ?>
```
* Pass by reference
```php
    <?php
        function add_five(&$value) {
            $value += 5;
        }

        $num = 2;
        add_five($num);
        echo $num;
    ?>
```
* PHP Associative Arrays - array with key value pair
```php
    <?php
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        foreach($age as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
        }
    ?>
```
* [Arrays reference](https://www.w3schools.com/php/php_ref_array.asp)
* [Arrays sorting Functions](https://www.w3schools.com/php/php_arrays_sort.asp)
* PHP SuperGlobals
    - $GLOBALS
    - $_SERVER
      - [Server elements](https://www.w3schools.com/php/php_superglobals_server.asp)
    - $_REQUEST
    - $_POST
    - $_GET
    - $_FILES
    - $_ENV
    - $_COOKIE
    - $_SESSION

#### important code while submitting form

```php
    <html>
    <body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
    }
    ?>

    </body>
    </html>
```