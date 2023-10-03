-- Lab2.sql
-- Evan Putnam, Nathan Peralta, Sean Ross
-- Last Modified 1/26/23

/*
	procedure total_salary : varchar2 -> void

	purpose: Expects a job title and prints the total sum salary of 
	employees with that job title.

	example: total_salary('President') prints 5000
	example: total_salary('Sales') print 5600
*/
create or replace procedure total_salary (jt varchar2) as
totalSalary integer;

begin
	select sum(salary)
	into totalSalary
	from empl
	where job_title = jt;

	dbms_output.put_line(totalSalary);
end;
/
show errors



/*
	function: num_pd_more : number -> number
	
 	purpose: expects a lower limit on salary and returns the
	number of employees that exceed that limit.

	example: exec num_pd_more(1000) should return 12
	example: exec num_pd_more(2000) should return 6
*/
create or replace function num_pd_more (low_salary number) return number as
	num_empl number;

begin
	select COUNT(*)
	into num_empl
	from empl
	where salary > low_salary;

	return num_empl;
end;
/
show errors



/*
	trigger: log_dept_updates

	purpose: after dept table is updated records sysdate and
	old and new dept_name into dept_changes table

	example: if 'Sales' is updated to 'Consulting', dept_changes inserts a
	new row with the sysdate, 'Sales', and 'Consulting'

	example: if 'Accounting' is updated to 'HR', dept_changes inserts a
	new row with the sysdate, 'Accounting', and 'HR'
*/
create or replace trigger log_dept_updates 
	after update 
	on dept 
	for each row

begin
	
	insert into dept_changes values 
		(sysdate, :old.dept_name, :new.dept_name);
end;
/
show errors



set serveroutput on
spool lab2-out.txt

prompt Evan Putnam, Nathan Peralta, Sean Ross

drop table dept_changes;
create table dept_changes 
	(date_changed date, old_dept varchar2(15), new_dept varchar2(15));

-- Testing procedure with 'President' and 'Sales'
prompt All presidents total salary expected: 5000
exec total_salary('President');
prompt All sales total salary expected: 5600
exec total_salary('Sales');

-- Testing function total_salary
prompt Employees with salary greater than 1000 expected: 12
var num_empls number;
exec :num_empls := num_pd_more(1000)
print num_empls
prompt Employees with salary greater than 2000 expected: 6
exec :num_empls := num_pd_more(2000)
print num_empls

-- Testing trigger log_dept_updates
prompt Testing trigger

commit;

prompt Updating dept_name 'Sales' to 'Consulting'
update dept 
set dept_name = 'Consulting'
where dept_name = 'Sales';

prompt Updating dept_name 'Accounting' to 'HR'
update dept 
set dept_name = 'HR'
where dept_name = 'Accounting';

select * from dept;
select * from dept_changes;

rollback;

spool off
