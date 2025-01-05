{extends file='layout/Main.tpl'}

{block name=title}Home{/block}
  
{block name=head}
  <link rel="stylesheet" href="css/index.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{/block}
  
{block name=body}
    {* section name, loop, start, step, max, show, last-------- *}
    {* $smarty.section.name.index, total-1, first, last, rownum, iteration *}
  {section name=series loop=$data}
    {$data[series].series} <br>

    {section name=img loop=$data[series].img}
      {$data[series].img[img].img} <br>
    {/section}

  {/section}

  {* section + database + query + if----------------- *}
  {section name=query1 loop=$result step=1}
    id : {$result[query1].id}, 
    rownum : {$smarty.section.query1.rownum},
    iteration : {$smarty.section.query1.iteration},
    index : {$smarty.section.query1.index}
    of {$smarty.section.query1.total}
    {if !$smarty.section.query1.last},{/if}<br>
  {/section}

  {* form to DB ------------------------------------ *}
  {if $state eq '註冊成功'}
    {$state} <br>
    <meta http-equiv="refresh" content="3">
  {else}
    <form method="POST" action="">
    <table>
      <tr>
        <td>name</td>
        <td>:</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>email</td>
        <td>:</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td>password</td>
        <td>:</td>
        <td><input type="text" name="password"></td>
      </tr>
      <tr>
        <td>birth</td>
        <td>:</td>
        <td><input type="date" name="birth"></td>
      </tr>
      <tr>
        <td>county</td>
        <td>:</td>
        <td>
        <select name="county_id">
          {section name=county loop=$county}
            <option value="{$county[county].id}">{$county[county].county}</option>
          {/section}
        </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" name="state" value="save"></td>
        {if $state}
          <td>!!!</td>
          <td>{$state}</td>
        {/if}
      </tr>
    </table>
    </form>
  {/if}

  <hr>

  {* form to another form ------------------------------------ *}
  <form action="">
  <table border=1>
    <tr>
      <td>series_id</td>
      <td>name</td>
      <td>stock</td>
      <td>edit</td>
    </tr>
    {section name=series loop=$series}
    <tr>
      <td>{$series[series].id}</td>
      <td>{$series[series].name}</td>
      <td>{$series[series].stock}</td>
      <td><a href=edit.php?series_id={$series[series].id}>edit</a></td>
    </tr>
    {/section}
  </table>
  </form>

  <script src="js/index.js"></script>
  
{/block}