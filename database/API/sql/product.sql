SELECT DISTINCT Product.product_id, Product.name, Sku.price, Description.french AS description
FROM Product
INNER JOIN Sku
ON Product.product_id = Sku.product_id
INNER JOIN Description
ON Product.description_id = Description.description_id
WHERE Product.product_id = 12