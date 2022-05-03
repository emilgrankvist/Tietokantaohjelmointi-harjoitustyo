drop database if exists tietokantaohjelmointi;

create database tietokantaohjelmointi;

drop table if exists user;
create table user (
    id int primary key auto_increment,
    username varchar(250) not null
);
drop table if exists userworkout;
create table userworkout (
    id int primary key auto_increment,
    user_id int not null,
    workoutdate DATE
    index user_id (user_id),
    FOREIGN key (user_id) REFERENCES user(id) on delete RESTRICT
);
drop table if exists WorkoutExercise;
create table WorkoutExercise (
    ExerciseID int primary key,
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