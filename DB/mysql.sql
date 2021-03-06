create database location;
use location;
create table users (
iduser int AUTO_INCREMENT PRIMARY KEY ,
firstname varchar(50) not null,
lastname varchar(50) not null,
cin varchar(10)not null,
num varchar(20),
email varchar(50) not null  ,
password varchar(100) not null ,
 UNIQUE (email) 
 );
 
create table maisan(
idmaisan int AUTO_INCREMENT PRIMARY KEY ,
 adresse varchar(100) ,
 surface int not null,
 chambre int ,
 prix int,
 titel varchar(100),
 description varchar(250),
 datepub date,
 iduser int ,
 idville int 
 );
create table villes(
idville int AUTO_INCREMENT PRIMARY KEY ,
 ville varchar(50)
 );

create table reserver(
idres int AUTO_INCREMENT PRIMARY KEY ,
 idmaisan int,
 iduser int,
 date_debut date ,
 date_fin date);
create table photos(
idphoto int AUTO_INCREMENT PRIMARY KEY,
idmaisan int,
 urlphoto varchar(400),
 decr varchar(50));
 create table vu(
idvu int AUTO_INCREMENT PRIMARY KEY ,
idmaisan int,
vues int 
);
ALTER TABLE maisan ADD FOREIGN KEY (iduser) REFERENCES users(iduser);
ALTER TABLE maisan ADD FOREIGN KEY (idville) REFERENCES villes(idville);

ALTER TABLE photos ADD FOREIGN KEY (idmaisan) REFERENCES maisan(idmaisan) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE vu ADD FOREIGN KEY (idmaisan) REFERENCES maisan(idmaisan) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE reserver ADD FOREIGN KEY (idmaisan) REFERENCES maisan(idmaisan) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE reserver ADD FOREIGN KEY (iduser) REFERENCES users(iduser);

ALTER TABLE reserver ADD CONSTRAINT CHK_reserver CHECK (date_fin >= date_debut );

insert into users (firstname,lastname,cin,num,email ,password)  values ('houssam','amraoui','GM20xxxx','0670120734','houss@live.fr','123456');
insert into villes (ville)  values ('ouazzane') ,('tetouan'),('martil');
insert into maisan (adresse, surface,chambre,prix ,titel ,description ,datepub ,iduser ,idville )  values ('hay ben tiyara',100,3,150,'Location d appartement à Gueliz Meuble','découvrez cet appartement à louer. prix 150 dh. 3 pièces, 2 chambres, 2 salles de bains, surface 120 m. 3eme etage. moins de 5 ans. type de sol','2020-04-07',1,3);
insert into photos (idmaisan,urlphoto, decr)  values (1,'c1.jpg','kozina');

insert into vu (idmaisan,vues )  values (1,1);

insert into users (firstname,lastname,cin,num,email ,password)  values ('hafsa','hafda','xxxxxxx','06xxxxxxx','hafsa@live.fr','123456');
insert into reserver (idmaisan, iduser, date_debut , date_fin)  values (1,2,'2020-04-02','2020-04-04');



select * from reserver where (date_debut > '2020-04-03' AND date_debut < '2020-04-07' ) or (date_fin > '2020-04-03' AND date_fin < '2020-04-07' );


