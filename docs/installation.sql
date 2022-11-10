DROP TABLE IF EXISTS `plants`;

CREATE TABLE `plants` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `pic_link` varchar(255) DEFAULT NULL,
    `pic_alt` varchar(255) DEFAULT NULL,
    `name/species` varchar(255) DEFAULT NULL,
    `nickname` varchar(255) DEFAULT NULL,
    `average_height` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/lily.jpg',
    'Picture of Peace Lily',
    'Spathiphyllum',
    'Lily',
    '2-3ft'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/anet.jpg',
    'Picture of Calathea Network',
    'Calathea Network',
    'Anet',
    '15-23in'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/flamey.jpg',
    'Picture of Calathea Flamestar',
    'Calathea Flamestar',
    'Flamey',
    '3-4ft'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/leo.jpg',
    'Picture of Calathea Leopardina',
    'Calathea Leopardina',
    'Leo',
    '2-3ft'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/snappy.jpg',
    'Picture of Sarracenia',
    'Sarracenia',
    'Snappy',
    '20-30in'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/monkey.jpg',
    'Picture of Nepenthes',
    'Nepenthes',
    'Monkey',
    '3-4in'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/dragon.jpg',
    'Picture of Hylocereus',
    'Hylocereus',
    'Dragon',
    '10-20ft'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/cheeseman.jpg',
    'Picture of Monstera Deliciosa',
    'Monstera Deliciosa',
    'Cheeseman',
    '5-7ft'
);

INSERT INTO `plants` (
    `pic_link`,
    `pic_alt`,
    `name/species`,
    `nickname`,
    `average_height`
)
VALUES (
    'images/stripey.jpg',
    'Picture of Calathea Whitestar',
    'Calathea Whitestar',
    'Stripey',
    '4-5ft'
);