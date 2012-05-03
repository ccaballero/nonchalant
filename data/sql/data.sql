
INSERT INTO `node` 
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

