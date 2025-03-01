drop database if exists contact_form; 

create database contact_form;

use contact_form;

create table contacts (
    id int auto_increment primary key,
    full_name varchar(150) not null,
    email_address varchar(250) not null,
    mobile_number varchar(20),
    subject varchar(300),
    message text,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);