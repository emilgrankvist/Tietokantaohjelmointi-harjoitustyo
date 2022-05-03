create table peli (
    id int primary key auto_increment,
    peli_nimi varchar (100) not null,
    valmistaja varchar (100),
    genre varchar (100),
    arvostelu varchar (250),
    peliaiaka varchar (20),
    julkaisupvm date
);

create table arvostelu (
    id int primary key auto_increment not null,
    peli_id int not null,
    kayttaja varchar (250),
    kriitikko varchar (250),
    index peli_id (peli_id),
    foreign key (peli_id) references peli(id) on delete restrict
);

create table valmistaja (
    id int primary key auto_increment not null,
    valmistaja varchar (100) not null,
    peli_id int not null,
    index peli_id (peli_id),
    foreign key (peli_id) references peli(id) on delete restrict 
);

create table peliaika (
    id int primary key auto_increment not null,
    peli_id int not null,
    tarina int,
    koko_peli int,
    oma_aika int,
    index peli_id (peli_id),
    foreign key (peli_id) references peli(id) on delete restrict 
);

create table genre (
    id int primary key auto_increment not null,
    genre varchar (100) not null,
    genre_id int not null
);

create table pelingenre (
    id int primary key auto_increment not null,
    peli_id int not null,
    genre_id int not null,
    index peli_id (peli_id),
    foreign key (peli_id) references peli(id) on delete restrict,
    index genre_id (genre_id),
    foreign key (genre_id) references genre(id) on delete restrict
);

/*select peli_nimi, valmistaja
from peli, valmistaja
where peli_id = 1 and peli.id = valmistaja.peli_id*/
