CREATE TABLE IF NOT EXISTS settings (
    settingsID INT NOT NULL AUTO_INCREMENT,
    racersponsormaxnum INT,
    racersponsorminval INT,
    racersponsormaxval INT,
    racersponsorminday INT,
    racersponsormaxday INT,
    teamsponsormaxnum INT,
    teamsponsorminval INT,
    teamsponsormaxval INT,
    teamsponsorminday INT,
    teamsponsormaxday INT,
    PRIMARY KEY (settingsID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE NEWS */
CREATE TABLE IF NOT EXISTS news (
    newsID INT NOT NULL AUTO_INCREMENT,
    bodytext TINYTEXT,
    ndate DATE,
    PRIMARY KEY (newsID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE RACERS */
CREATE TABLE IF NOT EXISTS racers (
    racerID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(254),
    password VARCHAR(254),
    firstname VARCHAR(254),
    middlename VARCHAR(254),
    lastname VARCHAR(254),
    birthdate DATE,
    registrationdate DATE,
    lastlogin DATE,
    nationality VARCHAR(2),
    flag VARCHAR(254),
    photo VARCHAR(254),
    simulators VARCHAR(254),
    sponsorslots INT,
    bankroll DECIMAL(11,2),
    skill INT, /* overal skill from 0 to 10 */
    attacking INT, /* hability to attack and overtake */
    defending INT, /* hability to defend position */
    consistency INT, /* how consistent he drives, no accidents */
    teamplayer INT, /* relationship with team members and order compliance */
    knowledge INT, /* technical knowledge on car setup */
    evalcounter INT,
    rankingpoints INT,
    activationkey VARCHAR(32),
    active BOOLEAN,
    UNIQUE KEY (email),
    PRIMARY KEY (racerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE SPONSOSRS */
CREATE TABLE IF NOT EXISTS sponsors (
    sponsorID INT NOT NULL AUTO_INCREMENT,
    brandname VARCHAR(254),
    logo VARCHAR(254),
    totalvalue INT,
    ncontracts INT,
    avgvalue INT as (totalvalue / ncontracts),
    PRIMARY KEY (sponsorID),
    UNIQUE (brandname)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE TRANSACTIONS */
CREATE TABLE IF NOT EXISTS transactions (
    transactionID INT NOT NULL AUTO_INCREMENT,
    tdate DATE,
    tsender VARCHAR(254),
    treceiver VARCHAR(254),
    tvalue INT,
    PRIMARY KEY (transactionID)
) ENGINE InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE LICENCES */
CREATE TABLE IF NOT EXISTS licences (
    licenceID INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(32),
    dailyprice INT,
    PRIMARY KEY(licenceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*  TABLE LICENCECTR */ 
CREATE TABLE IF NOT EXISTS licencectr (
    racinglicenceID INT NOT NULL AUTO_INCREMENT,
    licence INT,
    licencevalue INT,
    racer VARCHAR(254),
    startdate DATE,
    enddate DATE,
    PRIMARY KEY (racinglicenceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE TEAMS
CREATE TABLE IF NOT EXISTS teams (
    teamID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(254),
    password VARCHAR(254),
    teamname VARCHAR(254),
    managername VARCHAR(254),
    managerdriverid VARCHAR(254),
    nationality VARCHAR(2),
    flag VARCHAR(254),
    lastlogin DATE,
    logo VARCHAR(254),
    website VARCHAR(254),
    facebook VARCHAR(254),
    youtube VARCHAR(254),
    twitch VARCHAR(254),
    bankroll DECIMAL(11,2),
    active BOOLEAN,
    PRIMARY KEY (teamID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE SIMULATORS 
CREATE TABLE IF NOT EXISTS simulators (
    description VARCHAR (254),
    PRIMARY KEY (description)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* TABLE ORGANIZATIONS 
CREATE TABLE IF NOT EXISTS organizations (
    organizationID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(254),
    password VARCHAR(254),
    organization VARCHAR(254),
    managername VARCHAR(254),
    nationality VARCHAR(2),
    flag VARCHAR(254),
    registrationdate DATE,
    lastlogin DATE,
    logo VARCHAR(254),
    website VARCHAR(254),
    forum VARCHAR(254),
    facebook VARCHAR(254),
    youtube VARCHAR(254),
    twitch VARCHAR(254),
    teamspeak VARCHAR(254),
    discord VARCHAR(254),
    bankroll DECIMAL(11,2),
    activationkey VARCHAR(32),
    active BOOLEAN,
    PRIMARY KEY (organizationID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS teams (
    teamID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(254),
    password VARCHAR(254),
    teamname VARCHAR(254),
    managername VARCHAR(254),
    managerdriverid VARCHAR(254),
    nationality VARCHAR(2),
    flag VARCHAR(254),
    lastlogin DATE,
    logo VARCHAR(254),
    website VARCHAR(254),
    facebook VARCHAR(254),
    youtube VARCHAR(254),
    twitch VARCHAR(254),
    bankroll DECIMAL(11,2),
    active BOOLEAN,
    PRIMARY KEY (teamID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE IF NOT EXISTS teamsctr(
    teamctrID INT NOT NULL AUTO_INCREMENT,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS sponsorsctr (
    sponsorsctrID INT NOT NULL AUTO_INCREMENT,
    sponsorID INT,
    teamID INT,
    racerID INT,
    startdate DATE,
    enddate DATE,
    ctrvalue INT,
    status BOOLEAN,         /* contract can be pending or accepted 
    expiration DATE,     /* a pending contract will be deleted at this date 
    PRIMARY KEY(sponsorsctrID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS championships (
    championshipID INT NOT NULL AUTO_INCREMENT,
    organizationid INT,
    description VARCHAR(254),
    image VARCHAR(254),
    simulator VARCHAR(64),
    servername VARCHAR(64),
    serveraddress VARCHAR(64),
    serverpass VARCHAR(64),
    startdate DATE,
    enddate DATE,
    status, /* published, online, finished  
    registrationend DATE,
    licenseid INT,
    entryfee INT,
    maxdrivers INT,
    c1prize INT,
    c1prize INT,
    c2prize INT,
    c3prize INT,
    c4prize INT,
    c5prize INT,
    c6prize INT,
    c7prize INT,
    c8prize INT,
    c9prize INT,
    c10prize INT,
    othersprize INT,
)