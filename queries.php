<?php

// FRONT-END QUERIES //
// Queries for left-column user introduction

$show_user_image = "SELECT filepath_photo FROM users WHERE userID = 1";
$show_name_header = "SELECT username FROM users WHERE userID = 1";
$show_usernames = "SELECT username, userID FROM users";
$show_code_story = "SELECT story_content FROM stories WHERE id = 1";
$show_ux_story = "SELECT story_content FROM stories WHERE id = 2";

// Queries for the content of the CV

$show_hobbies = "SELECT hobby from hobbies";
$show_skills_programming = "SELECT skill FROM skills WHERE id BETWEEN 1 AND 6";
$show_skills_ux = "SELECT skill FROM skills WHERE id BETWEEN 7 AND 10";
$show_diplomas = "SELECT diploma FROM diplomas";
$show_countries = "SELECT country FROM travels";

// BACK-END ADMIN QUERIES //

// BACK-END FORM PROCESSING QUERIES //

// Queries for stories
$add_new_story = "INSERT INTO stories (story_content) VALUES ('{$_POST['story_add']}')";

$update_story = "UPDATE stories SET story_content = '{$_POST['story_update']}' WHERE ID = {$_POST['story_id']}";

$delete_stories = "DELETE FROM stories WHERE ID = {$_POST['story_id']}";

// Queries for hobbies
$add_hobby = "INSERT INTO hobbies (hobby) VALUES ('{$_POST['hobby_add']}')";

$update_hobby = "UPDATE hobbies SET hobby = '{$_POST['hobby_update']}' WHERE ID = {$_POST['hobby_id']}";

// Not working?!
// $delete_hobby = "DELETE FROM hobbies WHERE ID = $hobby";

// Queries for diplomas
$add_diploma = "INSERT INTO diplomas (diploma) VALUES ('{$_POST['diploma_add']}')";

$update_diploma = "UPDATE diplomas SET diploma = '{$_POST['diploma_update']}' WHERE ID = {$_POST['diploma_id']}";

// $delete_diploma = "DELETE FROM diplomas WHERE ID = $diploma";

// Queries for skills
$add_skill = "INSERT INTO skills (skill) VALUES ('{$_POST['skill_add']}')";

$update_skill = "UPDATE skills SET skill = '{$_POST['skill_update']}' WHERE ID = {$_POST['skill_id']}";

// $delete_skills = "DELETE FROM skills WHERE ID = $skill";

// Queries for travels
$add_country = "INSERT INTO travels (country) VALUES ('{$_POST['country_add']}')";

$update_country = "UPDATE travels SET country = '{$_POST['country_update']}' WHERE ID = {$_POST['country_id']}";

// $delete_countries = "DELETE FROM travels WHERE ID = $country";

// Queries for projects
// $delete_projects = "DELETE FROM projects WHERE ID = $project";

$add_project = "INSERT INTO projects (project_name, project_description, project_technologies, project_photo, project_link) VALUES ('{$_POST['project_add_name']}', '{$_POST['project_add_description']}', '{$_POST['project_add_technologies']}', '{$_POST['project_add_photo']}', '{$_POST['project_add_link']}')";

 ?>
