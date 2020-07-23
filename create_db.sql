create table `user` (
    id int AUTO_INCREMENT primary key,
    username varchar(50) not null,
    password varchar(50) not null,
    email varchar(50) UNIQUE
);

create table task (
    id int AUTO_INCREMENT primary key,
    name varchar(150) not null,
    user_id int not null,
    is_done tinyint(1) default false,
    foreign key (user_id) references `user`(id)
);
