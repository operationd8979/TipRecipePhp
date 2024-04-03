SELECT d.dishID, d.dishName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `dishs` d 
JOIN `dishingredients` di ON d.dishID = di.dishID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `dishtypes` dt ON d.dishID = dt.dishID
JOIN `typedishs` t ON dt.typeID = t.typeID
GROUP BY d.dishID
HAVING d.dishName LIKE "%sườn%" 
and d.dishID IN 
(SELECT dishID FROM `dishingredients` WHERE ingredientID IN (14,63) GROUP BY dishID HAVING COUNT(DISTINCT ingredientID) = 2)
and d.dishID IN
(SELECT dishID FROM `dishtypes` WHERE typeID IN (1,2))


SELECT d.dishID, d.dishName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `dishs` d 
JOIN `dishingredients` di ON d.dishID = di.dishID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `dishtypes` dt ON d.dishID = dt.dishID
JOIN `typedishs` t ON dt.typeID = t.typeID
WHERE d.dishName LIKE "%sườn%"
  AND EXISTS (SELECT 1 FROM dishingredients WHERE dishID = d.dishID AND ingredientID IN (14,63))
GROUP BY d.dishID, d.dishName;
