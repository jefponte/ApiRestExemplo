CREATE TABLE info (
id serial NOT NULL,
temperaturasuperficie numeric(8,2),
temperaturaar numeric(8,2),
umidade numeric(8,2),
datahora character varying(150),
 CONSTRAINT pk_info_id PRIMARY KEY (id)
);
