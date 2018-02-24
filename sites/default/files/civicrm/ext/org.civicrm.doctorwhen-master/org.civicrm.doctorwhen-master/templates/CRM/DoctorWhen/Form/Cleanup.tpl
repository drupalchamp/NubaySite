{* HEADER *}

<div class="help">
  {ts}Doctor When is an <b>EXPERIMENTAL</b> tool for cleaning up datetime/timestamp data.{/ts}
  {ts}Please take precautions:{/ts}
  <ul>
    <li>{ts}Before executing in production, execute on a staging system with representative data. Inspect the data.{/ts}</li>
    <li>{ts}Before executing in production, take a new backup.{/ts}</li>
  </ul>
</div>

{* FIELD EXAMPLE: OPTION 1 (AUTOMATIC LAYOUT) *}

<div class="crm-block">
  <div class="crm-group">
    {foreach from=$elementNames item=elementName}
      <div class="crm-section">
        <div class="label">{$form.$elementName.label}</div>
        <div class="content">{$form.$elementName.html}</div>
        <div class="clear"></div>
      </div>
    {/foreach}
  </div>
</div>

{* FIELD EXAMPLE: OPTION 2 (MANUAL LAYOUT)

  <div>
    <span>{$form.tasks.label}</span>
    <span>{$form.tasks.html}</span>
  </div>

{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
