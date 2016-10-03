CREATE DATABASE shoes;
USE shoes;
CREATE TABLE brands (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE stores (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE brands_stores (id serial PRIMARY KEY, brands_id int, stores_id int);
