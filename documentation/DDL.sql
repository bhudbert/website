CREATE TABLE public.categories (
	id serial NOT NULL PRIMARY KEY,
	recorded_date date NOT NULL,
	create_at timestamp NOT NULL ,
	update_at timestamp NOT NULL DEFAULT now(),
	description varchar(30) NOT NULL DEFAULT 0
);

CREATE TABLE public.pages (
	id serial NOT NULL PRIMARY KEY,
	recorded_date date NOT NULL,
	create_at timestamp NOT NULL ,
	update_at timestamp NOT NULL DEFAULT now(),
	description varchar(30) NOT NULL DEFAULT 0,
        id_catgory integer REFERENCES categories (id)
);
