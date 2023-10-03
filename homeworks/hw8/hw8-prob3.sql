create or replace function num_sightings_by_loc_id(location_id number)
return number IS
   num_sightings number := 0;
begin
   SELECT COUNT(*) INTO num_sightings
   FROM sighting
   WHERE sighting.loc_id = location_id;
   
   return num_sightings;

exception
   when others then
      num_sightings := 0;
      return num_sightings;
end;
/
show errors;
