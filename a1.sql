Create table subject (sbjctName varchar(25), PRIMARY KEY(sbjctName));

Create table people (pplID int(3) NOT NULL AUTO_INCREMENT, pplFName varchar(20) NOT NULL, pplLName varchar(20) NOT NULL, PRIMARY KEY (pplID));

Create table toDo (tdID int(3) NOT NULL AUTO_INCREMENT, tdTask varchar(30) NOT NULL, tdPplID int(3) NOT NULL, tdSubject varchar(25) NOT NULL, tdDue DATE NOT NULL, PRIMARY KEY (tdID), FOREIGN KEY (tdSubject) REFERENCES subject (sbjctName), FOREIGN KEY (tdPplID) REFERENCES people (pplID));

INSERT subject VALUES ('School');
INSERT subject VALUES ('Home');
INSERT subject VALUES ('Work');
INSERT subject VALUES ('Social');
INSERT subject VALUES ('Misc.');

INSERT INTO people (pplFName, pplLName) VALUES ('Bob', 'Smith');
INSERT INTO people (pplFName, pplLName) VALUES ('Julie', 'Smith');
INSERT INTO people (pplFName, pplLName) VALUES ('Liz', 'Jones');
INSERT INTO people (pplFName, pplLName) VALUES ('Greg', 'Jones');
