-- CS 328 - HW 3 - Problem 2

spool hw3-2-out.txt;

prompt ============
prompt Evan Putnam
prompt ============

prompt ============
prompt 2 choice a
prompt ============

col pub_loc heading "Publisher Location" format a20
SELECT pub_name, (pub_city || ', ' || pub_state) pub_loc
FROM publisher
ORDER BY pub_name;

prompt ============
prompt 2 choice b
prompt ============

col cost heading "Title Prices" format $999.99
SELECT ttl_name, ttl_cost cost
FROM title, publisher
WHERE title.pub_id = publisher.pub_id AND publisher.pub_name = 'Benjamin/Cummings'
ORDER BY ttl_name;

prompt ============
prompt 2 choice c
prompt ============

col averageCost heading "Avg Cost" format $999.99
col sumttl heading "#Titles"
SELECT pub_name, COUNT(pub_name) sumttl, AVG(ttl_price) averageCost
FROM publisher, title
WHERE publisher.pub_id = title.pub_id
GROUP BY pub_name
ORDER BY averageCost;



spool off;
