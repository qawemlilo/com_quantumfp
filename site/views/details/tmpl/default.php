<?php
defined('_JEXEC') or die('Restricted access');
   
$document = &JFactory::getDocument();      
$document->addStyleSheet('components/com_quantumfp/files/style.css');
$details = $this->q_users[0];

require("components/com_quantumfp/files/inc/header.html.php");
?>

  <div id="add_user"> 
  <form action="index.php?option=com_quantumfp&view=details&task=update" method="post">
   <fieldset style="-moz-border-radius: 4px;"> 
   <legend>My Details</legend>
    <input type="hidden" name="import" value="1" />
    <table cellpadding="4px">
      <tr>
        <td>Title:
          <span style="color:red">*</span></td>
            <td>
            <select name="title" style="height:20px; line-height: 5px">
                <option value="">Select Title</option>
                <option value="mr" <?php if($details['title'] == "mr") echo 'selected="selected"'?>>Mr</option>
                <option value="mrs" <?php if($details['title'] == "mrs") echo 'selected="selected"'?>>Mrs</option>
                <option value="miss" <?php if($details['title'] == "miss") echo 'selected="selected"'?>>Miss</option>
                <option value="dr" <?php if($details['title'] == "dr") echo 'selected="selected"'?>>Dr</option>
            </select>
            </td>
      </tr>
	  
      <tr>
        <td>Full Name:
          <span style="color:red">*</span><br /><br /> </td>
        <td>
            <input type="text" name="fullname" value="<?php echo $details['name']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
                   e.g. John Smith
                 </div>
        </td>
      </tr>
	  
      <tr>
        <td>Username:
          <span style="color:red">*</span><br /><br /> </td>
        <td>
           <input type="text" name="username" value="<?php echo $details['username']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
                   e.g. john_smith
                 </div>
        </td>
      </tr>
      <tr>
        <td>Email: <span style="color:red">*</span><br /><br /> 
        </td>
        <td><input type="text" name="email" value="<?php echo $details['email'] ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
            <div style="margin: 0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;">
               e.g. john_smith@gmail.com
             </div>
        </td>
      </tr>

      <tr>
            <td>Cell: <span style="color:red">*</span><br /><br /> 
            </td>
            <td><input type="text" name="cell" value="0<?php echo $details['cell'] ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;" > 
                e.g. 0741437468
                </div>
            </td>
      </tr>

      <tr>
            <td>Tel: <br /><br />
            </td>
            <td><input type="text" name="tel" value="0<?php echo $details['tel']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
                e.g. 0317838000
                </div>
            </td>
      </tr>
      
      <tr>
      <td>Fax:
          <br /><br /> </td>
            <td><input type="text" name="fax" value="0<?php echo $details['fax']; ?>" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;" >
                    e.g. 0317838080
                </div>
            </td>
      </tr> 
	  
      <tr>
      <td>Password: 
          <br /><br /> </td>
            <td><input type="password" name="password_clear" value="" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;" >
                </div>
            </td>
      </tr> 
	  
      <tr>
        <td></td>
        <td><input type="checkbox" name="subscribe" checked="checked" value="subscribe" /> Subscribe for correspondence </td>
      </tr>

      <tr>
        <td></td>
        <td><input type="submit" name="submit" style="padding:4px; font-size:15px" value="Update Info" /></td>
      </tr>
    </table>
    </fieldset>
  </form>
  </div>
<?php
require("components/com_quantumfp/files/inc/footer.html.php");
?>