CREATE TABLE IF NOT EXISTS settings (
    adminuser VARCHAR(255),
    adminpass VARCHAR(255),
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
    PRIMARY KEY (adminuser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS racers (
    racerID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255),
    password VARCHAR(255),
    firstname VARCHAR(255),
    middlename VARCHAR(255),
    lastname VARCHAR(255),
    birthdate DATE,
    registrationdate DATE,
    lastlogin DATE,
    nationality VARCHAR(2),
    flag VARCHAR(255),
    photo VARCHAR(255),
    simulators VARCHAR(255),
    bankroll DECIMAL(11,2),
    skill INT,
    attacking INT,
    defending INT,
    reliability INT,
    teamplayer INT,
    fairplay INT,
    knowledge INT,
    evalcounter INT,
    activationkey VARCHAR(32),
    active BOOLEAN,
    UNIQUE KEY (email),
    PRIMARY KEY (racerID)
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
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS organizations (
    ID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(254),
    password VARCHAR(254),
    orgname VARCHAR(254),
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
    active BOOLEAN,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
