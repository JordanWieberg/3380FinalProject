# 3380FinalProject
* Jordan Wieberg
* Andrew Ziber
* Thomas Newman
* Tyler Blood
## Link to Application
(It is recommended to clear your cache for the CSS file to work as intended.)<br/>
URL: 
## Description of Application

## Schema for the Database
``` sql
CREATE TABLE movies (
id int not null auto_increment primary key,
title varchar(128) not null,
jbc varchar(128) not null,
rtscore int not null,
boxoffice varchar(128) not null,
releasedate varchar(128) not null,
favCount int not null
);
```
``` sql
CREATE TABLE music (
id int not null auto_increment primary key,
title varchar(128) not null,
album varchar(128) not null,
band varchar(128) not null,
length varchar(128) not null,
releasedate varchar(128) not null,
favCount int not null
);
```
``` sql
create table users (
id int primary key auto_increment,
username varchar(255) not null unique,
password text not null,
firstName varchar(255) not null,
lastName varchar(255) not null, 
favMovie varchar(255) not null, 
favSong varchar(255)not null
);
```
## Entity Relational Diagram

## CRUD Explanation

## Video Demonstration
URL: 
