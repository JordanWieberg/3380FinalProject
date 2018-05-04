# 3380FinalProject
* Jordan Wieberg
* Andrew Ziber
* Thomas Newman
* Tyler Blood
## Link to Application
(It is recommended to clear your cache for the CSS file to work as intended.)<br/>
URL: 
## Description of Application
The main purpose of our application is to create the one stop shop for all Jack Black fanatics or Jables as we like to be called. Our application Jables Tables is a one stop shop to get all your information about Jack Black from his extremely funny movies to his beautiful music from his hit rock band Tenacious D. What Jables Tables purpose is to allow users to vote on their favorite Jack Black music or movie and show that to everyone. A user can create an account and show their favorite song or favorite movie that Jack Black has blessed with his presence. Users can see each of Jack Blacks movies and the Rotten Tomato score, how well the movie did at the box office, and what another user set as their favorite movie. You can also view Jack Blacks entire discography being able to easily see each song length, title, and what album it was on. Jables Tables is the one stop shop for all Jack Black fanatics. ## Schema for the Database
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
