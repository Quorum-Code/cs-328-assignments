-- 328hw5.sql
-- Evan Putnam
-- Last Modified: 3/24/2023

set serveroutput on;
spool 328hw5-out.txt;

prompt ===========
prompt Evan Putnam
prompt ===========

/*
   bool_to_string: boolean -> varchar2
   Given a boolean returns a corresponding string
*/

create or replace function bool_to_string(b boolean)
   return varchar2 as
begin

if b=true then
   return 'TRUE';
else
   return 'FALSE';
end if;

end;
/


prompt ===========
prompt 4 part b
prompt ===========

commit;

INSERT INTO order_stock (ord_num, pub_id, ord_date_placed)
VALUES (11015, 150, sysdate);

INSERT INTO order_line_item (ord_num, ord_line_num, ttl_isbn, ord_line_qty)
VALUES (11015, 1, 9780201144710, 32);
INSERT INTO order_line_item (ord_num, ord_line_num, ttl_isbn, ord_line_qty)
VALUES (11015, 2, 9780805343021, 16);

prompt Additional rows added to ORDER_STOCK and ORDER_LINE_ITEM...


prompt ===========
prompt 4 part c
prompt ===========

/*
   is_on_order: num -> bool
   Given an ISBN returns true if title is being ordered.
*/
create or replace function is_on_order(isbn order_needed.ttl_isbn%type)
   return boolean as

   ord_id order_needed.ord_needed_id%type;
begin

   SELECT ord_needed_id
   INTO ord_id
   FROM order_needed
   WHERE isbn = ttl_isbn;

   if ord_id is not null then
      return true;
   else
      return false;
   end if;
exception
   when NO_DATA_FOUND then
      return false;
   when OTHERS then
      return false;

end;
/
show errors

prompt =====================
prompt Testing is_on_order: (expecting TRUE)
prompt =====================

var on_order_status varchar2(5);
exec :on_order_status := bool_to_string(is_on_order('9780805343021'));
print on_order_status;

prompt =====================
prompt Testing is_on_order: (expecting FALSE)
prompt =====================

var on_order_status varchar2(5);
exec :on_order_status := bool_to_string(is_on_order('0123456789012'));
print on_order_status;


rollback;


spool off;
