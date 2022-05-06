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
    userworkoutID int primary key auto_increment,
    usersID int not null,
    workoutdate TIMESTAMP,
    index usersID (usersID),
    FOREIGN key (usersID) REFERENCES users(ID) on delete RESTRICT
);
drop table if exists Exercise;
create table Exercise (
    ExerciseID int primary key auto_increment,
    ExerciseType varchar(250)
);
drop table if exists WorkoutExercise;
create table WorkoutExercise (
    ID int primary key not null AUTO_INCREMENT,
    ExerciseID int not null,
    index ExerciseID(ExerciseID),
    foreign key (ExerciseID) REFERENCES exercise(ExerciseID),
    
    userworkoutID int not null,
    index userworkoutID(userworkoutID),
    foreign key (userworkoutID) references userworkout(userworkoutID),
    
    
    reps int,
    weight int
    
);

/*Säilytetään tämä varalta :)*/
/*create table WorkoutExercise (
    ExerciseID int,
    WorkoutID int,
    reps int,
    weight int,
    primary key (exerciseID, WorkoutID)
); */

