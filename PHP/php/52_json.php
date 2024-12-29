<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  function search() {
    $.get('73_json.php?orderId=' + $('#orderId').val(),
      (data, status) => {
        //如果有資料
        if (status == 'success') {
          console.log(data);

          if (data.error == 0) {
            $('#cid').html(data.cid);
            $('#eid').html(data.eid);

            $('#table').empty();
            $(data.detail).each(function(i, row) {
              $('#table').append(
                '<tr>' +
                '<td>' + row.pname + '</td>' +
                '<td>' + row.price + '</td>' +
                '<td>' + row.qty + '</td>' +
                '</tr>'
              );
            });
          }
        }
      });
  }
</script>

Brad company - 前後端分離
<hr>
Order ID: <input id="orderId"">
<button onclick="search()" value="Search">Search</button>
<hr>
<table id="table" width="100%" border="1"></table>