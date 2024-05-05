# Registration Website

This is a collaboration to complete the First assignment in the **Web-based Information Systems** course at FCAI CU.

## Instructions

- Always `git pull` before you push any new edits  
- Separate commits where each commit has a certain change  
- Do NOT push all work in just one commit (unless the edit is small)  
- Write a meaningful message in the commit message  

## Run the Laravel Project

1. Execute the following command to install the vendor folder that must be exist to run the project

```bash
composer install
```

2. If the Laravel project gives an error like `Unkown Database called laravel_project`, create the this database as following:

```sql
CREATE DATABASE laravel_project;
```

> Don't uplaod the `vendor` folder into the Github, delete it before you push your changes