-- First create the database
CREATE DATABASE turingcv2;
USE turingcv2;

-- Add the tables
CREATE TABLE users (
  userID INTEGER NOT NULL AUTO_INCREMENT,
  username VARCHAR(65) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL,
  filepath_photo text NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,  PRIMARY KEY (userID)
);

CREATE TABLE stories (
  id INTEGER NOT NULL AUTO_INCREMENT,
  story_content text NOT NULL,
  user_id INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
  -- FOREIGN KEY (user_id) REFERENCES users(userID)
);

CREATE TABLE hobbies (
  id INTEGER NOT NULL AUTO_INCREMENT,
  hobby varchar(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE projects (
  id INTEGER NOT NULL AUTO_INCREMENT,
  project_name varchar(255) NOT NULL,
  project_description text NOT NULL,
  project_technologies text NOT NULL,
  project_photo text NOT NULL,
  project_link text NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

-- CREATE TABLE technologies {
--   id INTEGER NOT NULL AUTO_INCREMENT,
--   technology_name varchar(50) NOT NULL,
--   project_id INTEGER,
--   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (id),
--   FOREIGN KEY (project_id) REFERENCES projects(id)
-- };

CREATE TABLE diplomas (
  id INTEGER NOT NULL AUTO_INCREMENT,
  diploma varchar(255) NOT NULL,
  diploma_date varchar(255) NOT NULL,
  description text NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE travels (
  id INTEGER NOT NULL AUTO_INCREMENT,
  country varchar(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

-- CREATE TABLE languages (
--   id INTEGER NOT NULL AUTO_INCREMENT,
--   language varchar(255) NOT NULL,
--   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (id)
-- );

CREATE TABLE skills (
  id INTEGER NOT NULL AUTO_INCREMENT,
  skill varchar(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

-- Add the values into the users table
INSERT INTO users (username, password, filepath_photo)
VALUES ('Tim', '$$$', 'assets/img/tim-min-mobile.jpg');

-- Add the values into the stories table

INSERT INTO stories (story_content)
VALUES ('An aspiring web developer from Amsterdam.');

INSERT INTO stories (story_content)
VALUES ('An aspiring UX designer from Amsterdam.');

-- Add the values into the hobbies table

INSERT INTO hobbies (hobby)
VALUES ('reading');

INSERT INTO hobbies (hobby)
VALUES ('gym');

INSERT INTO hobbies (hobby)
VALUES ('running');

INSERT INTO hobbies (hobby)
VALUES ('music');

-- Add the values into the projects table

INSERT INTO projects (project_name, project_description, project_technologies, project_photo, project_link)
VALUES ('Movie Guessing Game', 'A website where you can play a game to guess the right movie.', 'HTML5, CSS3, JavaScript, jQuery, JSON, APIs, Bootstrap', './assets/img/moviegame.jpg', 'http://moviegame.timlorent.nl');

INSERT INTO projects (project_name, project_description, project_technologies, project_photo, project_link)
VALUES ('Restaurant Website', 'A restaurant website, where people can view photos of a restaurant, look at the menu, and get in touch to make a reservation.', 'HTML5, CSS3, JavaScript, jQuery', './assets/img/restaurant-website.jpg', 'https://tlorent.github.io/restaurant-website');

INSERT INTO projects (project_name, project_description, project_technologies, project_photo, project_link)
VALUES ('Student Buddy', 'A landing page for Student Buddy, the one app to use when doing an exchange abroad.', 'HTML5, CSS3, JavaScript(ES6), jQuery, Gulp, PostCSS, Babel, NPM, webpack, Browsersync, Node', './assets/img/student-site.jpg', 'https://tlorent.github.io/student-buddy');

-- Add the values into the technologies table

-- INSERT INTO technologies (technology_name) VALUES ('HTML5');
--
-- INSERT INTO technologies (technology_name) VALUES ('CSS3');
--
-- INSERT INTO technologies (technology_name) VALUES ('JavaScript');
--
-- INSERT INTO technologies (technology_name) VALUES ('jQuery');
--
-- INSERT INTO technologies (technology_name) VALUES ('JSON');
--
-- INSERT INTO technologies (technology_name) VALUES ('APIs');
--
-- INSERT INTO technologies (technology_name) VALUES ('Bootstrap');
--
-- INSERT INTO technologies (technology_name) VALUES ('Gulp');
--
-- INSERT INTO technologies (technology_name) VALUES ('PostCSS');
--
-- INSERT INTO technologies (technology_name) VALUES ('Babel');
--
-- INSERT INTO technologies (technology_name) VALUES ('NPM');
--
-- INSERT INTO technologies (technology_name) VALUES ('webpack');
--
-- INSERT INTO technologies (technology_name) VALUES ('Browsersync');
--
-- INSERT INTO technologies (technology_name) VALUES ('Node');

-- Add the values into the diplomas table

INSERT INTO diplomas (diploma)
VALUES ('VWO');

INSERT INTO diplomas (diploma)
VALUES ('MYP');

INSERT INTO diplomas (diploma)
VALUES ('BSc Information Sciences');

-- Add the values into the countries table

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
