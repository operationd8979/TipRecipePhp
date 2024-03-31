SELECT d.diskID, d.diskName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `disks` d 
JOIN `diskingredients` di ON d.diskID = di.diskID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `disktypes` dt ON d.diskID = dt.diskID
JOIN `typedisks` t ON dt.typeID = t.typeID
GROUP BY d.diskID
HAVING d.diskName LIKE "%sườn%" 
and d.diskID IN 
(SELECT diskID FROM `diskingredients` WHERE ingredientID IN (14,63) GROUP BY diskID HAVING COUNT(DISTINCT ingredientID) = 2)
and d.diskID IN
(SELECT diskID FROM `disktypes` WHERE typeID IN (1,2))


SELECT d.diskID, d.diskName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `disks` d 
JOIN `diskingredients` di ON d.diskID = di.diskID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `disktypes` dt ON d.diskID = dt.diskID
JOIN `typedisks` t ON dt.typeID = t.typeID
WHERE d.diskName LIKE "%sườn%"
  AND EXISTS (SELECT 1 FROM diskingredients WHERE diskID = d.diskID AND ingredientID IN (14,63))
GROUP BY d.diskID, d.diskName;
