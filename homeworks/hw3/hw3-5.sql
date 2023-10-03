-- CS 328 - HW 3 - Problem 5
-- Evan Putnam
-- Last modified: 2/17/2023

set serveroutput on;
spool hw3-5-out.txt;

prompt ===================
prompt 5 part a
prompt ===================

SELECT COUNT(*)
FROM order_needed;

prompt ===================
prompt 5 part b
prompt ===================

SELECT MAX(ord_needed_id)
FROM order_needed;

prompt ===================
prompt 5 part c
prompt ===================

create or replace function next_ord_needed_id
return int IS
    next_num int := 1;
begin
    SELECT MAX(ord_needed_id) INTO next_num
    FROM order_needed;

    next_num := next_num + 1;

    return next_num;

exception
    when no_data_found then
       next_num := 1;
       return next_num;
    when others then
       next_num := 1;
       return next_num;

end;
/
show errors;

spool off;
