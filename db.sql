drop database if exists tietokantaohjelmointi;

create database tietokantaohjelmointi;

drop table if exists users;

create table users (
    ID int primary key auto_increment,
    username varchar(250) not null UNIQUE,
    password VARCHAR(255)
);
drop table if exists userworkout;
create table userworkout (
    ID int primary key auto_increment,
    usersID int not null,
    workoutdate TIMESTAMP,
    index usersID (usersID),
    FOREIGN key (usersID) REFERENCES users(ID) on delete RESTRICT
);
drop table if exists WorkoutExercise;
create table WorkoutExercise (
    ExerciseID int,
    WorkoutID int,
    reps int,
    weight int,
    primary key (exerciseID, WorkoutID)
);
drop table if exists Exercise;
create table Exercise (
    ExerciseID int primary key auto_increment,
    ExerciseType varchar(250)
);