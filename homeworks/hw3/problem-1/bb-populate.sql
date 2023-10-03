-- Evan Putnam
-- CS 325 - Fall 2022
-- 12/5/2022

-- ============
-- Clear tables
-- ============
DELETE FROM birder_attending_event;
DELETE FROM sighting;
DELETE FROM bird;
DELETE FROM event;
DELETE FROM location;
DELETE FROM birder;

-- ===============
-- Populate tables
-- ===============

-- Escape enabled for bird "Stellar's Jay"
SET ESCAPE ON;

-- BIRDERS (brdr_id, brdr_name, favBird, favLoc, date_joined)
INSERT INTO birder 	VALUES ('1', 'BirdGuy_333', '8', '1', '05-DEC-22');
INSERT INTO birder 	VALUES ('2', 'StinkBird', '5', '6', '18-AUG-19');
INSERT INTO birder 	VALUES ('3', 'Hermes', '10', '3', '28-DEC-00');
INSERT INTO birder 	VALUES ('4', 'Billy', '1', '1', '13-FEB-22');
INSERT INTO birder 	VALUES ('5', 'Sloth', '3', '4', '11-NOV-11');
INSERT INTO birder 	VALUES ('6', 'Envy', '2', '2', '24-APR-17');
INSERT INTO birder 	VALUES ('7', 'Falco', '8', '8', '01-JUN-22');
INSERT INTO birder 	VALUES ('8', 'Nitsua', '4', '7', '29-JUL-22');
INSERT INTO birder 	VALUES ('9', 'Wings', '8', '1', '03-SEP-18');
INSERT INTO birder 	VALUES ('10', 'Stuart', '8', '7', '27-OCT-17');

-- BIRDS (bird_id, bird_name)
INSERT INTO bird 	VALUES ('1', 'Mountain Quail');
INSERT INTO bird 	VALUES ('2', 'Dark-eyed Junco');
INSERT INTO bird 	VALUES ('3', 'Northern Harrier');
INSERT INTO bird 	VALUES ('4', 'Cackling Goose');
INSERT INTO bird 	VALUES ('5', 'Brown Pelican');
INSERT INTO bird 	VALUES ('6', 'Pelagic Cormorant');
INSERT INTO bird 	VALUES ('7', 'Acorn Woodpecker');
INSERT INTO bird 	VALUES ('8', 'Stellar''s Jay');
INSERT INTO bird 	VALUES ('9', 'Western Bluebird');
INSERT INTO bird 	VALUES ('10', 'Ruddy Duck');

-- LOCATIONS (loc_id, loc_name)
INSERT INTO location	VALUES ('1', 'Arcata Marsh');
INSERT INTO location	VALUES ('2', 'Strawberry Rock');
INSERT INTO location	VALUES ('3', 'Arcata Coast');
INSERT INTO location	VALUES ('4', 'Arcata Bottoms');
INSERT INTO location	VALUES ('5', 'Eureka Coast');
INSERT INTO location	VALUES ('6', 'North Jetty');
INSERT INTO location	VALUES ('7', 'South Jetty');
INSERT INTO location	VALUES ('8', 'Mad River Estuary');
INSERT INTO location	VALUES ('9', 'Airport Rd.');
INSERT INTO location	VALUES ('10', 'Clam Beach');

-- EVENTS (event_id, host_id, event_title, event_date)
INSERT INTO event	VALUES ('1', '9', 'Christmas Bird Count', '14-DEC-22');
INSERT INTO event	VALUES ('2', '2', 'Godwit Days', '13-APR-23');
INSERT INTO event	VALUES ('3', '8', 'Bird Walk', '11-FEB-23');
INSERT INTO event	VALUES ('4', '9', 'Audubon Society Bird Tour', '04-DEC-23');
INSERT INTO event	VALUES ('5', '1', 'Arcata Marsh Birding', '31-DEC-22');
INSERT INTO event	VALUES ('6', '8', 'California Condor Talk', '16-JAN-23');
INSERT INTO event	VALUES ('7', '3', 'North Jetty Walk', '01-JAN-23');
INSERT INTO event	VALUES ('8', '10', 'Clam Beach Cleanup', '10-DEC-22');
INSERT INTO event	VALUES ('9', '9', 'Mountain Quail Research', '29-DEC-22');
INSERT INTO event	VALUES ('10', '2', 'Samoa Dunes Nature Walk', '20-DEC-22');

-- SIGHTING (sight_id, brdr_id, bird_id, loc_id, num_birds)
INSERT INTO sighting 	VALUES ('1', '9', '4', '8', 8);
INSERT INTO sighting 	VALUES ('2', '10', '7', '6', 2);
INSERT INTO sighting 	VALUES ('3', '2', '3', '7', 15);
INSERT INTO sighting 	VALUES ('4', '2', '1', '7', 20);
INSERT INTO sighting 	VALUES ('5', '6', '9', '2', 1);
INSERT INTO sighting 	VALUES ('6', '3', '5', '7', 38);
INSERT INTO sighting 	VALUES ('7', '1', '8', '4', 5);
INSERT INTO sighting 	VALUES ('8', '8', '2', '1', 3);
INSERT INTO sighting 	VALUES ('9', '8', '10', '3', 10);
INSERT INTO sighting 	VALUES ('10', '9', '6', '3', 99);

-- BIRDERS ATTENDING EVENTS (event_id, brdr_id)
INSERT INTO birder_attending_event 	VALUES ('7', '1');
INSERT INTO birder_attending_event 	VALUES ('2', '1');
INSERT INTO birder_attending_event 	VALUES ('1', '1');
INSERT INTO birder_attending_event 	VALUES ('1', '6');
INSERT INTO birder_attending_event 	VALUES ('1', '9');
INSERT INTO birder_attending_event 	VALUES ('6', '3');
INSERT INTO birder_attending_event 	VALUES ('6', '7');
INSERT INTO birder_attending_event 	VALUES ('6', '4');
INSERT INTO birder_attending_event 	VALUES ('6', '5');
INSERT INTO birder_attending_event 	VALUES ('8', '10');


