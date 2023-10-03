/*===
	hello.sql
	by: Evan Putnam
	last modified: 2023-01-19
===*/


/*===
	procedure: hello_world: void -> void
	purpose: expects nothing, returns nothing,
	   has the side-effet (IF set serveroutput is on!)
	   of printing a cheery greeting including 
	   the current date to the screen

	example: 
	   if it is currently January 19, 2023,
	   and I type the following at the SQL> prompt: 
	      exec hello_word()
		or
	      exec hello_world

	   then, if serveroutput is on, I should see printed 
	   to the screen:
	      Hello, world! on 19-JAN-23
===*/

create or replace procedure hello_world as 

	/* oddly, you do NOT put the word declare before a
	   procedure local variable (?!)	
	*/

curr_date date;

begin
	SELECT sysdate
	INTO curr_date
	FROM dual;

	dbms_output.put_line('Hello, world! on ' || curr_date);
end;
/
show errors

/* ENABLES OUTPUT */
set serveroutput on
exec hello_world
