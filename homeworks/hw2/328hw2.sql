
-------------------------
-- Evan Putnam
-- 328hw2.sql
-- CS 328
-- Last Modified 2/2/2023
-------------------------

spool 328hw2-out.txt
set serveroutput on

prompt Evan Putnam
prompt 

prompt =================
prompt Problem 1
prompt =================

/*
   procedure: silly_shout: varchar2, int -> void

   purpose: Given a message, msg varchar2, the procedure
            prints the message n, num int, times. If num
            is less than 0, an error message is printed.

   example: silly_shout('nooo', -1)
	    ERROR: Cannot display message less than 0 times...

   example: silly_shout('a', 0)

   example: silly_shout('cat', 5)
            CAT!!
            CAT!!
            CAT!!
            CAT!!
            CAT!!
*/
create or replace procedure silly_shout (msg varchar2, num int) as
   counter int := 0;
begin
   if num < 0 then
      dbms_output.put_line('ERROR: Cannot display message less than 0 times...');
      return;
   end if;   

   for counter in 1 .. num
   loop
      dbms_output.put_line(UPPER(msg) || '!!');
   end loop;
end;
/
show errors
prompt =================
prompt Problem 2
prompt =================

/*
   function: title_total_cost: isbn varchar2 -> total_cost float

   purpose: Given a string, isbn varchar2, the function
            returns the total cost of all of the 
            current quantity for that title. If there
            are none available returns -1.

   example: title_total_cost('0000000000000')
	    returns -1

   example: title_total_cost('9780130094285')
            returns 118.5
*/
create or replace function title_total_cost(isbn varchar2) 
   return float as
title_cost float;
title_quant float;
total_cost float;

begin
   
   select ttl_cost
   into title_cost
   from title
   where ttl_isbn = isbn;

   select ttl_qty
   into title_quant
   from title
   where ttl_isbn = isbn;
   
   total_cost := title_cost * title_quant;
   return total_cost;

exception
   when no_data_found then
      return -1;
end;
/
show errors

prompt ========================
prompt TESTING PROBLEM 1
prompt ========================

prompt =============
prompt Expected output, 'ERROR: Cannot display message less than 0 times...'
prompt =============
exec silly_shout('nooo', -1)

prompt =============
prompt Expected output, '' no message printed.
prompt =============
exec silly_shout('a', 0)

prompt =============
prompt Expected output, 'CAT!!' on 5 different lines.
prompt =============
exec silly_shout('cat', 5)

prompt =============
prompt Running silly_shout_test.sql now...
prompt =============
start silly_shout_test.sql

prompt ========================
prompt TESTING PROBLEM 2
prompt ========================

var tt_cost number;
prompt =============
prompt Expected output, 118.5
prompt =============
exec :tt_cost := title_total_cost('9780130094285') 
print tt_cost

prompt =============
prompt Expected output, -1
prompt =============
exec :tt_cost := title_total_cost('0000000000000') 
print tt_cost

prompt =============
prompt Running title_total_cost_test.sql now...
prompt =============
start title_total_cost_test.sql


prompt =================
prompt Problem 3 part a
prompt =================

drop table salary_history;
create table salary_history(empl_num char(4), prev_salary number(6,2), 
                            next_salary number(6,2), change_date date,
                            primary key(empl_num, change_date));

prompt =================
prompt Problem 3 part b
prompt =================

/*
   trigger: log_salary_updates

   purpose: Checks to see if an employee's
            salary has changed, if so adds
            an entry to table salary_history
            with specified values.

   example: 
*/
create or replace trigger log_salary_updates
   after update
   on empl
   for each row
   when (new.salary != old.salary)
begin 
   insert into salary_history (empl_num, prev_salary, next_salary, change_date)
   values(:new.empl_num, :old.salary, :new.salary, sysdate);
end;
/
show errors

prompt ========================
prompt TESTING PROBLEM 3 part b
prompt log_salary_updates
prompt ========================

commit;

select * from empl;
select * from salary_history;

prompt Salary change.
update empl
set salary = 5250
where empl_num = 7839;

prompt Salary change.
update empl
set salary = 850
where empl_num = 7876;

prompt Name correction.
update empl
set empl_last_name = 'Raimy'
where empl_num = 7782;

prompt

select * from empl;
select * from salary_history;

rollback;

spool off
