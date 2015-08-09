
-- select 
-- o.serial as 'order_id',
-- o.date,c.`name` as 'customer_name',c.email,c.address as 'shipping_address',c.phone
-- from orders o,customers c
-- where
-- o.customerid = c.serial;


-- select
-- sum(quantity*price) as 'total'
-- from 
-- order_detail
-- where orderid = 1;


select
o.productid as 'id',o.quantity,o.price,
m.title
from order_detail o,mobile m
where
o.productid = m.id
and
o.orderid = 1;

