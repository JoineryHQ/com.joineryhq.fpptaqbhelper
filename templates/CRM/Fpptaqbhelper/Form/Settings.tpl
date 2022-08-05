{* HEADER *}
{* Display top submit button only if there are more than three elements on the page *}
{if ($elementNames|@count) gt 3}
  <div class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="top"}
  </div>
{/if}

{* FIELDS (AUTOMATIC LAYOUT) *}

{foreach from=$elementNames item=elementName}
  <div class="crm-section">
    <div class="label">{$form.$elementName.label}</div>
    <div class="content">{$form.$elementName.html}<div class="description">{$descriptions.$elementName}</div></div>
    {* Add authorization details after the expiryDate information *}
    {if $elementName == 'fpptaqb_quickbooks_shared_secret'}
        {if $showClientKeysMessage}
            <p class="content help">The Client ID and Client Secret are part of the QuickBooks Online App configuration.
                To find the values for these, please <a
                        href="https://developer.intuit.com/app/developer/qbo/docs/develop/authentication-and-authorization/oauth-2.0#obtain-oauth2-credentials-for-your-app"
                        target="_blank">follow the instructions on the Intuit site</a>.</p>
        {/if}
        {if $redirect_url}
            <p class="content messages status no-popup crm-not-you-message">
                <strong>
                    {if $isRefreshTokenExpired}
                        Reauthorize your App:
                        <br>
                    {else}
                        Authorize your App:
                        <br>
                    {/if}
                </strong>
                {if $isRefreshTokenExpired}
                    Refresh token is expired, you will need to
                    <a class="redirect_url" href="{$redirect_url}" title="Authorize Quickbooks Application">Reauthorize</a>
                    the QuickBooks application.
                    <br>
                    All contacts and contributions updates won't get synced with QuickBooks.
                {else}
                    Once a Consumer Key and Shared Secret have been configured, you will need to
                    <a class="redirect_url" href="{$redirect_url}" title="Authorize Quickbooks Application">Authorize</a>
                    the QuickBooks application.
                    <br>
                    <br>
                    You must add this Redirect URI to your application:
                    <br>
                    {$redirect_url}
                {/if}
            </p>
        {/if}
    {/if}
    <div class="clear"></div>
  </div>
{/foreach}

{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>