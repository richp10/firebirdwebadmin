<?php
// File           panels/usr_cust.php / FirebirdWebAdmin
// Purpose        html for the customizing-panel in user.php
// Author         Lutz Brueckner <irie@gmx.de>
// Copyright      (c) 2000, 2001, 2002, 2003, 2004, 2005 by Lutz Brueckner,
//                published under the terms of the GNU General Public Licence v.2,
//                see file LICENCE for details
// Created        <03/09/28 18:14:41 lb>
//
// $Id: usr_cust.php,v 1.8 2005/09/25 17:01:07 lbrueckner Exp $

if (empty($_COOKIE)):

    echo '<div style="padding: 20px 0px 20px 15px">'.$MESSAGES['COOKIES_NEEDED']."</div>\n";

else:

?>
<form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="usr_role_form">
<table border="0" cellpadding="3" cellspacing="0">
  <tr>
    </td>
    <td>&nbsp;</td>
    <td valign="top">
      <table border cellpadding="3" cellspacing="0">
        <tr>
          <th colspan="2" align="left"><?php echo $usr_strings['Appearance']; ?></th>
        </tr>
        <tr>
          <td><?php echo $usr_strings['Language']; ?></td>
          <td align="right"><?php echo get_selectlist('usr_cust_language', get_customize_languages(), $s_cust['language']); ?></td>
        </tr>
      </table>
      <table border cellpadding="3" cellspacing="0">
        <tr>
          <th colspan="2" align="left"><?php echo $usr_strings['Attitude']; ?></th>
        </tr>
        <tr>
          <td><?php echo $usr_strings['AskDel']; ?></td>
          <td align="right"><?php echo get_selectlist('usr_cust_askdel', array($usr_strings['Yes'], $usr_strings['No']), ($s_cust['askdel'] == 1 ? $usr_strings['Yes'] : $usr_strings['No'])); ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td>
      <input type="submit" name="usr_cust_save" value="<?php echo $button_strings['Save']; ?>">&nbsp;&nbsp;&nbsp;
    </td>
    <td width="350">&nbsp;</td>
    <td>
      <input type="submit" name="usr_cust_defaults" value="<?php echo $button_strings['Defaults']; ?>">
    </td>
  </tr>
</table>
</form>
<?php

endif;

?>
