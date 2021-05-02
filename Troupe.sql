/*issues fixed*/

/*circular reference between showStaff and show */
/*change 'author' to 'writer' 
	address and city are varchar(50)
	most fields at DECIMAL(12,2) and below
	character -> characters
	show -> shows
	*/

DROP TABLE IF EXISTS donation;
DROP TABLE IF EXISTS ticketSales;
DROP TABLE IF EXISTS theaterRevenue;
DROP TABLE IF EXISTS revenueReport;
DROP TABLE IF EXISTS donor;
DROP TABLE IF EXISTS boxOfficeReceipt;
DROP TABLE IF EXISTS actorTravel;
DROP TABLE IF EXISTS travelExpense;
DROP TABLE IF EXISTS fixedProduction;
DROP TABLE IF EXISTS actorProduction;
DROP TABLE IF EXISTS operatingExpense;
DROP TABLE IF EXISTS productionExpense;
DROP TABLE IF EXISTS weeklyExpense;
DROP TABLE IF EXISTS operatingCategory;
DROP TABLE IF EXISTS itemCategory;
DROP TABLE IF EXISTS productionMilestones;
DROP TABLE IF EXISTS showProduction;
DROP TABLE IF EXISTS theater;
DROP TABLE IF EXISTS milestone;
DROP TABLE IF EXISTS showVersion;
DROP TABLE IF EXISTS characters;
DROP TABLE IF EXISTS show_genre;
DROP TABLE IF EXISTS shows;
DROP TABLE IF EXISTS showStaff;
DROP TABLE IF EXISTS showCategory;
DROP TABLE IF EXISTS role;
DROP TABLE IF EXISTS actor_phone;
DROP TABLE IF EXISTS actor;







CREATE TABLE actor(
	actorID int NOT NULL,
	firstName varchar(30),
	lastName varchar(30),
	ssn char(9) NOT NULL,
	CONSTRAINT actorID_pk
		PRIMARY KEY (actorID),
	CONSTRAINT ssn_unique
		UNIQUE (ssn)
);

CREATE TABLE actor_phone(
	actorID int NOT NULL,
	cellNumber char(11) NOT NULL,
	CONSTRAINT actorID_cellNumber_pk
		PRIMARY KEY (actorID, cellNumber),
	CONSTRAINT actorID_fk 
		FOREIGN KEY (actorID)
			REFERENCES actor (actorID)
);

CREATE TABLE role (
	roleID int NOT NULL AUTO_INCREMENT,
	roleName varchar(40) NOT NULL, 
	CONSTRAINT roleID_pk
		PRIMARY KEY (roleID)
);

CREATE TABLE showGenre (
	showGenreID int NOT NULL AUTO_INCREMENT,
	genreName varchar(30) NOT NULL,
	CONSTRAINT showGenreID_pk 
		PRIMARY KEY (showGenreID)
);

CREATE TABLE showStaff (
	staffID int NOT NULL,
	firstName varchar(30),
	lastName VARCHAR(30),
	CONSTRAINT staffID_pk
		PRIMARY KEY (staffID)
);

CREATE TABLE shows (
	showID int NOT NULL AUTO_INCREMENT,
	genreID int NOT NULL,
	producer int NOT NULL,
	director int NOT NULL,
	writer int NOT NULL,
	title varchar(40),
	budgetSet DECIMAL(12,2),
	budgetActor DECIMAL(12,2),
	description TEXT,
	openingDate DATE,
	CONSTRAINT showID_pk 
		PRIMARY KEY (showID),
	CONSTRAINT genreID_fk
		FOREIGN KEY (genreID)
			REFERENCES showCategory (showGenreID),
	CONSTRAINT producer_fk 
		FOREIGN KEY (producer)
			REFERENCES showStaff(staffID),
	CONSTRAINT director_fk 
		FOREIGN KEY (director)
			REFERENCES showStaff(staffID),	
	CONSTRAINT writer_fk 
		FOREIGN KEY (writer)
			REFERENCES showStaff(staffID)
);

CREATE TABLE shows_genre(
	showID int NOT NULL,
	genreID int NOT NULL,
	CONSTRAINT genreID_showID_pk
		PRIMARY KEY (showID, genreID),
	CONSTRAINT shows_genre_showID_fk 
		FOREIGN KEY (showID)
			REFERENCES shows(showID),
	CONSTRAINT shows_genre_genreID_fk
		FOREIGN KEY (genreID)
			REFERENCES showGenre(genreID)
);


CREATE TABLE characters (
	roleID int NOT NULL,
	showID int NOT NULL,
	actor int,
	backup int,
	gender varchar(30),
	CONSTRAINT roleID_showID_pk
		PRIMARY KEY (roleID, showID),
	CONSTRAINT roleID_fk
		FOREIGN KEY (roleID)
			REFERENCES role (roleID),
	CONSTRAINT characters_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID),
	CONSTRAINT actor_fk
		FOREIGN KEY(actor)
			REFERENCES actor (actorID),
	CONSTRAINT backup_fk
		FOREIGN KEY (backup)
			REFERENCES actor (actorID)
);

CREATE TABLE showVersion (
	showVersionID int NOT NULL AUTO_INCREMENT,
	showID int NOT NULL,
	versionNo DECIMAL(2,1),
	CONSTRAINT showVersionID_pk
		PRIMARY KEY (showVersionID),
	CONSTRAINT showVersion_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID)
);

CREATE TABLE milestone (
	milestoneID int NOT NULL AUTO_INCREMENT,
	date DATE,
	description TEXT,
	directorEvaluation TINYTEXT,
	producerComments TEXT,
	CONSTRAINT milestoneID_pk
		PRIMARY KEY (milestoneID)
);

CREATE TABLE theater (
	theaterID int NOT NULL AUTO_INCREMENT,
	theaterName varchar(30),
	address varchar(50),
	city varchar(50),
	state char(2),
	zip char(5),
	fax char(11),
	phone char(11),
	manager varchar(60),
	CONSTRAINT theaterID_pk
		PRIMARY KEY (theaterID),
	CONSTRAINT location_uk
		UNIQUE(address, city, state, zip)
);

CREATE TABLE showProduction (
	productionID  int NOT NULL AUTO_INCREMENT,
	showID int NOT NULL,
	theaterID int NOT NULL,
	startDate DATE,
	endDate DATE,
	CONSTRAINT productionID_pk
		PRIMARY KEY (productionID),
	CONSTRAINT showProduction_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID),
	CONSTRAINT showProduction_theaterID_fk
		FOREIGN KEY (theaterID)
			REFERENCES theater (theaterID)
);

CREATE TABLE productionMilestones (
	productionID int NOT NULL,
	milestoneID int NOT NULL,
	CONSTRAINT productionID_milestoneID_pk
		PRIMARY KEY (productionID, milestoneID),
	CONSTRAINT productionMilestones_productionID_fk
		FOREIGN KEY (productionID)
			REFERENCES showProduction (productionID),
	CONSTRAINT productionMilestones_milestoneID_fk
		FOREIGN KEY (milestoneID)
			REFERENCES milestone (milestoneID)
);

CREATE TABLE itemCategory (
	itemCategoryID int NOT NULL AUTO_INCREMENT,
	itemType varchar(30),
	CONSTRAINT itemCategoryID_pk
		PRIMARY KEY (itemCategoryID)
);

CREATE TABLE operatingCategory(
	operatingCategoryID int NOT NULL AUTO_INCREMENT,
	category varchar(30),
	CONSTRAINT operatingCategoryID_pk
		PRIMARY KEY (operatingCategoryID)
);


CREATE TABLE weeklyExpense (
	weeklyExpenseID int NOT NULL AUTO_INCREMENT,
	startDate DATE,
	endDate DATE,
	weeklyTotal DECIMAL(12,2) NOT NULL,
	CONSTRAINT weeklyexpenseID_pk
		PRIMARY KEY (weeklyExpenseID)
);

CREATE TABLE productionExpense(
	productionExpenseID int NOT NULL AUTO_INCREMENT,
	weeklyExpenseID int NOT NULL,
	productionID int NOT NULL,
	actorTotal DECIMAL(12,2),
	fixedTotal DECIMAL(12,2),
	productionTotal DECIMAL(12,2),
	budget DECIMAL(14,2),
	budgetPercentSpent DECIMAL(7,4),
	CONSTRAINT productionExpenseID_pk
		PRIMARY KEY(productionExpenseID),
	CONSTRAINT productionExpense_weeklyExpenseID_fk
		FOREIGN KEY (weeklyExpenseID)
			REFERENCES weeklyExpense (weeklyExpenseID),
	CONSTRAINT productionExpense_productionID_fk
		FOREIGN KEY (productionID)
			REFERENCES showProduction (productionID)
);

CREATE TABLE operatingExpense(
	operatingExpenseID int NOT NULL AUTO_INCREMENT,
	weeklyExpenseID int NOT NULL,
	operatingCategoryID int NOT NULL,
	amount DECIMAL(12,2),
	address varchar(50),
	city varchar(50),
	state char(2),
	zip char(5),
	taxID int NOT NULL,
	CONSTRAINT operatingExpenseID_pk
		PRIMARY KEY(operatingExpenseID),
	CONSTRAINT operatingExpense_weeklyExpenseID_fk
		FOREIGN KEY (weeklyExpenseID)
			REFERENCES weeklyExpense (weeklyExpenseID),
	CONSTRAINT operatingExpense_operatingCategoryID_fk
		FOREIGN KEY (operatingCategoryID)
			REFERENCES operatingCategory (operatingCategoryID)
);

CREATE TABLE actorProduction(
	actorID int NOT NULL,
	weeklyExpenseID int NOT NULL,
	roleID int,
	amount DECIMAL(12,2),
	datePaid DATE,
	CONSTRAINT actorID_weeklyExpenseID_pk
		PRIMARY KEY (actorID, weeklyExpenseID),
	CONSTRAINT actorProduction_actorID_fk
		FOREIGN KEY (actorID)
			REFERENCES actor (actorID),
	CONSTRAINT actorProduction_weeklyExpenseID_fk
		FOREIGN KEY (weeklyExpenseID)
			REFERENCES weeklyExpense (weeklyExpenseID),
	CONSTRAINT actorProduction_roleID_fk
		FOREIGN KEY (roleID)
			REFERENCES role (roleID)
);

CREATE TABLE fixedProduction(
	itemName varchar(50) NOT NULL,
	weeklyExpenseID int NOT NULL,
	categoryID int NOT NULL,
	address varchar(50),
	city varchar(50), 
	state char(2),
	zip char(5),
	description TEXT,
	amount DECIMAL (12,2),
	CONSTRAINT itemName_weeklyExpenseID_pk
		PRIMARY KEY (itemName, weeklyExpenseID),
	CONSTRAINT fixedProduction_weeklyExpenseID_fk
		FOREIGN KEY (weeklyExpenseID)
			REFERENCES weeklyExpense (weeklyExpenseID),
	CONSTRAINT fixedProduction_categoryID_fk
		FOREIGN KEY (categoryID)
			REFERENCES itemCategory (itemCategoryID)
);

CREATE TABLE travelExpense(
	travelExpenseID int NOT NULL AUTO_INCREMENT,
	showID int NOT NULL,
	theaterID int NOT NULL,
	startDate DATE,
	endDate DATE,
	hotel varchar(30),
	nights int,
	transportationCost DECIMAL(8,2),
	actorExpenseTotal DECIMAL(8,2),
	receiptAmountTotal DECIMAL(10,2),
	CONSTRAINT travelExpenseID_pk
		PRIMARY KEY  (travelExpenseID),
	CONSTRAINT travelExpense_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID),
	CONSTRAINT travelExpense_theaterID_fk
		FOREIGN KEY (theaterID)
			REFERENCES theater (theaterID)
);

CREATE TABLE actorTravel(
	actorID int NOT NULL,
	travelExpenseID int NOT NULL,
	lodging DECIMAL(10,2),
	meals DECIMAL(10,2),
	total DECIMAL(11,2),
	CONSTRAINT actorID_travelExpenseID_pk
		PRIMARY KEY(actorID, travelExpenseID),
	CONSTRAINT actorTravel_actorID_fk
		FOREIGN KEY (actorID)
			REFERENCES actor (actorID),
	CONSTRAINT actorTravel_travelExpenseID_fk
		FOREIGN KEY (travelExpenseID)
			REFERENCES travelExpense (travelExpenseID)
);

CREATE TABLE boxOfficeReceipt(
	date DATE,
	travelExpenseID int NOT NULL,
	receipts DECIMAL(10,2),
	percent DECIMAL(7,4),
	amount DECIMAL(10,2),
	CONSTRAINT date_travelExpenseID_pk
		PRIMARY KEY (date, travelExpenseID),
	CONSTRAINT boxOfficeReceipt_travelExpenseID_fk
		FOREIGN KEY (travelExpenseID)
			REFERENCES travelExpense (travelExpenseID)
);

CREATE TABLE donor(
	donorID int NOT NULL AUTO_INCREMENT,
	firstName varchar(30),
	lastName varchar(30),
	CONSTRAINT donorID_pk
		PRIMARY KEY (donorID)
);

CREATE TABLE revenueReport(
	reportID int NOT NULL AUTO_INCREMENT,
	showID int NOT NULL,
	producerID int NOT NULL,
	primaryDonor int NOT NULL,
	royaltyFee DECIMAL(8,2),
	donationTotal DECIMAL(10,2),
	theaterRevenueTotal DECIMAL(10,2),
	ticketTotal DECIMAL(10,2),
	audienceTotal int,
	receiptTotal DECIMAL(13,2),
	CONSTRAINT reportID_pk
		PRIMARY KEY (reportID),
	CONSTRAINT revenueReport_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID),
	CONSTRAINT revenueReport_producerID_fk
		FOREIGN KEY (producerID)
			REFERENCES showStaff (staffID),
	CONSTRAINT revenueReport_primaryDOnor_fk
		FOREIGN KEY (primaryDonor)
			REFERENCES donor (donorID)
);

CREATE TABLE theaterRevenue(
	theaterRevenueID int NOT NULL AUTO_INCREMENT,
	reportID int NOT NULL,
	theaterID int NOT NULL,
	numOfDays int,
	audience int,
	amount DECIMAL(10,2),
	CONSTRAINT theaterRevenueID_pk
		PRIMARY KEY (theaterRevenueID),
	CONSTRAINT theaterRevenue_reportID_fk
		FOREIGN KEY (reportID)
			REFERENCES revenueReport (reportID),
	CONSTRAINT theaterRevenue_theaterID_fk
		FOREIGN KEY (theaterID)
			REFERENCES theater (theaterID)
);

CREATE TABLE ticketSales(
	date DATE,
	showID int NOT NULL,
	freeTickets int,
	adultTickets int,
	studentTickets int,
	ticketAmount DECIMAL(10,2),
	CONSTRAINT date_showID_pk
		PRIMARY KEY (date, showID),
	CONSTRAINT ticketSales_showID_fk
		FOREIGN KEY (showID)
			REFERENCES shows (showID)
);

CREATE TABLE donation(
	donationID int NOT NULL,
	reportID int NOT NULL,
	donorID int NOT NULL,
	date DATE,
	amount DECIMAL(10,2),
	donationType char(1),
	CONSTRAINT donationID_pk
		PRIMARY KEY (donationID),
	CONSTRAINT donation_reportID_fk
		FOREIGN KEY (reportID)
			REFERENCES revenueReport (reportID),
	CONSTRAINT donation_donorID_fk
		FOREIGN KEY (donorID)
			REFERENCES donor (donorID)
);

