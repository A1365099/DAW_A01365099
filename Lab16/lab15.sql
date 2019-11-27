set dateformat dmy

select * from materiales

select * from Entregan

select * from materiales
where clave=1000

select clave,rfc,fecha from entregan

select * from materiales,entregan
where materiales.clave = entregan.clave

select * from entregan,proyectos
where entregan.numero < = proyectos.numero


(select * from entregan where clave=1450)
union
(select * from entregan where clave=1300)


(select clave from entregan where numero=5001)
intersect
(select clave from entregan where numero=5018)


(select * from entregan)
LEFT JOIN
(select * from entregan where clave=1000)

select * from entregan,materiales

SELECT M.Descripcion 
FROM Materiales as M, Entregan as E
WHERE M.Clave = E.Clave AND E.Fecha BETWEEN '01/01/2000' AND '01/01/2001'

SELECT distinct M.Descripcion 
FROM Materiales as M, Entregan as E
WHERE M.Clave = E.Clave AND E.Fecha BETWEEN '01/01/2000' AND '01/01/2001'

SELECT P.Numero, P.Denominacion, E.Fecha, E.Cantidad
From Proyectos as P, Entregan as E
WHERE P.Numero = E.Numero 
Order By E.Fecha DESC

SELECT * FROM Materiales where Descripcion LIKE 'Si%'

SELECT * FROM Materiales where Descripcion LIKE 'Si'


DECLARE @foo varchar(40);
DECLARE @bar varchar(40);
SET @foo = '¿Que resultado';
SET @bar = ' ¿¿¿??? '
SET @foo += ' obtienes?';
PRINT @foo + @bar;

SELECT RFC FROM Entregan WHERE RFC LIKE '[A-D]%';
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%';
SELECT Numero FROM Entregan WHERE Numero LIKE '___6';

!--SELECT RazonSocial 
!--FROM Proveedores


SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
Exists ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )


SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
RFC IN ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )

SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
RFC NOT IN ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial NOT LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )

SELECT TOP 2 * FROM Proyectos

SELECT TOP Numero FROM Proyectos

ALTER TABLE materiales ADD PorcentajeImpuesto NUMERIC(6,2);

UPDATE materiales SET PorcentajeImpuesto = 2*clave/1000;

Select * from Materiales

SELECT(Entregan.cantidad* (Materiales.Costo + (Materiales.Costo * Materiales.PorcentajeImpuesto)))
FROM Materiales, Entregan
WHERE Entregan.Clave = Materiales.Clave

CREATE VIEW vista1(Clave, Descripcion)
AS
SELECT M.Clave, M.Descripcion
FROM Materiales as M, Proyectos as P, Entregan as E


SELECT Materiales.Clave, Materiales.Descripcion FROM Materiales, Entregan, Proyectos
WHERE Materiales.Clave = Entregan.Clave AND Proyectos.Numero = Entregan.Numero 
AND Proyectos.Denominacion = 'Mexico sin ti no estamos completos'

SELECT Materiales.Clave, Materiales.Descripcion FROM Materiales, Entregan, Proveedores
WHERE Materiales.Clave = Entregan.Clave AND Entregan.RFC = Proveedores.RFC AND Proveedores.RazonSocial = 'Acme tools'

SELECT Proveedores.RFC FROM Proveedores, Entregan
WHERE Proveedores.RFC = Entregan.RFC AND (Entregan.Fecha BETWEEN '01-JAN-2000' AND '31-DEC-2000')
GROUP BY Proveedores.RFC HAVING AVG(Entregan.Cantidad) > 300

SELECT Materiales.Descripcion, SUM(Entregan.Cantidad) as 'Total' FROM Materiales,Entregan
WHERE Materiales.Clave = Entregan.Clave AND (Entregan.Fecha BETWEEN '01-JAN-2000' AND '31-DEC-2000')
GROUP BY Materiales.Descripcion

CREATE VIEW TotalVendidos
as
SELECT Materiales.Clave, SUM(Entregan.Cantidad) as 'Total' FROM Materiales,Entregan
WHERE Materiales.Clave = Entregan.Clave AND (Entregan.Fecha BETWEEN '01-JAN-2001' AND '31-DEC-2001')
GROUP BY Materiales.Clave;


SELECT TOP 1 * FROM [TotalVendidos]
ORDER BY 'Total' desc

SELECT * FROM Materiales WHERE Descripcion LIKE 'ub%'

SELECT P.Denominacion, SUM(E.Cantidad*(M.Costo*(PorcentajeImpuesto/100)+1)) as "Total" FROM Entregan AS E, Proyectos AS P, Materiales AS M
WHERE P.Numero=E.Numero AND M.Clave=E.Clave
GROUP BY P.Denominacion

CREATE VIEW vistaTelevisa
AS
(SELECT DISTINCT P.Denominacion, PR.RFC, PR.RazonSocial
FROM Entregan AS E, Proyectos AS P, Proveedores as PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Tel%' AND PR.RFC
NOT IN (SELECT PR.RFC FROM Entregan AS E, Proyectos AS P, Proveedores as PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%' ))

select * from vistaTelevisa

SELECT DISTINCT P.Denominacion, PR.RFC, PR.RazonSocial FROM Entregan AS E, Proyectos AS P, Proveedores as PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Tel%' AND PR.RFC
NOT IN (SELECT PR.RFC FROM Entregan AS E, Proyectos AS P, Proveedores AS PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%')


SELECT M.Costo, M.Descripcion FROM Entregan AS E, Proyectos AS P, Materiales AS M, Proveedores AS PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND M.Clave=E.Clave AND M.Clave=E.Clave AND P.Denominacion LIKE 'Tel%' AND PR.RFC
IN(SELECT PR.RFC FROM Entregan AS E, Proyectos AS P, Proveedores as PR
WHERE P.Numero=E.Numero AND PR.RFC=E.RFC AND P.Denominacion LIKE 'Edu%')