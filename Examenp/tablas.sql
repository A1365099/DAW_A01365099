
CREATE TABLE Zombies
(
	Nombre varchar(20) not null,
	PRIMARY KEY(Nombre)
);


CREATE TABLE Estados
(
	ENombre varchar(20) not null,
	PRIMARY KEY(ENombre)
);


INSERT INTO Estados(ENombre) VALUES ('infeccion');
INSERT INTO Estados(ENombre) VALUES ('desorientacion');
INSERT INTO Estados(ENombre) VALUES ('violencia');
INSERT INTO Estados(ENombre) VALUES ('desmayo');
INSERT INTO Estados(ENombre) VALUES ('transformacion');


CREATE TABLE HistorialEstados
(
	Nombre varchar(20) not null,
	ENombre varchar(20) not null,
	Fecha TimeStamp not null,
	FOREIGN KEY(Nombre) references Zombies(Nombre),
	FOREIGN KEY(ENombre) references Estados(ENombre)
);


INSERT INTO historialestados(IDZombie, IDEstado) SELECT Z.IDZombie, E.IDEstado FROM Zombies as Z, Estados as E WHERE 'Daniel' = Z.Nombre AND  'Desmayo' = E.Nombre;