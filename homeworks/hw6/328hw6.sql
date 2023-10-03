-- Evan Putnam
-- CS 328 - Homework 6 - Problem 2
-- 3/31/2023

spool 328hw6-out.txt;

set serveroutput on;
commit;

prompt ===============
prompt Evan Putnam
prompt ===============

prompt ===============
prompt Problem 2 part a
prompt ===============

create or replace function pending_order_needed(isbn_order number)
   return boolean as
   
   ord_num order_needed.ord_num%type;
begin
   SELECT ord_num
   INTO ord_num
   FROM order_needed
   WHERE ttl_isbn = isbn_order AND ord_num IS NULL;   

   return true;
exception
   when no_data_found then
      return false;
end;
/
show errors

prompt ===============
prompt Problem 2 part b
prompt ===============

create or replace function insert_order_needed(isbn_order number, order_qty number)
   return varchar2 as

   on_order boolean;
   order_pending boolean;
begin
   
   on_order := is_on_order(isbn_order);
   order_pending := pending_order_needed(isbn_order);

   if order_pending then
      return 'already on order';
   elsif on_order then
      return 'already known needed';
   else
      return 'success';
   end if;

exception
   when OTHERS then
      return 'insertion failed';
end;
/
show errors

start pending_order_needed_test.sql;


rollback;
spool off;
