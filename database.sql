CREATE TABLE users (
    `id` int(11) NOT NULL auto_increment PRIMARY KEY,
    `first` varchar(256) NOT NULL,
    `last` varchar(256) NOT NULL,
    `username` varchar(256) NOT NULL,
    `password` varchar(256) NOT NULL,
    `email` varchar(256) NOT NULL,
    'staff' int(1) NOT NULL DEFAULT '0'
);
