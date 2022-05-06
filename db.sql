drop database if exists tietokantaohjelmointi;

create database tietokantaohjelmointi;

drop table if exists users;

create table users (
    ID int primary key auto_increment,
    username varchar(250) not null UNIQUE,
    password VARCHAR(255)
);

drop table if exists Exercise;
create table Exercise (
    ExerciseID int primary key auto_increment,
    ExerciseType varchar(250)
);
drop table if exists WorkoutExercise;
create table exercises (
    ID int primary key not null AUTO_INCREMENT,
    
    ExerciseID int not null,
    index ExerciseID(ExerciseID),
    foreign key (ExerciseID) REFERENCES exercise(ExerciseID),
    
    usersID int not null,
    index usersID(usersID),
    foreign key (usersID) references users(ID),
    reps int,
    weight int,
   	workoutdate timestamp
    
);
/*Säilytetään tämä varalta :)*/
/*create table WorkoutExercise (
    ExerciseID int,
    WorkoutID int,
    reps int,
    weight int,
    primary key (exerciseID, WorkoutID)
); */

