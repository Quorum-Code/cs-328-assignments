
/*=====
  testing script for function bool_to_string

  by: Sharon Tuttle
  last modified: 2023-03-15
=====*/

prompt
prompt ************************
prompt TESTING bool_to_string
prompt ************************
prompt

set serveroutput on

prompt ===================
prompt test passes if bool_to_string(true) returns TRUE 
prompt (which IS how the varchar2 value 'TRUE' is displayed here):
prompt ===================

var result_string varchar2(5);
exec :result_string := bool_to_string(true)
print result_string

prompt ===================
prompt test passes if bool_to_string(false) returns FALSE 
prompt (which IS how the varchar2 value 'FALSE' is displayed here):
prompt ===================

exec :result_string := bool_to_string(false)
print result_string

-- end of bool_to_string_test.sql


