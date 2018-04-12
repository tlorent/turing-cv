-- First create the database
CREATE DATABASE turingcv;
USE turingcv;

-- Add the tables
CREATE TABLE stories (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  content text NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE passions (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  passion varchar(255) NOT NULL,
  story_id INTEGER,
  PRIMARY KEY (ID),
  FOREIGN KEY (story_id) REFERENCES stories(ID)
);

CREATE TABLE hobbies (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  hobby varchar(255) NOT NULL,
  story_id INTEGER,
  PRIMARY KEY (ID),
  FOREIGN KEY (story_id) REFERENCES stories(ID)
);

CREATE TABLE projects (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  project varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE diplomas (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  diploma varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE travels (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  country varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE languages (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  language varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE skills (
  ID INTEGER NOT NULL AUTO_INCREMENT,
  skill varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

-- Add the values into the stories table

INSERT INTO stories (content)
VALUES ('Hi, I’m Tim, an aspiring web developer from Amsterdam. I am currently looking for a job as a front-end web developer.');

-- Add the values into the passions table

INSERT INTO passions (passion)
VALUES ('travel');

INSERT INTO passions (passion)
VALUES ('music');

-- Add the values into the hobbies table

INSERT INTO hobbies (hobby)
VALUES ('reading');

INSERT INTO hobbies (hobby)
VALUES ('gym');

INSERT INTO hobbies (hobby)
VALUES ('running');

INSERT INTO hobbies (hobby)
VALUES ('listening music');

INSERT INTO hobbies (hobby)
VALUES ('making music');

INSERT INTO hobbies (hobby)
VALUES ('concerts');

-- Add the values into the projects table

INSERT INTO projects (project)
VALUES ('Movie Guessing Game');

INSERT INTO projects (project)
VALUES ('Restaurant Website');

INSERT INTO projects (project)
VALUES ('Student Buddy');

-- Add the values into the diplomas table

INSERT INTO diplomas (diploma)
VALUES ('VWO');

INSERT INTO diplomas (diploma)
VALUES ('MYP');

INSERT INTO diplomas (diploma)
VALUES ('BSc Information Sciences');

INSERT INTO diplomas (diploma)
VALUES ('Turing Front-End');

-- Add the values into the travels table

INSERT INTO travels (country)
VALUES ('Japan');

INSERT INTO travels (country)
VALUES ('New-Zealand');

INSERT INTO travels (country)
VALUES ('South-East Asia');

INSERT INTO travels (country)
VALUES ('Australia');

INSERT INTO travels (country)
VALUES ('USA');

-- Add the values into the skills table

INSERT INTO skills (skill)
VALUES ('HTML5');

INSERT INTO skills (skill)
VALUES ('CSS3');

INSERT INTO skills (skill)
VALUES ('JavaScript');

INSERT INTO skills (skill)
VALUES ('jQuery');

INSERT INTO skills (skill)
VALUES ('PHP');

INSERT INTO skills (skill)
VALUES ('SQL');
