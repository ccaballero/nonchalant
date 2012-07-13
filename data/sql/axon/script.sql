
DROP TABLE IF EXISTS `index`;
CREATE TABLE `index` (
    `id`                int unsigned                      NOT NULL auto_increment,
    `parent`            int unsigned                      NULL,
    `name`              varchar(255)                      NOT NULL,
    `type`              enum('l','f','d')                 NOT NULL,
    `size`              int unsigned                      NULL,
    `permissions`       bit(9)                            NOT NULL,
    `uid`               smallint unsigned                 NOT NULL,
    `gid`               smallint unsigned                 NOT NULL,
    `ctime`             timestamp                         NOT NULL,
    `mtime`             timestamp                         NOT NULL,
    `atime`             timestamp                         NOT NULL,
    PRIMARY KEY (`id`),
    INDEX (`parent`),
    FOREIGN KEY (`parent`) REFERENCES `ident`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;

INSERT INTO `index`
(`id`, `parent`, `name`, `type`, `size`, `permissions`, `uid`, `gid`, `lastupdate`, `lastcreate`)
VALUES
(1, NULL, '/',     'directory', NULL, '', 1, 1, 0, 0),
(2, 1,    'bin/',  'directory', NULL, '', 1, 1, 0, 0),
(3, 1,    'etc/',  'directory', NULL, '', 1, 1, 0, 0),
(4, 1,    'home/', 'directory', NULL, '', 1, 1, 0, 0),
(5, 1,    'mnt/',  'directory', NULL, '', 1, 1, 0, 0),
(6, 1,    'usr/',  'directory', NULL, '', 1, 1, 0, 0),
(7, 1,    'tmp/',  'directory', NULL, '', 1, 1, 0, 0),
(8, 1,    'var/',  'directory', NULL, '', 1, 1, 0, 0);
