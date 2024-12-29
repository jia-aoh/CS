  //json (Javascript object notation)
  //string一定要雙引號
  //最後一個項目不能加,
  //可以兩個obj`[{obj},{obj}]`兩筆資料
  //好的json會控制每筆key數量，value資料型態（函數orString)一致

const jsonString = `
[
  {
    "pid": "P01",
    "name": "鉛筆",
    "price": 20,
    "quantity": 3,
    "image": "https://blackwing602.com/cdn/shop/products/audition-3.jpg?v=1642789940"
  },
  {
    "pid": "P02",
    "name": "原子筆",
    "price": 80,
    "quantity": 7,
    "image": "https://www.parkershop.eu/files/zdjecia/galeria/g_2068358_3_b.jpg"
  },
  {
    "pid": "P03",
    "name": "鋼筆",
    "price": 900,
    "quantity": 5,
    "image": "https://m.media-amazon.com/images/I/515sXTO5QkL._AC_UF1000,1000_QL80_.jpg"
}
    ]
`