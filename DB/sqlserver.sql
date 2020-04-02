create database location;
use location
create table users (iduser int IDENTITY(1,1) PRIMARY KEY ,firstname varchar(50) not null,lastname varchar(50) not null,cin varchar(10)not null,num varchar(20),email varchar(50) ,password varchar(100) );
create table maisan(idmaisan int IDENTITY(1,1) PRIMARY KEY , adresse varchar(50) , surface int not null,iduser int ,idville int );
create table villes(idville int IDENTITY(1,1) PRIMARY KEY , ville varchar(50));
create table contient(idcon int IDENTITY(1,1) PRIMARY KEY ,idmaisan int,idphoto int );
create table reserver(idres int IDENTITY(1,1) PRIMARY KEY , idmaisan int,iduser int, date_debut date , date_fin date);
create table photos(idphoto int IDENTITY(1,1) PRIMARY KEY, urlphoto varchar(400), decr varchar(50));



ALTER TABLE maisan ADD FOREIGN KEY (iduser) REFERENCES users(iduser);
ALTER TABLE maisan ADD FOREIGN KEY (idville) REFERENCES villes(idville);

ALTER TABLE contient ADD FOREIGN KEY (idmaisan) REFERENCES maisan(idmaisan);
ALTER TABLE contient ADD FOREIGN KEY (idphoto) REFERENCES photos(idphoto);

ALTER TABLE reserver ADD FOREIGN KEY (idmaisan) REFERENCES maisan(idmaisan);
ALTER TABLE reserver ADD FOREIGN KEY (iduser) REFERENCES users(iduser);

ALTER TABLE reserver ADD CONSTRAINT CHK_reserver CHECK (date_fin > date_debut );

insert into users (firstname,lastname,cin,num,email ,password)  values ('houssam','amraoui','GM20xxxx','0670120734','houss@live.fr','123456');
insert into villes (ville)  values ('ouazzane') ,('tetouan'),('martil');
insert into maisan (adresse, surface ,iduser ,idville )  values ('hay ben tiyara',100,1,3);
insert into photos (urlphoto, decr)  values ('images/1.jpg','kozina');
insert into contient (idmaisan,idphoto )  values (1,1);

insert into users (firstname,lastname,cin,num,email ,password)  values ('hafsa','hafda','xxxxxxx','06xxxxxxx','hafsa@live.fr','123456');
insert into reserver (idmaisan, iduser, date_debut , date_fin)  values (1,2,'2020-04-02','2020-04-04');



select * from reserver where (date_debut > '2020-04-03' AND date_debut < '2020-04-07' ) or (date_fin > '2020-04-03' AND date_fin < '2020-04-07' );

