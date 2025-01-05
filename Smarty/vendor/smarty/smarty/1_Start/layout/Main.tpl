<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{block name=title}Title{/block}</title>

  {* import css *}
  {block name=head}{/block}

</head>
<body>

{* navbar *}
{include file="nav.tpl"}

{block name=body}{/block}

{* footer *}
{include file="footer.tpl"}
    
</body>
</html>