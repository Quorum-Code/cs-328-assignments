
create or replace procedure terminate_empl(ex_empl_last_name varchar2) as
    ex_empl_num char(4);
    quant_w_name integer;
begin
    select count(*)
    into quant_w_name
    from empl
    where empl_last_name = ex_empl_last_name;
    
    if quant_w_name = 1 then
        select empl_num
        into ex_empl_num
        from empl
        where empl_last_name = ex_empl_last_name;

        update empl
        set mgr = NULL
        where mgr = ex_empl_num;

        update customer
        set empl_rep = NULL
        where empl_rep = ex_empl_num;

        delete from empl
        where empl_num = ex_empl_num;
    end if;
end;
/
show errors

commit;

select *
from   empl
order by empl_last_name;

exec terminate_empl('King');

prompt =====
prompt NO MORE King (and no empl with mgr 7839)
prompt =====

select *
from   empl
order by empl_last_name;

exec terminate_empl('Moo');

prompt =====
prompt NO change
prompt =====

select *
from   empl
order by empl_last_name;

exec terminate_empl('Blake');

prompt =====
prompt NO more Blake (and no empl with mgr 7698)
prompt =====

select *
from   empl
order by empl_last_name;

exec terminate_empl('Martin');

prompt =====
prompt NO more Martin (and a customer without a rep, no longer 7654)
prompt =====

select *
from   empl
order by empl_last_name;

select *
from customer;

rollback;
