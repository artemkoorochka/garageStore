<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# garageStore

## Use for develop
- php 8.1
- mysql 8.0.28
- Composer version 2.2.9
- git clone ... to your-directory
```
git clone https://github.com/artemkoorochka/garageStore.git garageStore
```
- cd your-directory
- composer install
- In .env set mysql connection data
- Set APP_KEY and APP_DEBUG to false
- Migrate data base
```
php artisan migrate --seed
```
- Run Serve project
```
php artisan serve
```
# Samples to get data from DB
### For a given list of products, get the names of all categories in which products are presented;
```mysql
SELECT 
products.id as ProductID,
products.name as ProductName,
categories.title as CategoryTitle
FROM garagestore.products
JOIN category_product ON products.id = category_product.product_id
JOIN categories ON categories.id = category_product.category_id
```

For a given category, get a list of offers for all products from this category and its child categories;
```mysql
SELECT 
categories.id as category_id,
categories.parent_id,
products.name as productName
FROM categories
JOIN category_product ON categories.id = category_product.category_id
JOIN products ON products.id = category_product.product_id
WHERE categories.id = 1 OR categories.parent_id = 1
```

For a given list of categories, get the number of product offers in each category;
```mysql
SELECT 
categories.id as category_id,
COUNT(*) as products_count
FROM categories
JOIN category_product ON categories.id = category_product.category_id
JOIN products ON products.id = category_product.product_id
WHERE categories.id IN(1, 4, 5)
GROUP BY category_id
```
For a given list of categories, get the total number of unique product offers;
```mysql
SELECT 
categories.id as category_id,
products.id as products_id,
COUNT(*) as products_count
FROM categories
JOIN category_product ON categories.id = category_product.category_id
JOIN products ON products.id = category_product.product_id
WHERE categories.id IN(1, 2, 3)
GROUP BY category_id
```
For a given category, get its full path in the tree (breadcrumb).
```mysql
SELECT
	c1.title as level1, 
    c2.title as level2,
    c3.title as level3,
    c4.title as level4
FROM categories as c1
LEFT JOIN categories as c2 ON c2.id = c1.parent_id
LEFT JOIN categories as c3 ON c3.id = c2.parent_id
LEFT JOIN categories as c4 ON c4.id = c3.parent_id
WHERE c1.id = 5;
```
