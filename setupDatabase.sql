    CREATE USER 'kasutaja' IDENTIFIED BY 'salasona';
    CREATE DATABASE bigeyetask;
    USE bigeyetask;

    CREATE TABLE users ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL UNIQUE, 
    password VARCHAR(50) NOT NULL);

    GRANT INSERT ON bigeyetask.users TO kasutaja;
    GRANT SELECT ON bigeyetask.users TO kasutaja;