<?php
// File           db_systable.php / FirebirdWebAdmin
// Purpose        display the content of the interbase system tables
// Author         Lutz Brueckner <irie@gmx.de>
// Copyright      (c) 2000-2006 by Lutz Brueckner,
//                published under the terms of the GNU General Public Licence v.2,
//                see file LICENCE for details
// Created        <01/09/28 22:06:09 lb>
//
// $Id: db_systable.php,v 1.18 2006/03/20 07:48:42 lbrueckner Exp $


// Variables      $s_system_table: name of the selected system table

if ($s_connected === TRUE) {

?>
<form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="db_systable_form">
<table cellpadding="3" cellspacing="0" border="0">
<tr>
  <td><b><?php echo $db_strings['SysTables']; ?></b><br>
     <?php echo get_selectlist('db_systable',
                               get_system_tables(SERVER_FAMILY, SERVER_VERSION),
                               $s_systable['table'], TRUE,
                               array('onChange' => "getFilterFields(selectedElement(this))",
                                     'id' => 'db_systable_list'));
     ?>
  </td>
  <td align="center">
    <b><?php echo $db_strings['SysData']; ?></b><br>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="db_sysdata" <?php if ($s_systable['sysdata'] == TRUE) echo 'checked'; ?>> 
  </td>
  <td>&nbsp;&nbsp;</td>
  <td>
    <div id="systable_field">
<?php

    if (!empty($s_systable['table'])) {

        echo systable_field_select($s_systable['table'], $s_systable['ffield']);

    } else {
?>
      <b><?php echo $db_strings['FField']; ?></b><br>
      <input type="text" size="16" maxlength="128" name="db_sysfield" value="<?php echo $s_systable['ffield']; ?>">
<?php

    }
?>
    </div>
  </td>
  <td>
    <div id="systable_value">
<?php

    if (!empty($s_systable['ffield'])) {

        echo systable_value_select($s_systable['table'], $s_systable['ffield'], $s_systable['fvalue']);

    } else {
?>
      <b><?php echo $db_strings['FValue']; ?></b><br>
      <input type="text" size="16" maxlength="128" name="db_sysvalue" value="<?php echo $s_systable['fvalue']; ?>">
<?php

    }
?>
    </div>
  </td>
  <td>&nbsp;</td>
  <td valign="bottom">
    <input type="submit" name="db_systable_select" value="<?php echo $button_strings['Select']; ?>">
  </td>
</tr>
<?php

    // ***** DISABLED *****
    if (FALSE  &&  $have_refresh == TRUE) {
?>
<tr>
  <td colspan="7">
    <table>
      <tr>
        <td align="center">
          <b><?php echo $db_strings['Refresh']; ?></b><br>
          <input type="text" size="3" maxlength="3" name="db_refresh" value="<?php echo $s_systable['refresh']; ?>">
          <?php echo $db_strings['Seconds']; ?>
        </td>
        <td>&nbsp;&nbsp;</td>
        <td>
          <input type="button" name="db_refresh_select" value="<?php echo $button_strings['Set']; ?>" onClick="refresh_systable(this.form.db_refresh.value)">
        </td>
      </tr>
    </table>
  </td>
</tr>
<?php

    }
?>
</table>
</form>
<div id="st">
<?php

    if (isset($systable)) {
        echo get_systable_html($systable, $s_systable)
           . js_javascript("new markableIbwaTable('systable')");
    }
}
?>
</div>
