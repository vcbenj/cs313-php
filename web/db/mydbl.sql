CREATE TABLE public.complex
(
    complIid SERIAL NOT NULL PRIMARY KEY,
    complexName varchar(64) NOT NULL UNIQUE
);
CREATE TABLE public.users
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(16) NOT NULL,
    aptId SERIAL NOT NULL REFERENCES public.apartments 
);

CREATE TABLE public.apartments
(
    aptId SERIAL NOT NULL PRIMARY KEY,
    aptNumber INT NOT NULL UNIQUE,
    complID SERIAL NOT NULL REFERENCES public.complex
);

CREATE TABLE public.job
(
    jobId SERIAL NOT NULL PRIMARY KEY,
    jobDesc  TEXT,
    DueDate DATE NOT NULL,
    jobCheck BOOLEAN NOT NULL,
    id SERIAL NOT NULL REFERENCES public.users,
    aptId SERIAL NOT NULL REFERENCES public.apartments
);


INSERT INTO public.complex VALUES('The Lodge');



INSERT INTO public.job (jobDesc, DueDate, jobCheck, id, aptId) VALUES('Dishes','2020-02-18', FALSE,1,1);
INSERT INTO public.users (username, password, aptId) VALUES('vcbenj', 'pass',1);
INSERT INTO public.apartments (aptNumber, complId) VALUES(2317,1);
INSERT INTO public.complex VALUES(2,'The Landing');
