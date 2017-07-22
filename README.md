# _OMGSHOES_

#### _Epicodus-PHP, Week 4 Independent Project, 07.21.2017_

#### By _**Nathan Stewart**_

## Description

_This PHP exercise allows the user to enter a Store or multiple stores. Within stores, the user can add brandss that belong. The user can rename any store, or delete any store along with its brands._

## Prerequisites

_You will need the following properly installed on your computer:_

* [MAMP](https://www.mamp.info/en/) for Windows or MacOS
* [PHP](https://secure.php.net/)
* [Composer](https://getcomposer.org/)

## Configuration/Dependencies

_The app will use PHPunit,  Silex, and Twig._

## Setup/Installation

* Open GitHub site on your browser: https://github.com/GStewartN/omgshoes
* Select the dropdown (green box) "Clone or download"
* Copy the link for the GitHub repository
* Open Terminal on your computer
* In Terminal, perform the following steps:
````
  $ cd desktop
  $ git clone <paste repository link>
  $ cd omgshoes
  $ composer install
  ````
* To view app in browser:
  * Open MAMP and click Preferences
  * Click Ports and set Apache Port to 8888, and Msql port to 8889
  * Click Web Server and set the document root to the web folder of omgshoes directory and click OK
  * In MAMP click Start Servers
  * In MAMP click Open WebStart page
  * In Tools menu of WebStart page, click phpMyAdmin
  * Once in phpmyadmin page, click Import tab, click browse button, then navigate to the omgshoes.sql file in the project directory
  * In your browser, enter 'localhost:8888' to view the webpage on your browser

## Specifications

| Behavior | Input | Output |
|----------|-------|--------|
| User clicks view stores link on landing page | Click view stores | A page displays with a list of stores as links, a form to add a store, a button to delete all stores, and a link to landing page |
| User enters store name on stores page | Shoe Spot | The entered store displays in the list of stores as a link |
| User clicks store link on stores page | Click Shoe Spot | A page displays with store name, a select box add a brand, and links to edit store, delete store, or return to landing page |
| User visits a store edit page | Click edit store link | A page displays with store name, a form to rename the store, and a link to return to landing page |
| User enters new name on store edit page | Shoe Imporium | Store page is displayed with new name |
| User visits a store page | Click delete store button | Stores page displays with deleted store no longer in store list (when a store is deleted, all of its brands are cleared as well) |
| User clicks view brands link on landing page | Click view brands | A page displays with a list of brands and their prices, a form to add a brand, a button to delete all brands, and a link to landing page |
| User enters brand name and price on brands page | Adidas | The entered brand displays in the list of brands with its price |
| User visits a brand page | Click delete all brands button | Brands page displays with no list |


## Technologies Used

* _PHP_
* _HTML_
* _Silex_
* _Twig_
* _Composer_
* _MAMP_
* _PHPUnit_
* _MySql_
* _phpMyAdmin_

## MySQL Commands Used

* CREATE DATABASE omgshoes
* USE omgshoes
* CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255))
* CREATE TABLE brands (id serial PRIMARY KEY, brand_name VARCHAR (255), model VARCHAR (255), price TEXT)
* CREATE TABLE brands_stores (id serial PRIMARY KEY, store_id INT, brand_id INT
* ALTER TABLE brands DROP model
* ALTER TABLE stores CHANGE name (name VARCHAR (30))
* ALTER TABLE brands CHANGE brand_name (brand_name VARCHAR (30))
* ALTER TABLE brands CHANGE price (price INT)
* ALTER TABLE brands ADD UNIQUE(brand_name)
* ALTER TABLE stores ADD UNIQUE(name)

### License

MIT License

Copyright &copy; 2017 Nathan Stewart

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
