


SELECT
c.numero,
p.fecha_cirugia fecha_cirugia,
p.hora_cirugia hora_cirugia,
CONCAT(i.nombres,' ',i.apellidos) instrumentista,
cr.descripcion cirugia,
s.descripcion sustento,
p.id_evento,
p.VENDEDOR,
p.dateuserSoporte,
p.fecha_soporte,
p.RAZON_SOCIAL,
c.fecha_llegada,
c.hora_llegada,
c.hora_inicio_cirugia,
c.hora_fin_cirugia,
c.edad,
c.sexo,
c.instrumentista_sala,
c.observacion,
c.familia,
c.cirugia,
c.otro_cirugia,
c.prelavado,
c.noprelavado,
c.uso_injerto,
c.tipo_cirugia,
d.DENUMDOC,
d.DEITEM,
d.DECODIGO,
d.DEDESCRI,
d.DECANTID,
d.DELOTE,
d.FECHA_VEN_LOTE


FROM
pedcab_soporte c
 
INNER JOIN pedcab p ON c.numero=p.numero
INNER JOIN pedcab_soporte_det d ON c.numero=d.CANUMORD
INNER JOIN usuario i ON p.id_instrumentista=i.id
INNER JOIN cirugia cr ON p.id_cirugia=cr.codigo
INNER JOIN sustento s ON p.id_sustento=s.id

WHERE p.fecha_cirugia BETWEEN '2019-03-01'  AND '2019-03-31'