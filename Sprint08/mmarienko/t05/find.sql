USE ucode_web;

SELECT name FROM (
      SELECT * FROM (
            SELECT * FROM (
                  SELECT * FROM heroes
                  WHERE id = ( SELECT MIN(id) FROM heroes )
               )
            WHERE class_role = 'tankman' or class_role = 'healer'
         )
      WHERE name LIKE '%a%'
   )
WHERE race != "human";