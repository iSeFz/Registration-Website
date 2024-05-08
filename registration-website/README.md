## Important Instructions to run the project

1. Make your local Laravel project using the following command line

```bash
laravel new registration_project
```

2. Run the following SQL command at the PHPMyAdmin panal

```sql
drop table users;
create table Users(
    username varchar(40) primary key,
    email text ,
    fullname text ,
    password text,
    address text ,
    phone text,
    imageName varchar(40),
    birthdate Date
);
```

3. Replace all folders from the Github repo into this local Laravel project

4. Run the Laravel Project using the following comamnd line

```bash
php artisan serve
```

## Important Instructions to uplaod your updated files into Github repo

> Only upload all folders except the vendor folder
