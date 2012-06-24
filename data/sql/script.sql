DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
    `id`                int                               NOT NULL auto_increment,
    `parent`            int                               NULL,
    `name`              varchar(128)                      NOT NULL,
    `type`              enum('link','file','directory')   NOT NULL,
    `size`              int                               NULL,
    `permissions`       int                               NOT NULL,
    `uid`               int                               NOT NULL,
    `gid`               int                               NOT NULL,
    `lastupdate`        int                               NOT NULL,
    `lastcreate`        int                               NOT NULL,
    PRIMARY KEY (`id`),
    INDEX (`parent`),
    FOREIGN KEY (`parent`) REFERENCES `node`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT
) DEFAULT CHARACTER SET UTF8;
