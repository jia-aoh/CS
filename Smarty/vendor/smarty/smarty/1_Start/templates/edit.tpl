<form method="post" action="">
{section name=series loop=$series}
  <table>
    <tr>
      <td>series_id</td>
      <td>:</td>
      <td>{$series[series].id}</td>
      <input name="id" type="number" value="{$series[series].id}" hidden>
    </tr>
    <tr>
      <td>name</td>
      <td>:</td>
      <td>{$series[series].name}</td>
      <input name="name" type="text" value="{$series[series].name}" hidden>
    </tr>
    <tr>
      <td>stock</td>
      <td>:</td>
      <td><input name="stock" type="number" value="{$series[series].stock}"></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="submit" value="save">
      </td>

    </tr>
  </table>
{/section}
</form>