/* case後條件 */
-- 1_ 子查詢where
select * from(
    select tel, sum(fee) as sum_fee, 
        case 
            when sum(fee) >= 1500 then 500
            when sum(fee) >= 1000 then 300
            else 0
        end as coupon
    from Bill
    group by tel
)as tmp
where coupon > 0; -- 因先後順序coupon不能在tmp裡面，所以子查詢

-- 2_ having
select tel, sum(fee) as sum_fee, 
    case 
        when sum(fee) >= 1500 then 500
        when sum(fee) >= 1000 then 300
        else 0
    end as coupon
from Bill
group by tel
having coupon > 0