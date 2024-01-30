--- Création de la table user
create table user (
      id int auto_increment primary key,
      username varchar(100) not null,
      email varchar(100),
      password varchar(200) not null,
      dateCreation datetime default now(),
      dateModification datetime default now(),
      dateDerniereConnexion datetime,
      roles json
);

--- Insertion de données dans la table user
insert into user (username,password,email,roles) values
('tgobert',sha1('1234'),'timothee.gobert92@gmail.com','["ROLE_ADMIN","ROLE_ASSIST","ROLE_DEV","ROLE_USER"]'),
('jazouhri',sha1('1234'),'jamel.azouhri@gmail.com','["ROLE_ASSIST","ROLE_DEV","ROLE_USER"]'),
('csimon',sha1('1234'),'claire.simon92@gmail.com','["ROLE_DEV","ROLE_USER"]');

insert into user (username,password,email,roles) values
('admin',sha3('1234'),'admin@localhost.com','["ROLE_ADMIN","ROLE_ASSIST","ROLE_DEV","ROLE_USER"]');

--- Ajout de la colonne photo dans la table user

alter table user add photo varchar(250);

--- Création table rôle
create table role (
      id int auto_increment primary key,
      rang varchar(20),
      libelle varchar(200)
);

--- Insertion de données dans la table rôle
insert into role (rang,libelle) values
('001','ROLE_ADMIN'),
('002','ROLE_ASSIST'),
('003','ROLE_DEV'),
('004','ROLE_USER');

insert into role (rang,libelle) values
('003','ROLE_DEPOT'),
('003','ROLE_CAISSE');