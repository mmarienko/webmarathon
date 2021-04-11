USE ucode_web;
SELECT heroes.name, teams.name FROM heroes
   LEFT JOIN teams ON teams.hero_id = heroes.id;
SELECT heroes.name, powers.name FROM powers
   LEFT JOIN heroes ON powers.hero_id = heroes.id;
SELECT heroes.name, powers.name, teams.name FROM heroes
   JOIN powers ON powers.hero_id = heroes.id
   JOIN teams ON teams.hero_id = heroes.id;