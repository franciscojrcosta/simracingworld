/* TABLE SETTINGS INITIAL VALUES */
INSERT INTO `settings` (`settingsID`, `racersponsormaxnum`,
 `racersponsorminval`, `racersponsormaxval`, `racersponsorminday`,
 `racersponsormaxday`, `teamsponsormaxnum`, `teamsponsorminval`,
 `teamsponsormaxval`, `teamsponsorminday`, `teamsponsormaxday`)
 VALUES
 ('1','6', '1000', '30000', '30', '365', '10', '5000', '5000000', '90', '365');

/* TABLE LICENCES INITIAL VALUES */
INSERT INTO `licences` (`licenceID`, `description`,`dailyprice`) VALUES ('1','Bronze','100');
INSERT INTO `licences` (`licenceID`, `description`,`dailyprice`) VALUES ('2','Silver','200');
INSERT INTO `licences` (`licenceID`, `description`,`dailyprice`) VALUES ('3','Gold','400');
INSERT INTO `licences` (`licenceID`, `description`,`dailyprice`) VALUES ('4','E Licence','600');
INSERT INTO `licences` (`licenceID`, `description`,`dailyprice`) VALUES ('5','Super Licence','800');