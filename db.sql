drop database if exists tietokantaohjelmointi;

create database tietokantaohjelmointi;

drop table if exists users;
create table users (
    id int primary key auto_increment,
    username varchar(250) not null
);
drop table if exists userworkout;
create table userworkout (
    id int primary key auto_increment,
    users_id int not null,
    workoutdate DATE,
    index users_id (users_id),
    FOREIGN key (users_id) REFERENCES users(id) on delete RESTRICT
);
drop table if exists WorkoutExercise;
create table WorkoutExercise (
    ExerciseID int,
    WorkoutId int auto_increment,
    reps int,
    weight int,
    primary key (exerciseID, WorkoutId)
);
drop table if exists Exercise;
create table Exercise (
    ExerciseID id int primary key auto_increment,
    ExerciseType varchar(250)
)