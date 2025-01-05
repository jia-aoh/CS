<form method="POST" enctype="multipart/form-data">
<table>
  <tr>
    <td>Upload</td>
    <td>:</td>
    <td><input type="file" name="img"></td>
  </tr>
  <tr>
    <td><input type="submit" name="upload" value="upload"></td>
  </tr>
</table>
</form>
{if $error == "1"}
  <a href="download.php?id={$thumb_path}"><b>Download Thumb</b></a>
  <img src="{$thumb_path}" alt="Thumb Image"/><br>
  <img src="{$img_path}" />
{/if}