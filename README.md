![Funct](http://phpfunct.io/github_logo.png)

A PHP library with commonly used code blocks for faster development

```PHP
Funct\firstValueNotEmpty($a, $b, $c)
```

[![Latest Version](https://img.shields.io/github/release/phpfunct/funct.svg?style=flat-square)]
(https://github.com/phpfunct/funct/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)]
(LICENSE)
[![Build Status](https://img.shields.io/travis/phpfunct/funct.svg?style=flat-square)]
(https://travis-ci.org/phpfunct/funct)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/phpfunct/funct.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/phpfunct/funct)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpfunct/funct.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/phpfunct/funct)
[![Total Downloads](https://img.shields.io/packagist/dt/funct/funct.svg?style=flat-square)]
(https://packagist.org/packages/funct/funct)

[![Email](https://img.shields.io/badge/email-aurimas@niekis.lt-blue.svg?style=flat-square)]
(mailto:aurimas@niekis.lt)


* [Requirements](#requirements)
* [Installation](#install)
* [Usage](#usage)
* [Library](#library)
    * [General](#general)
        * [arrayKeyNotExists](#arraykeynotexistskey-array-array)
        * [false](#falsevalue)
        * [firstValue](#firstvaluevaluea)
        * [firstValueNotEmpty](#firstvaluenotemptyvaluea-valueb)
        * [notEmpty](#notemptyvalue)
        * [notInArray](#notinarrayneedle-haystack-strict--null)
        * [notNull](#notnullvalue)
        * [null](#nullvalue)
        * [tempFile](#tempfileprefix--php)
        * [true](#truevalue)
    * [Collection](#collection)
        * [compact](#compactcollection)
        * [countBy](#countbycollection-callback)
        * [every](#everycollection-callable-callback--null)
        * [findWhere](#findwherecollection-value)
        * [first](#firstcollection)
        * [firstN](#firstncollection-n--1)
        * [flatten](#flattencollection-depth--1)
        * [flattenAll](#flattenallcollection)
        * [forEvery](#foreverycollection-callable)
        * [get](#getcollection-key-default--null)
        * [groupBy](#groupbycollection-callback)
        * [initial](#initialcollection-n--1)
        * [intersection](#intersectioncollectionfirst-collectionsecond)
        * [invoke](#invokecollection-callable-callback)
        * [last](#lastcollection)
        * [lastIndexOf](#lastindexofcollection-value)
        * [lastN](#lastncollection-n--1)
        * [maxValue](#maxvaluecollection-callable-callback)
        * [merge](#mergea-b)
        * [minValue](#minvaluecollection-callable-callback)
        * [pairs](#pairscollection)
        * [partition](#partitioncollection-callable-callback)
        * [pluck](#pluckcollection-key)
        * [reject](#rejectcollection-callable-callback)
        * [rest](#restcollection-from--1)
        * [some](#somecollection-callable-callback--null)
        * [sortBy](#sortbycollection-sortby-sortfunction--asort)
        * [tail](#tailcollection-from--1)
        * [union](#unioncollectionfirst-collectionsecond)
        * [unzip](#unzipcollection)
        * [where](#wherecollection-value)
        * [without](#withoutcollection-without)
        * [zip](#zipcollectionfirst-collectionsecond)
    * [String](#string)
        * [between](#betweeninput-left-right)
        * [camelize](#camelizeinput-firstletteruppercase--false)
        * [chompLeft](#chompleftinput-prefix)
        * [chompRight](#chomprightinput-suffix)
        * [classify](#classifystring)
        * [collapseWhitespace](#collapsewhitespaceinput)
        * [contains](#containsinput-substring)
        * [countOccurrences](#countoccurrencesinput-substring)
        * [dasherize](#dasherizestring)
        * [endsWith](#endswithinput-substring)
        * [includes](#includesinput-substring)
        * [isAlpha](#isalphainput)
        * [isAlphaNumeric](#isalphanumericinput)
        * [isLower](#islowerinput-mb--false)
        * [isNumeric](#isnumericinput)
        * [isUpper](#isupperinput-mb--false)
        * [latinize](#latinizeinput)
        * [left](#leftstring-n)
        * [lines](#linesstring)
        * [lowerCaseFirst](#lowercasefirstinput)
        * [pad](#padstring-lenght-char---)
        * [padLeft](#padleftinput-lenght-char---)
        * [padRight](#padrightinput-length-char---)
        * [repeat](#repeatinput-n)
        * [right](#rightstring-n)
        * [slugify](#slugifystring)
        * [startsWith](#startswithinput-substring)
        * [strip](#stripstring-string1)
        * [stripPunctuation](#strippunctuationstring)
        * [times](#timesinput-n)
        * [titleize](#tosentencearray-delimiter----lastdelimiter---and-)
        * [toSentenceSerial](#tosentenceserialarray-delimiter----lastdelimiter--and-)
        * [truncate](#truncateinput-length-chars--)
        * [underscore](#underscorestring)
        * [upperCaseFirst](#uppercasefirstinput)
    * [Invoke](#invoke)
        * [ifCondition](#ifissetcallable-callable-values-key)
        * [ifIsset](#ifissetcallable-callable-values-key)
        * [ifNotEmpty](#ifnotemptycallable-callable-var)
    * [Object](#object)
        * [toArray](#toarrayobjects-valuemethod-keymethod--null)
* [Testing](#testing)
* [Contributing](#contributing)
* [License](#license)


## Requirements

* PHP >= 5.5


## Installation

Via Composer

``` bash
$ composer require funct/funct
```


## Usage

The library consist of five groups: *Collection*, *Invoke*, *Object*, *Strings* and *General*. Each group has it's own namespace
suffix (Only *General* uses root namespace).

To include all group functions just include root namespace at the top of the file:

```PHP
use Funct;
```

For single group functions you have two options. One is to include root namespace and call directly with full namespace for e.g.:

```PHP
use Funct;

Funct\Strings\classify('hello world');
```

or to include only single group for e.g.:

```PHP
use Funct\Strings;

Strings\classify('hello world');
```

If you are using PHP >=5.6 you can include only single function. For e.g.:

```PHP
use function Funct\Strings\classify;

classify('hello world');
```


## General

### arrayKeyNotExists($key, array $array)

Checks if the given key or index exists in the array

```PHP
Funct\arrayKeyNotExists(2, [1, 2]); // => true
Funct\arrayKeyNotExists(1, [1, 2]); // => false
```


### false($value)

Returns true if value is false

```PHP
Funct\false(false); // => true
Funct\false(true); // => false
```


### firstValue($valueA)

Returns a first non null value from function arguments

```PHP
Funct\firstValue('foo_bar'); // => 'foo_bar'
Funct\firstValue(null, 'foo_bar'); // => 'foo_bar'
Funct\firstValue(null, null, 'foo_bar'); // => 'foo_bar'
```


### firstValueNotEmpty($valueA, $valueB)

Returns a first not empty value from function arguments

```PHP
Funct\firstValueNotEmpty('foo_bar'); // => 'foo_bar'
Funct\firstValueNotEmpty('', 'foo_bar'); // => 'foo_bar'
Funct\firstValueNotEmpty('', null, 'foo_bar'); // => 'foo_bar'
```


### notEmpty($value)

Returns true if value is not empty

```PHP
Funct\notEmpty('fooBar'); // => true
Funct\notEmpty(''); // => false
```


### notInArray($needle, $haystack, $strict = null)

Checks if needle is not in array

```PHP
Funct\notInArray(3, [0, 1, 2]); // => true
Funct\notInArray(2, [0, 1, 2]); // => false
```


### notNull($value)

Returns true if value is not null

```PHP
Funct\notNull('fooBar'); // => true
Funct\notNull(null); // => false
```


### null($value)

Returns true if value is null


```PHP
Funct\null(null); // => true
Funct\null('fooBar'); // => false
```


### tempFile($prefix = 'php')

Generates temp file on systems temp folder with prefix


```PHP
Funct\tempFile('php'); // => /tmp/someFile.php
```


### true($value)

Returns true if value is true


```PHP
Funct\true(true); // => true
Funct\true(false); // => false
```

## Collection

### compact($collection)

Returns a copy of the array with all falsy values removed


```PHP
Collection\compact([0, 1, false, 2, '', 3]); // => [1, 2, 3]
```


### countBy($collection, $callback)

Sorts a array into groups and returns a count for the number of objects in each group. Similar to groupBy, but

```PHP
Collection\countBy(
	[1, 2, 3, 4, 5],
	function ($value) {
		return $value % 2 == 0 ? 'even': 'odd'; 
	}
); // => [1, 2, 3]
Collection\countBy(
    [
        ['color' => 'red', title => 'Foo'],
        ['color' => 'red', title => 'Foo'],
        ['color' => 'red', title => 'Foo'],
        ['color' => 'blue', title => 'Bar'],
        ['color' => 'blue', title => 'Bar']
    ],
    'color'
); // => ['red' => 3, 'blue => 2]
```


### every($collection, callable $callback = null)

Returns true if all of the values in the array pass the callback truth test.

```PHP
Collection\every([true, 1, null, 'yes']); // => false
Collection\every([true, 1, 'yes']); // => true
Collection\every(
    [2, 4, 6],
    function ($value) {
        return ($value % 2) === 0;
    }
); // => true
```


### findWhere($collection, $value)

Looks through the array and returns the first value that matches all of the key-value pairs listed in properties.


```PHP
Collection\findWhere(
    [
        ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
        ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
        ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
        ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
    ],
    ['author' => 'Shakespeare', 'year' => 1611]
); // => ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611]
```

### first($collection)

First value of collection

```PHP
Collection\first([1, 2, 3]); // => 1
```


### firstN($collection, $n = 1)

```PHP
Collection\firstN([1, 2, 3]); // => [1]
Collection\firstN([1, 2, 3], 2); // => [1, 2]
```


### flatten($collection, $depth = 1)

Flattens a nested array by depth.

```PHP
Collection\flatten(['a', ['b', ['c', ['d']]]]); // => ['a', 'b', ['c', ['d']]]
Collection\flatten(['a', ['b', ['c', ['d']]]], 2); // => ['a', 'b', 'c', ['d']]
Collection\flatten(['a', ['b', ['c', ['d']]]], 3); // => ['a', 'b', 'c', 'd']
```


### flattenAll($collection)

Flattens all arrays to single level

```PHP
Collection\flattenAll(['a', ['b', ['c', ['d']]]]); // => ['a', 'b', 'c', 'd']
```


### forEvery($collection, $callable)

Alias of invoke($collection, $callable)


### get($collection, $key, $default = null)

Returns item from collection if exists otherwise null or default value

```PHP
$collection = ['red' => []];

$collection['blue'] = Collection\get($collection, 'blue', []);
$collection['blue'][] = 'Hello World';

Collection\get($collection, 'red', ['empty']);
```


### groupBy($collection, $callback)

Splits a collection into sets, grouped by the result of running each value through callback. If callback is a string

```PHP
Collection\groupBy([1.3, 2.1, 2.4], function($num) { return floor($num); }); // => [1 => [1.3], 2 => [2.1, 2.4]]
Collection\groupBy(['one', 'two', 'three'], 'strlen'); // => [3 => ["one", "two"], 5 => ["three"]]
```

### initial($collection, $n = 1)

Returns everything but the last entry of the array. Especially useful on the arguments object. Pass n to exclude the

```PHP
Collection\initial([5, 4, 3, 2, 1]); // => [5, 4, 3, 2]
Collection\initial([5, 4, 3, 2, 1], 2); // => [5, 4, 3]
```


### intersection($collectionFirst, $collectionSecond)

Computes the list of values that are the intersection of all the arrays. Each value in the result is present in each

```PHP
Collection\intersection([1, 2, 3], [101, 2, 1, 10], [2, 1]); // => [1, 2]
```

### invoke($collection, callable $callback)

Invokes callback on each value in the list. Any extra arguments passed will be forwarded on to the method invocation.

```PHP
Collection\invoke(['a', 'b', 'c'], 'strtoupper'); // => ['A', 'B', 'C']
```


### last($collection)

Returns last element of array

```PHP
Collection\last([1, 2, 3]); // => 3
```

### lastIndexOf($collection, $value)

Returns the index of the last occurrence of value in the array, or false if value is not present

```PHP
Collecton\lastIndexOf([1, 2, 3, 1, 2, 3], 2); // => 4
```


### lastN($collection, $n = 1)

Returns the last element of an array. Passing n will return the last n elements of the array.

```PHP
Collection\lastN([1, 2, 3]); // => [3]
Collection\lastN([1, 2, 3], 2); // => [2, 3]
```


### maxValue($collection, callable $callback)

Returns the maximum value in collection using callback method


```PHP
Collection\minValue(
    [
        10 => [
            'title' => 'a',
            'size'  => 1
        ],
        20 => [
            'title' => 'b',
            'size'  => 2
        ],
        30 => [
            'title' => 'c',
            'size'  => 3
        ]
    ],
    function ($item) {
        return $item['size'];
    }
); // => [
     'title' => 'c',
     'size'  => 3
 ]
```

### merge(&$a, $b)

Merges all arrays to first array

```PHP
$array = [1, 2];
Collection\merge($array, [3, 4], [5, 6]);

$array // => [1, 2, 3, 4, 5, 6];
```

### minValue($collection, callable $callback)

Returns the minimum value in collection using callback method

```PHP
Collection\minValue(
    [
        10 => [
            'title' => 'a',
            'size'  => 1
        ],
        20 => [
            'title' => 'b',
            'size'  => 2
        ],
        30 => [
            'title' => 'c',
            'size'  => 3
        ]
    ],
    function ($item) {
        return $item['size'];
    }
); // => [
     'title' => 'a',
     'size'  => 1
 ]
```


### pairs($collection)

Convert an array into a list of [key, value] pairs.

```PHP
Collection\pairs([1, 2, 3]); // => [[0, 1], [1, 2], [2, 3]]
```


### partition($collection, callable $callback)

Split array into two arrays: one whose elements all satisfy callback and one whose elements all do not satisfy


```PHP
Collection\partition([1, 2, 3, 4, 5, 6, 7, 8, 9], function ($num) { return $num % 2 === 0; }); // => [[0, 2, 4, 6, 8], [1, 3, 5, 7, 9]]
```

### pluck($collection, $key)

Extract single property from array of arrays

```PHP
Collection\pluck(
    [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ],
    0
); // => [1, 4, 7]
```

### reject($collection, callable $callback)

Returns the values in array without the elements that the truth test callback passes. The opposite of array_filter.

```PHP
Collection\reject([1, 2, 3, 4, 5, 6], function($num) { return $num % 2 == 0; }); // => [1, 3, 5]
```


### rest($collection, $from = 1)

Returns the rest of the elements in an array. Pass an from to return the values of the array from that index onward.

```PHP
Collection\rest([5, 4, 3, 2, 1]); // => [4, 3, 2, 1]
```

### some($collection, callable $callback = null)

Returns true if any of the values in the array pass the callback truth test.

```PHP
Collection\some([null, 0, 'yes', false]); // => true
```


### sortBy($collection, $sortBy, $sortFunction = 'asort')

Returns a sorted array by callback function which should return value to which sort

```PHP
Collection\sortBy([1, 2, 3, 4, 5, 6], function ($num) { return sin(num); }); // => [5, 4, 6, 3, 1, 2]
```


### tail($collection, $from = 1)

Alias of rest($collection, $from = 1)


### union($collectionFirst, $collectionSecond)

Computes the union of the passed-in arrays: the list of unique items, in order, that are present in one or more of

```PHP
Collection\union([1, 2, 3], [101, 2, 1, 10], [2, 1]); // => [1, 2, 3, 101, 10]
```

### unzip($collection)

The opposite of zip. Given a number of arrays, returns a series of new arrays, the first of which contains all of

```PHP
Collection\unzip([['moe', 'larry', 'curly'], [30, 40, 50], [true, false, false]]); // => ["moe", 30, true], ["larry", 40, false], ["curly", 50, false]
```


### where($collection, $value)

Looks through each value in the array, returning an array of all the values that contain all of the key-value pairs

```PHP
Collection\findWhere(
    [
        ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
        ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
        ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
        ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
    ],
    ['author' => 'Shakespeare', 'year' => 1611]
); // => [
    1 => ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
    2 => ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611]
]
```


### without($collection, $without)

Returns a copy of the array with all instances of the values removed.

```PHP
Collection\without([1, 2, 1, 0, 3, 1, 4], 0, 1); // => [2, 3, 4]
```


### zip($collectionFirst, $collectionSecond)

Merges together the values of each of the arrays with the values at the corresponding position.

```PHP
Collection\zip(['moe', 'larry', 'curly'], [30, 40, 50], [true, false, false]); // => [["moe", 30, true], ["larry", 40, false], ["curly", 50, false]]
```

## String

### between($input, $left, $right)

Extracts the string between two substrings

```PHP
Strings\between('<a>foo</a>', '<a>', '</a>'); // => 'foo'
Strings\between('<a>foo</a></a>', '<a>', '</a>'); // => 'foo'
Strings\between('<a><a>foo</a></a>', '<a>', '</a>'); // => '<a>foo'
Strings\between('<a>foo', '<a>', '</a>'); // => ''
Strings\between('Some strings } are very {weird}, dont you think?', '{', '}'); // => 'weird'
Strings\between('This is a test string', 'test'); // => ' string'
Strings\between('This is a test string', '', 'test') // => 'This is a '
```

### camelize($input, $firstLetterUppercase = false)

Camelizes string

```PHP
Strings\camelize('data_rate'); //'dataRate'
Strings\camelize('background-color'); //'backgroundColor'
Strings\camelize('-moz-something'); //'MozSomething'
Strings\camelize('_car_speed_'); //'CarSpeed'
Strings\camelize('yes_we_can'); //'yesWeCan'Strings\camelize(
```

### chompLeft($input, $prefix)

Removes prefix from start of string

```PHP
Strings\chompLeft('foobar', 'foo'); //'bar'
Strings\chompLeft('foobar', 'bar'); //'foobar'
```

### chompRight($input, $suffix)

Removes suffix from end of string

```PHP
Strings\chompRight('foobar', 'bar'); // => 'foo'
Strings\chompRight('foobar', 'foo'); // => 'foobar'
```

### classify($string)

Converts string to camelized class name. First letter is always upper case

```PHP
Strings\classify('className'); // => ClassName
```


### collapseWhitespace($input)

Collapse multiple spaces

```PHP
Strings\collapseWhitespace("  String   \t libraries are   \n\n\t fun\n!  "); // => 'String libraries are fun !'
```


### contains($input, $substring)

Check if string contains substring

```PHP
Strings\contains('PHP is one of the best languages!', 'one'); // => true
```

### countOccurrences($input, $substring)

Count the occurrences of substring in string

```PHP
Strings\countOccurrences('AN likes to program. AN does not play in the NBA.', "AN"); // => 2
Strings\countOccurrences('Does not exist.', "Flying Spaghetti Monster"); // => 0
Strings\countOccurrences('Does not exist.', "Bigfoot");  // => 0
Strings\countOccurrences('PHP is fun, therefore Node.js is fun', "fun"); // => 2
Strings\countOccurrences('funfunfun', "fun"); // => 3
```

### dasherize($string)

Converts hyphens and camel casing to underscores

```PHP
Strings\dasherize('dataRate'); // => 'data-rate'
Strings\dasherize('CarSpeed'); // => 'car-speed'
Strings\dasherize('yesWeCan'); // => 'yes-we-can'
Strings\dasherize('backgroundColor'); // => 'background-color'
```

### endsWith($input, $substring)

Check if string ends with substring

```PHP
Strings\endsWith("hello jon", 'jon'); // => true
```

### includes($input, $substring)

Alias of contains

### isAlpha($input)

Check if string contains only letters

```PHP
Strings\isAlpha("afaf"); // => true
Strings\isAlpha('fdafaf3'); // => false
Strings\isAlpha('dfdf--dfd'); // => false
```

### isAlphaNumeric($input)

Check if string contains only alphanumeric

```PHP
Strings\isAlphaNumeric("afaf35353afaf"); // => true
Strings\isAlphaNumeric("FFFF99fff"); // => true
Strings\isAlphaNumeric("99"); // => true
Strings\isAlphaNumeric("afff"); // => true
Strings\isAlphaNumeric("Infinity"); // => true
Strings\isAlphaNumeric("-Infinity"); // => false
Strings\isAlphaNumeric("-33"); // => false
Strings\isAlphaNumeric("aaff.."); // => false
```

### isLower($input, $mb = false)

Checks if letters in given string are all lowercase.

```PHP
Strings\isLower('a'); // => true
Strings\isLower('z'); // => true
Strings\isLower('B'); // => false
Strings\isLower('hiAN'); // => true
Strings\isLower('hi AN'); // => false
Strings\isLower('HelLO'); // => false
```

### isNumeric($input)

Check if string contains only digits

```PHP
Strings\isNumeric("3"); // => true
Strings\isNumeric("34.22"); // => false
Strings\isNumeric("-22.33"); // => false
Strings\isNumeric("NaN"); // => false
Strings\isNumeric("Infinity"); // => false
Strings\isNumeric("-Infinity"); // => false
Strings\isNumeric("AN"); // => false
Strings\isNumeric("-5"); // => false
Strings\isNumeric("000992424242"); // => true
```

### isUpper($input, $mb = false)

Checks if letters in given string are all uppercase.

```PHP
Strings\isUpper('a'); // => false
Strings\isUpper('z');  // => false
Strings\isUpper('B'); // => true
Strings\isUpper('HIAN'); // => true
Strings\isUpper('HI AN'); // => false
Strings\isUpper('HelLO'); // => true
```

### latinize($input)

Remove accents from latin characters

```PHP
Strings\latinize('crème brûlée'); // => 'creme brulee'
```

### left($string, $n)

Return the substring denoted by n positive left-most characters

```PHP
Strings\left('My name is AN', 2); // => 'My'
Strings\left('Hi', 0); // => ''
Strings\left('My name is AN', -2); // => 'AN', same as right(2)
```

### lines($string)

Returns an array with the lines. Cross-platform compatible


```PHP
Strings\lines("My name is AN\nPHP is my fav language\r\nWhat is your fav language?"); // => [ 'My name is AN',
                                                                                                     'PHP is my fav language',
                                                                                                     'What is your fav language?' ]
```

### lowerCaseFirst($input)

Converts string first char to lowercase

```PHP
Strings\lowerCaseFirst('HelloWorld'); // => 'helloWorld
```

### pad($string, $lenght, $char = ' ')

Pads the string in the center with specified character. char may be a string or a number, defaults is a space

```PHP
Strings\pad('hello', 5); // 'hello'
Strings\pad('hello', 10); // '   hello  '
Strings\pad('hey', 7); // '  hey  '
Strings\pad('hey', 5); // ' hey '
Strings\pad('hey', 4); // ' hey'
Strings\pad('hey', 7, '-');// '--hey--'
```

### padLeft($input, $lenght, $char = ' ')

Left pads the string

```PHP
Strings\padLeft('hello', 5); // => 'hello'
Strings\padLeft('hello', 10); // => '     hello'
Strings\padLeft('hello', 7); // => '  hello'
Strings\padLeft('hello', 6); // => ' hello'
Strings\padLeft('hello', 10, '.'); // => '.....hello'
```

### padRight($input, $length, $char = ' ')

Right pads the string

```PHP
Strings\padRight('hello', 5); // => 'hello'
Strings\padRight('hello', 10); // => 'hello     '
Strings\padRight('hello', 7); // => 'hello  '
Strings\padRight('hello', 6); // => 'hello '
Strings\padRight('hello', 10, '.'); // => 'hello.....'
```

### repeat($input, $n)

Alias times($input, $n)

### right($string, $n)

Return the substring denoted by n positive right-most characters

```PHP
Strings\right('I AM CRAZY', 2); // => 'ZY'
Strings\right('Does it work?  ', 4); // => 'k?  '
Strings\right('Hi', 0); // => ''
Strings\right('My name is AN', -2); // => 'My', same as left(2)
```

### slugify($string)

Converts the text into a valid url slug. Removes accents from Latin characters

```PHP
Strings\slugify('Global Thermonuclear Warfare'); // => 'global-thermonuclear-warfare'
Strings\slugify('Crème brûlée'); // => 'creme-brulee'
```

### startsWith($input, $substring)

Check if string starts with substring

```PHP
Strings\startsWith("AN is a software engineer", "AN"); // => true
Strings\startsWith('wants to change the world', "politicians"); // => false
```

### strip($string, $string1)

Returns a new string with all occurrences of [string1],[string2],... removed.

```PHP
Strings\strip(' 1 2 3--__--4 5 6-7__8__9--0', ' ', '_', '-'); // => '1234567890'
Strings\strip('can words also be stripped out?', 'words', 'also', 'be'); // => 'can    stripped out?'
```

### stripPunctuation($string)

Strip all of the punctuation

```PHP
Strings\stripPunctuation('My, st[ring] *full* of %punct)'); // => 'My string full of punct'
```

### times($input, $n)

Repeat the string n times

```PHP
Strings\times(' '); // => '     '
Strings\times('*'); // => '***'
```

### titleize($string, array $ignore = [])

Creates a title version of the string. Capitalizes all the words and replaces some characters in the string to

```PHP
Strings\titleize('hello world'); // => 'Hello World'
```

### toSentence($array, $delimiter = ', ', $lastDelimiter = ' and ')

Join an array into a human readable sentence

```PHP
Strings\toSentence(["A", "B", "C"]); // => "A, B and C";
Strings\toSentence(["A", "B", "C"], ", ", " ir "); // => "A, B ir C";
```

### toSentenceSerial($array, $delimiter = ', ', $lastDelimiter = 'and ')

The same as string_to_sentence, but adjusts delimeters to use Serial comma)

```PHP
Strings\toSentenceSerial(["A", "B"]); // => "A and B"
Strings\toSentenceSerial(["A", "B", "C"]); // => "A, B, and C"
Strings\toSentenceSerial(["A", "B", "C"], ", ", " unt "); // => "jQuery, Mootools, unt Prototype"
```

### truncate($input, $length, $chars = '…')

Truncate string accounting for word placement and character count

```PHP
Strings\truncate('this is some long text', 3); // => '...'
Strings\truncate('this is some long text', 7); // => 'this is...'
Strings\truncate('this is some long text', 11); // => 'this is...'
Strings\truncate('this is some long text', 12); // => 'this is some...'
Strings\truncate('this is some long text', 11); // => 'this is...'
Strings\truncate('this is some long text', 14, ' read more'); // => 'this is some read more'
```

### underscore($string)

Converts hyphens and camel casing to underscores

```PHP
Strings\underscore('dataRate'); // => 'data_rate'
Strings\underscore('CarSpeed'); // => 'car_speed'
Strings\underscore('yesWeCan'); // => 'yes_we_can'
```

### upperCaseFirst($input)

Converts string first char to uppercase

```PHP
Strings\upperCaseFirst('helloWorld'); // => 'HelloWorld
```


## Invoke

### ifCondition(callable $callable, $methodArguments = [], $condition)

Invoke a method if condition is true

```PHP
Invoke\ifCondition(function () { echo 'Hello World'; }, [], Funct\notEmpty('Hello?')); // => Hello World
```

### ifIsset(callable $callable, $values, $key)

Invoke a method if value isset

```PHP
Invoke\ifIsset(function () { echo 'Hello World'; }, ['Hello' = > 1000], 'Hello'); // => Hello World
```


### ifNotEmpty(callable $callable, $var)

Invoke a method if value is not empty

```PHP
Invoke\ifNotEmpty(function () { echo 'Hello World'; }, 'Hello'); // => Hello World
```

## Object

### toArray($objects, $valueMethod, $keyMethod = null)

Creates array from objects using valueMethod as value and with/without keyMethod as key

```PHP
Object\toArray($objects, 'getValue', 'getkey'); // => ['key' => 'value']
```

## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## License

Please see [License File](LICENSE) for more information.

