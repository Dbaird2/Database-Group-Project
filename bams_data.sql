set foreign_key_checks = 0;

insert into bank_info (bankID,address,city,zip,phone,routing, bank_name) values ('A25501B4','904 E. California Street', 'Ontario', 91761, '950-173-8500', 867825559, 'Student Credit Union');

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone,pwd,unhash_pwd, admin, status) 
VALUES ('Donald', 'Trump', 'Dtrump@gmail.com', 'Dtrump', '1950-12-20', '10 Broke St', '124-446-1830','12345','12345', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('Dtrump', 'Checkings', 500000, 240575934, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('Dtrump', 'Savings', 5000000000, 948374020, 'Savings', TRUE);

insert into bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
values ('Shaggy', 'Rogers', 'ShaggyRogers@gmail.com', 'Shaggy17', '1969-09-13', '224 Maple Street, Coolsville', '941-330-5202', FALSE, TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Shaggy17', 'Checkings', 1000, 112385947, 'Shaggy Checkings', TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Shaggy17', 'Savings', 210, 110372936, 'Shaggy Savings', TRUE);

insert into bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
values ('Scooby', 'Doo', 'scoobydoo@gmail.com', 'Scooby55', '1969-09-13', '224 Maple Street, Coolsville', '941-330-5202', FALSE, TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Scooby55', 'Savings', 15.00, 110382936, 'Scooby Savings', TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Scooby55', 'Checkings', 1000.00, 102385947, 'Scooby Checkings', TRUE);

insert into bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
values ('Velma', 'Dinkley', 'VelmaDinkley@gmail.com', 'Velma15', '1971-09-13', 'Dinkley House, Crystal Cove', '941-210-5381', FALSE, TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Velma15', 'Checkings', 12000, 102685347, 'Velma Checkings', TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Velma15', 'Savings', 105000, 111482936, 'Velma Savings', TRUE);

insert into bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
values ('Daphne', 'Blake', 'DaphneBlake@gmail.com', 'Daphne16', '1970-09-13', 'Blake Mansion, Crystal Cove', '941-952-5243', FALSE, TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Daphne16', 'Checkings', 1234, 162386948, 'Daphne Checkings', TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Daphne16', 'Savings', 1500, 113372925, 'Daphne Savings', TRUE);

insert into bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
values ('Fred', 'Jones', 'FredJones@gmail.com', 'Fred17', '1969-09-13', '5219 Cimarron St in Bakersfield, CA', '941-038-8951', FALSE, TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Fred17', 'Checkings', 10204, 112438508, 'Fred Checkings', TRUE);
insert into account (uid, type, balance, accnum, accname, status) values ('Fred17', 'Savings', 70151, 121393037, 'Fred Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Joe', 'Douglas', 'jd@gmail.com', 'JD001', '1970-01-01', '201 Taco st, Scottsdale AZ', '480-786-9082', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('JD001', 'Checkings', 34, 892347686, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('JD001', 'Savings', 34, 461837583, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Lucy', 'Liu', 'll@gmail.com', 'LL34', '1968-12-02', '201 Celebrity Dr, Beverly Hills', '310-436-1493', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('LL34', 'Checkings', 20000000, 382057420, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('LL34', 'Savings', 40000000, 374619473, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Dominic', 'Lake', 'dl@gmail.com', 'DLrizz', '2004-10-31', '3400Wetherley Dr, Bakersfield CA', '661-980-3450', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('DLrizz', 'Checkings', 200, 485738400, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('DLrizz', 'Savings', 0, 138562839, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Caroline', 'Contreras', 'toughtaco4life@gmail.com', 'pepapig', '2003-07-18', '100 Secret St, Bakersfield CA', '123-456-7890', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('pepapig', 'Checkings', 2300, 239575934, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('pepapig', 'Savings', 54000, 948372920, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Don', 'Pepe', 'DP@gmail.com', 'MiGente', '1973-02-11', '349 Los Angeles St, LA CA', '458-908-7456', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('MiGente', 'Checkings', 1, 374275975, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('MiGente', 'Savings', 2, 364783746, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Bob', 'LEponge', 'bobleponge420@example.com', 'goofygoober', '1986-07-14', '124 Conch Street, Bikini Bottom', '601-555-9196', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Rober', 'Johnson', 'robert.johnson9@example.com', 'superrobert9', '1979-03-04', '145 Pine Ave, New York', '689-531-8034', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Walter', 'White', 'heisenberg@example.com', 'heisenbergnm', '1958-09-07', '3828 Piermont Drive, Alburquerque', '505-193-0809', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Cosmo', 'Kramer', 'yellow89@example.com', 'proctologist', '1949-07-24', '129 West 81st Street, New York', '555-667-8383', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) VALUES ('Anita', 'Smith', 'smith7@example.com', 'anitasmith11', '1977-01-28', '673 Morning Drive, Sacramento', '499-836-8350', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('goofygoober', 'Checkings', 1279, 471289873, 'goofy', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('superrobert9', 'Checkings', '7419', '418279471', 'super', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('heisenbergnm', 'Checkings', '4812', '472979892', 'blue', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('proctologist', 'Checkings', '9490', '741869840', 'proctologist', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('anitasmith11', 'Checkings', 4089, 901849072, 'amazon', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('goofygoober', 'Savings', '1279', '709874180', 'gg', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('superrobert9', 'Savings', '7419', '572108443', 'dog', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('heisenbergnm', 'Savings', '4812', '517834099', 'cat', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('proctologist', 'Savings', '9490', '310859037', 'dad', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) VALUES ('anitasmith11', 'Savings', 4089, 581092808, 'mom', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
VALUES ('Bob', 'Ross', 'bobross@gmail.com', 'bob', '2003-02-01', '810 Somewhere ST', '123-456-7890', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('bob', 'Checkings', 2300, 242575934, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('bob', 'Savings', 54000, 928672920, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
VALUES ('John', 'Doe', 'john17@gmail.com', 'john17', '2000-04-18', '100 Trent Dr','456-293-0923', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('john17', 'Checkings', 2300, 130575934, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('john17', 'Savings', 5410, 945682920, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
VALUES ('Mort', 'Jenkins', 'mortjenkins@gmail.com', 'mortj', '2010-04-13', '100 Industry rd', '123-456-7890', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('mortj', 'Checkings', 3321, 239575945, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('mortj', 'Savings', 540, 948372919, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) 
VALUES ('Guy', 'Williams', 'gwill@gmail.com', 'gwill', '1979-12-11', '10300 Monkey Ave', '661-550-7890', FALSE, TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('gwill', 'Checkings', 1000, 240075934, 'Checking', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status)
VALUES ('gwill', 'Savings', 3000, 940072920, 'Savings', TRUE);

INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) values ('Fabian', 'Seacaster', 'fabianseacaster@gmail.com', 'toxicmasculinityisdead', '1998-07-22', '219 Sea Boulevard, Elmville', '851-200-6321', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) values ('Gorgug', 'Thistlespring', 'gorgug@gmail.com', 'tinflower', '1998-04-09', '110 Thistletree Lane, Elmville', '851-198-3359', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) values ('Adaine', 'Abernant', 'adaine@gmail.com', 'elvenoracle', '1998-10-15', '390 Wizard Street, Elmville', '851-588-9122', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) values ('Figueroth', 'Faeth', 'fig667@gmail.com', 'archdevil667', '1998-12-25', '233 Trubshaw Avenue, Elmville', '851-442-9081', FALSE, TRUE);
INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, admin, status) values ('Riz', 'Gukgak', 'riz@gmail.com', 'theball', '1998-10-18', '335 Strong Tower Street, Elmville', '851-707-4913', FALSE, TRUE);

INSERT INTO account (uid, type, balance, accnum, accname, status) values ('toxicmasculinityisdead', 'Checkings', '9038', '681102352', 'fabian', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) values ('toxicmasculinityisdead', 'Savings', '109422', '703400416', 'idancenow', TRUE);

INSERT INTO account (uid, type, balance, accnum, accname, status) values ('tinflower', 'Checkings', '5199', '576102012', 'gorgug', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) values ('tinflower', 'Savings', '9244', '632601778', 'irage', TRUE);

INSERT INTO account (uid, type, balance, accnum, accname, status) values ('elvenoracle', 'Checkings', '3790', '409729487', 'adaine', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) values ('elvenoracle', 'Savings', '8265', '537210919', 'boggy', TRUE);

INSERT INTO account (uid, type, balance, accnum, accname, status) values ('archdevil667', 'Checkings', '4488', '613012846', 'fig', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) values ('archdevil667', 'Savings', '102011', '709872341', 'chaosdevil', TRUE);

INSERT INTO account (uid, type, balance, accnum, accname, status) values ('theball', 'Checkings', '5711', '320948372', 'riz', TRUE);
INSERT INTO account (uid, type, balance, accnum, accname, status) values ('theball', 'Savings', '6185', '455129035', 'goblinmode', TRUE);





insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Scooby55', '113372925', 'Withdrawal', 'Checkings', 14.00, '2023-01-15', 'Completed', 102385947);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Shaggy17', '162386948', 'Withdrawal', 'Checkings', 140, '2023-01-15', 'Completed', 112385947);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Velma15', '162386948', 'Withdrawal', 'Checkings', 140, '2023-01-15', 'Completed', 102685347);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Daphne16', '111482936', 'Withdrawal', 'Checkings', 92, '2023-02-10', 'Completed', 162386948);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Fred17','113372925', 'Withdrawal', 'Checkings', 23, '2015-01-15', 'Completed', 112438508);
insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Fred17', '121393037', 'Deposit', 'Savings', 10, '2022-9-2', 'Completed', 121393037);
CALL add_from_deposit(121393037, 10);


------------------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('JD001',892347686, 'Deposit', 'Checkings', 32, '2021-07-04', 'Completed', 892347686);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('JD001', 892347686, 'Deposit', 'Checkings', 1, '2021-07-04', 'Completed', 892347686);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('JD001',461837583, 'Deposit', 'Savings', 100, '2021-07-05', 'Pending', 461837583);
CALL add_from_deposit(461837583, 100);
---------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('LL34',382057420, 'Deposit', 'Checkings', 2000, '2021-07-04', 'Completed', 382057420);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('LL34',382057420, 'Deposit', 'Checkings', 10, '2021-07-04', 'Completed', 382057420);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('LL34', 374619473, 'Deposit', 'Savings', 1000, '2021-07-05', 'Pending', 374619473);

---------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('DLrizz',485738400, 'Deposit', 'Checkings', 90, '2021-07-04', 'Completed', 485738400);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('DLrizz',485738400, 'Deposit', 'Checkings', 7, '2021-07-04', 'Completed', 485738400);


INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('DLrizz', 138562839, 'Deposit', 'Savings', 1000, '2021-07-05', 'Pending', 138562839);
----------------------------------------------------------------

INSERT INTO transactions (uid,other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('pepapig',239575934, 'Deposit', 'Checkings', 30, '2021-07-04', 'Completed', 239575934);

INSERT INTO transactions (uid,other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('pepapig',239575934, 'Deposit', 'Checkings', 300, '2021-07-04', 'Completed', 239575934);


INSERT INTO transactions (uid,other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('pepapig',948372920, 'Deposit', 'Savings', 100, '2021-07-05', 'Pending', 948372920);

---------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('MiGente',374275975, 'Deposit', 'Checkings', 1, '2021-07-04', 'Completed', 374275975);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('MiGente',374275975, 'Deposit', 'Checkings', 300, '2021-07-04', 'Completed', 374275975);


INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('MiGente',364783746, 'Deposit', 'Savings', 100, '2021-07-05', 'Pending', 364783746);
-------------------------------------------------------------------------------------



INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('goofygoober', '242575934', 'Withdrawal', 'Savings', '13', '2024-03-28', 'Completed', '709874180');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('goofygoober', '709874180', 'Deposit', 'Checkings', '54', '2023-01-20', 'Pending', '471289873');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('goofygoober', '928672920', 'Withdrawal', 'Savings', 43, '2023-03-29', 'Completed', '709874180');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('superrobert9', '572108443', 'Withdrawal', 'Checkings', '41', '2022-08-09', 'Pending', '418279471');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('superrobert9', '364783746', 'Withdrawal', 'Savings', '49', '2023-01-23', 'Completed', '572108443');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('superrobert9', '242575934', 'Withdrawal', 'Checkings', '99', '2023-09-09', 'Pending', '418279471');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('heisenbergnm', '130575934', 'Withdrawal', 'Savings', '193', '2020-01-08', 'Pending', '517834099');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('heisenbergnm', '242575934', 'Withdrawal', 'Checkings', '94', '2021-09-10', 'Pending', '472979892');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('heisenbergnm', '418279471', 'Withdrawal', 'Checkings', '44', '2023-05-12', 'Completed', '472979892');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('proctologist', '472979892', 'Withdrawal', 'Savings', '78', '2021-10-18', 'Completed', '310859037');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('proctologist', '572108443', 'Withdrawal', 'Checkings', '90', '2023-05-09', 'Completed', '741869840');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('proctologist', '130575934', 'Withdrawal', 'Checkings', '78', '2023-09-19', 'Completed', '741869840');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('anitasmith11', 242575934, 'Withdrawal', 'Savings', 142, '2022-02-02', 'Completed', 581092808);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('anitasmith11', 928672920, 'Withdrawal', 'Checkings', 83, '2023-12-21', 'Completed', 901849072);
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
VALUES ('anitasmith11', 928672920, 'Withdrawal', 'Savings', 133, '2023-12-30', 'Pending', 581092808);

------------------------------------------------------------------------------------------


INSERT INTO transactions (uid,other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('bob', 901849072, 'Withdrawal', 'Checkings', 300, '2021-07-04', 'Completed', 242575934);


INSERT INTO transactions (uid,other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('bob',741869840, 'Withdrawal', 'Savings', 100, '2021-07-05', 'Pending', 928672920);
------------------------------------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('john17', 948372919, 'Withdrawal', 'Checkings', 30, '2021-07-04', 'Completed', 130575934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('john17',239575945, 'Withdrawal', 'Checkings', 300, '2021-07-04', 'Completed', 130575934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('john17', 945682920, 'Deposit', 'Savings', 100, '2021-07-05', 'Pending', 945682920);
------------------------------------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('mortj', 240575934, 'Withdrawal', 'Checkings', 301, '2021-07-04', 'Completed', 239575945);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('mortj', 948374020, 'Withdrawal', 'Checkings', 3020, '2021-07-04', 'Completed', 239575945);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('mortj', 948372919, 'Deposit', 'Savings', 1200, '2021-07-05', 'Pending', 948372919);
CALL add_from_deposit(948372919, 1200);
------------------------------------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('Dtrump',240075934,  'Withdrawal', 'Checkings', 2, '2024-12-01', 'Completed', 240575934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('Dtrump', 240075934, 'Withdrawal', 'Checkings', 3, '2021-07-04', 'Completed', 240575934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('Dtrump', 948374020, 'Deposit', 'Savings', 10, '2021-07-05', 'Pending', 948374020);
CALL add_from_deposit(948374020, 10);
------------------------------------------------------------------------------------------

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('gwill', 613012846 ,'Withdrawal', 'Checkings', 30, '2021-07-04', 'Completed', 240075934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('gwill',632601778, 'Withdrawal', 'Checkings', 300, '2021-07-04', 'Completed', 240075934);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('gwill', 703400416,'Withdrawal', 'Savings', 100, '2021-07-05', 'Pending', 940072920);



INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('toxicmasculinityisdead', '940072920', 'Withdrawal', 'Savings', '50', '2024-04-17', 'Completed', '703400416');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('toxicmasculinityisdead', '948374020', 'Withdrawal', 'Savings', '100', '2024-04-25', 'Completed', '703400416');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('toxicmasculinityisdead', '632601778', 'Withdrawal', 'Savings', '250', '2024-05-08', 'Completed', '703400416');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('tinflower', '703400416', 'Withdrawal', 'Checkings', '25', '2024-08-10', 'Completed', '576102012');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('tinflower', '709872341', 'Withdrawal', 'Savings', '70', '2024-08-18', 'Completed', '632601778');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('tinflower', '703400416', 'Withdrawal', 'Checkings', '42', '2024-08-29', 'Pending', '576102012');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('elvenoracle', '613012846', 'Withdrawal', 'Checkings', '15', '2024-06-02', 'Completed', '409729487');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('elvenoracle', '632601778', 'Withdrawal', 'Savings', '100', '2024-07-09', 'Pending', '537210919');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('elvenoracle', '703400416', 'Withdrawal', 'Savings', '50', '2024-07-12', 'Pending', '537210919');

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('archdevil667', '576102012', 'Withdrawal', 'Savings', '500', '2024-06-27', 'Completed', '709872341');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('archdevil667', '455129035', 'Withdrawal', 'Checkings', '80', '2024-07-10', 'Pending', '613012846');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('archdevil667', '576102012', 'Withdrawal', 'Savings', '40', '2024-07-11', 'Pending', '709872341');
CALL add_from_deposit(709872341, 500);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('theball', '709872341', 'Withdrawal', 'Savings', '100', '2024-09-25', 'Completed', '455129035');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('theball', '613012846', 'Withdrawal', 'Savings', '100', '2024-10-25', 'Completed', '455129035');
INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('theball', '409729487', 'Withdrawal', 'Savings', '75', '2024-10-31', 'Pending', '455129035');




insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Scooby55', '110382936', 'Transfer', 'Checkings', 15.00, '2024-10-31', 'Pending', 102385947);
insert into transactions (uid, other_accnum, trans_type,  acc_type, amt, timeStamp, pending, accnum) 
values ('Scooby55', '102385947', 'Transfer', 'Savings', 10.00, '2024-10-31', 'Pending', 110382936);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Shaggy17', '110372936', 'Transfer', 'Checkings', 40, '2021-03-18', 'Completed', 112385947);
insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Shaggy17', '112385947', 'Transfer', 'Savings', 10, '2021-03-18', 'Completed', 110372936);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Velma15', '111482936', 'Transfer', 'Checkings', 1000, '2018-10-12', 'Completed', 102685347);
insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Velma15', '102685347', 'Transfer', 'Savings', 900, '2018-10-12', 'Completed', 111482936);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Daphne16', '113372925', 'Transfer', 'Checkings', 601, '2016-5-25', 'Completed', 162386948);
insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Daphne16', '162386948', 'Transfer', 'Savings', 51, '2016-5-25', 'Completed', 113372925);

insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Fred17', '121393037', 'Transfer', 'Checkings', 71, '2022-9-2', 'Completed', 112438508);
insert into transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) 
values ('Fred17', '112438508', 'Transfer', 'Savings', 50, '2022-9-2', 'Completed', 121393037);

INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp,pending, accnum)
VALUES ('bob', 928672920, 'Transfer', 'Checkings', 30, '2021-07-04', 'Completed', 242575934);


INSERT INTO bank_user(first_name, last_name ,email, uid, dob, address, phone, unhash_pwd, admin, status) 
VALUES ('Carlos', 'Morenos', 'taco@gmail.com', 'tacomuncher2000', '1900-01-01', '217 Grump St', '661-700-9832', '12345', TRUE, TRUE);
INSERT INTO bank_user(first_name, last_name ,email, uid, dob, address, phone, unhash_pwd, admin, status) 
VALUES ('Caroline', 'Contrares', 'silly@gmail.com', 'sillywilly', '2000-01-01', '218 Grump St', '661-700-9833', '12345' ,TRUE, TRUE);
INSERT INTO bank_user(first_name, last_name ,email, uid, dob, address, phone, unhash_pwd, admin, status) 
VALUES ('Mic', 'Dapito', 'mic@gmail.com', 'mic', '2000-01-01', '219 Grump St', '661-700-9834', '12345', TRUE, TRUE);
INSERT INTO bank_user(first_name, last_name ,email, uid, dob, address, phone, unhash_pwd, admin, status) 
VALUES ('Dason', 'Baird', 'dason@gmail.com', 'dbaird', '2000-01-01', '220 Grump St', '661-700-9835','12345', TRUE, TRUE);
INSERT INTO bank_user(first_name, last_name ,email, uid, dob, address, phone, unhash_pwd, admin, status) 
VALUES ('Nick', 'Toothman', 'NickToothman@gmail.com', 'toothman', '2000-01-01', '2820 Hidden St', '834-930-8932','Nickspassword', TRUE, TRUE);


set foreign_key_checks=1;
