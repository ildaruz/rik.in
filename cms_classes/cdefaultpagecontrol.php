<?php

/**
 * CDefaultPageControl
 */
include_once(CRegistry::GetInstance()->Get('cms_classes_path') . 'cbasepagecontrol.php');

class CDefaultPageControl extends CBasePageControl
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
      return parent::GetTitle() . ':default';
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
            		<td class="body">
            			<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
		             		<TR>
			                	<TD></TD>
				              	<TD>
				              		<a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . 'service" class="body2">
				              			<div class="body2">
					              			<div class="body2text">
					              				SERVICES
					              			</div>
				              			</div>
				              		</a>
				              	</TD>
				               <TD></TD>
				               <TD></TD>
		              		</TR>
		             		 <TR>
		                		<TD>
		                			<a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . 'net" class="body5">
				              			<div class="body5">
					              			<div class="body5text">
					              				NET
					              			</div>
				              			</div>
				              		</a>
		                		</TD>
		                		<TD>
		                			<a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . 'work" class="body6">
				              			<div class="body6">
					              			<div class="body6text">
					              				WORKS
					              			</div>
				              			</div>
				              		</a>
		                		</TD>
		                		<TD>
		                			<a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . 'connect" class="body7">
				              			<div class="body7">
					              			<div class="body7text">
					              				CONTACT
					              			</div>
				              			</div>
				              		</a>
		                		</TD>
		                		<TD></TD>
		              		</TR>
		              		<TR>
		                		<TD></TD>
		                		<TD>
		                			<a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . 'about" class="body10">
				              			<div class="body10">
					              			<div class="body10text">
					              				ABOUT
					              			</div>
				              			</div>
				              		</a>
		                		</TD>
		                		<TD></TD>
		                		<TD></TD>
		              		</TR>
		              		<TR>
		                		<TD></TD>
		                		<TD></TD>
		                		<TD></TD>
		                		<TD></TD>
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
	public function View($in_sSubRoute)
	{
		$this->m_sBody = $this->CreatePageBody();
      parent::View($in_sSubRoute);
	}
};

?>