-- Evan Putnam
-- CS 325 - Fall 2022
-- Last Modified - 11/18/2022

DROP TABLE birder CASCADE CONSTRAINTS;
CREATE TABLE birder
(BRDR_ID	char(6),
 brdr_name	varchar2(20) NOT NULL,
 favBird	char(6),
 favLoc		char(6),
 date_joined	date,
 primary key (brdr_id));

DROP TABLE event CASCADE CONSTRAINTS;
CREATE TABLE event
(EVENT_ID	char(6),
 host_id	char(6),
 event_title	varchar(32),
 event_date	date,
 primary key (event_id),
 foreign key (host_id) references birder(brdr_id));

DROP TABLE birder_attending_event;
CREATE TABLE birder_attending_event
(event_id	char(6),
 brdr_id	char(6),
 foreign key (event_id) references event,
 foreign key (brdr_id) references birder);

DROP TABLE bird CASCADE CONSTRAINTS;
CREATE TABLE bird
(BIRD_ID	char(6),
 bird_name	varchar(32),
 primary key (bird_id));

DROP TABLE location CASCADE CONSTRAINTS;
CREATE TABLE location
(LOC_ID		char(6),
 loc_name	varchar(32),
 primary key (loc_id));

DROP TABLE sighting CASCADE CONSTRAINTS;
CREATE TABLE sighting
(SIGHT_ID	char(6),
 brdr_id	char(6) NOT NULL,
 bird_id	char(6) NOT NULL,
 loc_id		char(6) NOT NULL,
 num_birds	number(9) NOT NULL CHECK (num_birds > 0),
 primary key (sight_id),
 foreign key (brdr_id) references birder,
 foreign key (bird_id) references bird,
 foreign key (loc_id) references location);

