CREATE SCHEMA sensors;

CREATE TABLE sensors.sensor (
    id int NOT NULL AUTO_INCREMENT,
    measurement_time timestamp, 
    PRIMARY KEY (id)
);

CREATE TABLE sensors.ph (
    id int NOT NULL AUTO_INCREMENT,
    ph double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE, 
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.humidity (
    id int NOT NULL AUTO_INCREMENT,
    humidity double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.air_temperature (
    id int NOT NULL AUTO_INCREMENT,
    air_temperature double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.water_temperature (
    id int NOT NULL AUTO_INCREMENT,
    water_temperature double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.dissolved_oxygen (
    id int NOT NULL AUTO_INCREMENT,
    dissolved_oxygen double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.water_level (
    id int NOT NULL AUTO_INCREMENT,
    water_level double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);

CREATE TABLE sensors.flow_rate (
    id int NOT NULL AUTO_INCREMENT,
    flow_rate double NOT NULL,
    measurement_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (measurement_id) REFERENCES sensor(id) ON DELETE CASCADE,
    INDEX meas_ind (measurement_id)
);