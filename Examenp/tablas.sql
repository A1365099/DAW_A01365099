
CREATE TABLE Zombies
(
	ENombre varchar(20) not null,
	PRIMARY KEY(ENombre)
);


CREATE TABLE Estados
(
	ENombre varchar(20) not null,
	PRIMARY KEY(ENombre)
);


INSERT INTO Estados_2(ENombre) VALUES ('infeccion');
INSERT INTO Estados_2(ENombre) VALUES ('desorientacion');
INSERT INTO Estados_2(ENombre) VALUES ('violencia');
INSERT INTO Estados_2(ENombre) VALUES ('desmayo');
INSERT INTO Estados_2(ENombre) VALUES ('transformacion');


CREATE TABLE HistorialEstados
(
	Nombre varchar(20) not null,
	ENombre varchar(20) not null,
	Fecha TimeStamp not null,
	FOREIGN KEY(Nombre) references Zombies_2(Nombre),
	FOREIGN KEY(ENombre) references Estados_2(ENombre)
);


INSERT INTO historialestados(IDZombie, IDEstado) SELECT Z.IDZombie, E.IDEstado FROM Zombies as Z, Estados as E WHERE 'Daniel' = Z.Nombre AND  'Desmayo' = E.Nombre;