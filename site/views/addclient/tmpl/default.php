<?php
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_quantumfp/files/style.css'); 

require("components/com_quantumfp/files/inc/header.html.php");
?>
    <div id="add_user"> 
      <form action="index.php?option=com_quantumfp&view=addclient" method="post" enctype="multipart/form-data">
        <fieldset style="-moz-border-radius: 4px;"> 
          <legend>Add User</legend>
          <input type="hidden" name="import" value="1" />
          <table cellpadding="4px">
            <tr>
 			 <td>Title: <span style="color:red">*</span></td>
             <td>
			   <select name="title" style="height:20px; line-height: 5px">
			     <option value="">Select Title</option>
				 <option value="mr">Mr</option>
				 <option value="mrs">Mrs</option>
				 <option value="miss">Miss</option>
				 <option value="dr">Dr</option>
			   </select>
             </td>
		   </tr>
		   
		   <tr>
		     <td>Full Name: <span style="color:red">*</span><br /><br /> </td>
			 <td>
			   <input type="text" name="fullname" value="" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
			   <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
                   e.g. John Smith
               </div>
             </td>
		   </tr>

		   <tr>
		     <td>Username: <span style="color:red">*</span><br /><br />  </td>
			 <td>
			   <input type="text" name="username" value="" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
			   <div style="margin: 0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
			     e.g. john_smith
			   </div>
			 </td>
		   </tr>
		   
		   <tr>
		     <td>Email: <span style="color:red">*</span><br /><br /></td>
			 <td>
			   <input type="text" name="email" value="" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
			   <div style="margin: 0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;">
			     e.g. john_smith@gmail.com
			   </div>
			 </td>
		   </tr>
		   
		   <tr>

            <td>Cell: <span style="color:red">*</span><br /><br /> 
            </td>
            <td><input type="text" name="cell" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8;padding:2px; font-size: 10px;" > 
                e.g. 0741437468
                </div>
            </td>
      </tr>
	  
      <tr>
            <td>Tel: <br /><br />
            </td>    
            <td><input type="text" name="tel" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;">
                e.g. 0317838000
                </div>
            </td>
      </tr>

      <tr>
      <td>Fax:
          <br /><br /> </td>
           <td><input type="text" name="fax" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
                <div style="margin:0px; width: 255px; color: #A8A8A8; padding:2px; font-size: 10px;" >
                    e.g. 0317838080
                </div>
            </td>
      </tr>

      <tr>
        <td>Password: <span style="color:red">*</span><br /><br />Strength:
        </td>
        <td><input type="password" name="password" id="password" value="" style="width: 250px; padding:4px; -moz-border-radius: 4px;" />
           <div style="margin: 2px 0px 0px 0px; width: 255px; color: #ffffff; padding:2px 2px 2px 6px; font-size: 10px;" id="passwordspan"> &nbsp; </div>
        </td>
      </tr>
	  
      <tr>
        <td></td>
        <td><input type="checkbox" name="subscribe" value="subscribe" /> Subscribe for correspondence </td>
      </tr>

      <tr>
        <td></td>
        <td><input type="submit" name="submit" style="padding:4px; font-size:15px" value="Add Client" /></td>
      </tr>
     </table>
    </fieldset>
  </form>
  </div>
<?php
require("components/com_quantumfp/files/inc/footer.html.php");
?>