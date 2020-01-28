create database if not exists akna;
use akna;

create table if not exists `categories` (
  `id` int(11) AUTO_INCREMENT,
  `name` varchar(255),
  PRIMARY KEY(`id`)
);

create table if not exists `products` (
  `id` int(11) AUTO_INCREMENT,
  `category_id` int(11) not null,
  `name` varchar(255),
  PRIMARY KEY(`id`),  
  foreign key (category_id) references categories(id) on delete cascade
);


create table if not exists `shops` (
  `id` int(11) AUTO_INCREMENT,
  `product_id` int(11) not null,
  `quantity` int(11),
  `month` ENUM('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DEC'),
  PRIMARY KEY(`id`),
  foreign key (product_id) references products(id) on delete cascade
);