mysql commands

* CREATE DATABASE omgshoes
* USE DATABASE omgshoes
* CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255))
* CREATE TABLE brands (id serial PRIMARY KEY, brand_name VARCHAR (255), model VARCHAR (255), price TEXT)
* CREATE TABLE brands_stores (id serial PRIMARY KEY, store_id INT, brand_id INT
* ALTER TABLE brands DROP model
* ALTER Table stores CHANGE name (name VARCHAR (30))
* ALTER Table brands CHANGE brand_name (brand_name VARCHAR (30))
