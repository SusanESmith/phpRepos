CREATE TABLE `repos` (
  `RepoID` int(11) NOT NULL COMMENT 'Repository ID',
  `Name` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `createDate` datetime NOT NULL,
  `pushDate` datetime NOT NULL,
  `description` varchar(750) NOT NULL,
  `starNum` int(11) NOT NULL
);


ALTER TABLE `repos`
  ADD PRIMARY KEY (`RepoID`);
