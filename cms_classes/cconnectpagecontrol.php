<?php

/**
 * CConnectPageControl
 */
include_once(CRegistry::GetInstance()->Get('cms_classes_path') . 'cbasepagecontrol.php');

class CConnectPageControl extends CBasePageControl
{
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

   public function GetTitle()
   {
      return parent::GetTitle() . ':connect';
   }
   
	/**
	 *
	 */
	public function CreatePageBody()
	{
		$l_sHtml = 
'		<tr>
        	<td>
        		<table width="597" border="0" cellspacing="0" cellpadding="0">
          		<tr valign="top">
            		<td class="left">

            		
            		
            		</td>
            		<td class="body_page">
            			<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
              				<TR>
                				<TD COLSPAN="4" class="page_header_1"></TD>
                				<TD COLSPAN=2 class="page_header_2">
                					<a href="./" class="page_header_2">
                						<div class="page_header_2">
				              				<div class="page_header_2_text">
				              					BACK
				              				</div>
				              			</div>
				              		</a>
                				</TD>
                				<TD class="page_header_3"></TD>
              				</TR>
              				<TR>
                				<TD COLSPAN="7" class="page_body_1">
                				
                				
                				
							  		</TD>
              				</TR>
			              	<TR>
			                	<TD colspan="7" class="page_body_2"></TD>
			            	</TR>
			              	<TR>
                				<TD COLSPAN="7" class="page_body_3"></TD>
              				</TR>
            			</TABLE>
            		</td>
          		</tr>
        		</table>
        	</td>
		</tr>
';

		return $l_sHtml;
	}

	/**
	 *
	 */
	public function View()
	{
		$this->m_sBody = $this->CreatePageBody();
      parent::View($in_sSubRoute);
	}
};

?>