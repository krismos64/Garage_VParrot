-- Création de la base de données
CREATE DATABASE `Garage_VParrot`;
USE `Garage_VParrot`;

-- Table pour l'administrateur
CREATE TABLE Admin (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    IsAdmin BOOLEAN
);

-- Table pour les employés
CREATE TABLE Employees (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    CanViewMessages BOOLEAN,
    CanManageVehicles BOOLEAN,
    CanApproveReviews BOOLEAN,
    CanAddReviews BOOLEAN,
    CanModifyOpeningHours BOOLEAN,
    CanManageServices BOOLEAN
);

-- Table pour les clients
CREATE TABLE Customers (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Phone VARCHAR(20) NOT NULL
);

-- Table pour les messages envoyés via le formulaire de contact
CREATE TABLE ContactMessages (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    Message TEXT,
    FOREIGN KEY (CustomerID) REFERENCES Customers(ID)
);

-- Table pour les avis clients
CREATE TABLE CustomerReviews (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerName VARCHAR(255),
    ReviewText TEXT,
    IsApproved BOOLEAN,
    ResponsibleEmployeeID INT,
    FOREIGN KEY (ResponsibleEmployeeID) REFERENCES Employees(ID)
);

-- Table pour les services proposés par le garage
CREATE TABLE Services (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Description TEXT,
    ImageURL VARCHAR(255)
);

-- Table pour les véhicules d'occasion
CREATE TABLE Cars (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Brand VARCHAR(255),
    Model VARCHAR(255),
    Year INT,
    Km INT NOT NULL,
    Price DECIMAL(10, 2),
    Description TEXT,
    ResponsibleEmployeeID INT,
    FOREIGN KEY (ResponsibleEmployeeID) REFERENCES Employees(ID)
);

-- Table pour les horaires d'ouverture des services
CREATE TABLE Schedules (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ServiceID INT,
    DayOfWeek INT,
    OpeningTime TIME,
    ClosingTime TIME,
    FOREIGN KEY (ServiceID) REFERENCES Services(ID)
);

-- Table pour les images associées aux services
CREATE TABLE ServiceImages (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ServiceID INT,
    ImageURL VARCHAR(255),
    FOREIGN KEY (ServiceID) REFERENCES Services(ID)
);

-- Table pour les images associées aux véhicules d'occasion
CREATE TABLE CarsImages (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CarID INT,
    ImageURL VARCHAR(255),
    FOREIGN KEY (CarID) REFERENCES Cars(ID)
);

