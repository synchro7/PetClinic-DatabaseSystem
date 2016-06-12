USE PETCLINIC;

/*ID (PK), F_Name, L_Name, Address, Phone, Sex - Owner*/
INSERT INTO OWNER
VALUES
('100001', 'Allen', 'Walker', 'GB', '001-000-111','M'),
('100002', 'Filet', 'Minyon', 'US', '001-000-112','F'),
('100003', 'Patti', 'Minyon', 'US', '001-000-112','M'),
('100004', 'Melanie', 'Cole', 'US', '001-000-114','F'),
('100005', 'Krista', 'Patterson', 'MX', '001-000-115','F'),
('100006', 'Justin', 'Parsons', 'MN', '001-000-116','M'),
('100007', 'Cecil', 'Waters', 'IE', '001-000-117','F'),
('100008', 'Sylvia', 'Ellis', 'IT', '001-000-118','F'),
('100009', 'Glenda', 'James', 'JP', '001-000-119','F'),
('100010', 'Jeffery', 'Wise', 'IN', '001-000-120','M'),
('100011', 'Jean', 'Lopez', 'BT', '001-000-121','F'),
('100012', 'John', 'Arbuckle', 'US', '001-000-122','M'),
('100013', 'Jamila', 'Gunn', 'CR', '001-000-123','F'),
('110000', 'Alexander', 'Harper', 'GB', '109-000-999','M'),
('110002', 'Pewdiepie', 'Kjellberg', 'SE', '123-000-933','M'),
('110003', 'Phakphum', 'Wanpen', 'TH', '000-000-000','M'),
('120001', 'Bob', 'Johnny', 'US', '001-000-113','M'),
('120002', 'Yuma', 'Takeda', 'JP', '001-000-114','F'),
('120003', 'Delores', 'Evans', 'US', '001-000-115','F'),
('120004', 'Olga', 'Collier', 'FL', '001-000-116','F'),
('120005', 'Theodore', 'Cain', 'US', '001-000-117','M'),
('120006', 'Lyle', 'Mack', 'GB', '001-000-118','M'),
('120007', 'Lola', 'Fields', 'US', '001-000-119','F');

/*ID (PK), Owner_ID, Pet_Name, Date_of_Birth, Breed, SEX*/
INSERT INTO PET
VALUES
('2000001', '100001', 'Puck', '2013-07-09', 'Faerie Dragon','F'),
('2000002', '100002', 'Scar', '1994-06-15', 'Lion','M'),
('2000003', '100002', 'Simba', '1994-06-15', 'Lion','M'),
('2000004', '100003', 'Courage', '1999-11-12', 'Dog','M'),
('2000005', '100012', 'Garfield', '2004-06-15', 'Cat','M'),
('2000006', '100012', 'Odie', '2004-06-06', 'Dog','M'),
('2000007', '100004', 'Tom', '1940-02-10', 'Cat','M'),
('2000008', '100005', 'Jerry', '1940-02-10', 'Rat','M'),
('2000009', '100007', 'Bambi', '1942-08-08', 'Deer','F'),
('2000010', '100008', 'Enchantress', '2013-07-09', 'Deer','F'),
('2000011', '100009', 'Jakiro', '2013-07-09', 'Dragon','M'),
('2000012', '100011', 'Huffer', '2014-03-11', 'Pig','M'),
('2000013', '100013', 'Misha', '2014-03-11', 'Bear','F'),
('2100000', '110000', 'Pug', '1994-06-15', 'Faerie Dragon','F'),
('2100002', '110002', 'Edgar', '2012-05-16', 'Pug','M'),
('2100003', '110003', 'BaBlu', '2010-01-01', 'Pitbull','M'),
('2200001', '120001', 'Puck2', '2012-05-16', 'Faerie Dragon','F'),
('2200002', '120002', 'Scar2', '2012-05-16', 'Lion','M'),
('2200003', '120003', 'Nyla', '2012-05-16', 'Cat','F'),
('2200004', '120004', 'Shadow', '2012-05-16', 'Dog','M'),
('2200005', '120005', 'Maya', '2012-05-16', 'Dog','F'),
('2200006', '120006', 'Brownie', '2012-05-16', 'Dog','M'),
('2200007', '120007', 'Bomb', '2012-05-16', 'Tiger','F');

INSERT INTO VET
VALUES 
('3000001', 'Sylvester', 'Lopez', 'US', '001-000-121','M'),
('3000002', 'Mercedes', 'Oliver', 'US', '001-000-122','F');

INSERT INTO MEDICINE
VALUES 
('4000001', 'Tylenol', '10', 'For Headaches'),
('4000002', 'Stuflu', '5', 'For Stomach Infection'),
('4000003', 'Bluflu', '15', 'For Lung Infection'),
('4000004', 'Iflu', '5', 'For Eye Infection'),
('4000005', 'Tailflu', '10', 'For Tail Infection');

INSERT INTO DIAGNOSIS_RECORD
VALUES 
('6000001', '2000001', '3000001', '2016-06-01', 'very sick very bad'),
('6000002', '2000003', '3000001', '2016-06-10', 'not too sick but needs time to heal'),
('6000003', '2000004', '3000002', '2016-06-10', 'needs to rest for a week'),
('6000004', '2000005', '3000002', '2016-06-11', 'needs to be transferred');

INSERT INTO PRESCRIPTION
VALUES 
('5000001', '6000001', '4000001', '50'),
('5000002', '6000002', '4000004', '10'),
('5000003', '6000003', '4000005', '100');