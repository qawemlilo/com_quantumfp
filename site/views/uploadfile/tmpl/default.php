<?php
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_quantumfp/files/style.css');
require("components/com_quantumfp/files/inc/header.html.php");
?>

	

<div id="file_upload"> 

  <form enctype="multipart/form-data" method="post" action="index.php?option=com_quantumfp&view=uploadfile">

   <fieldset style="-moz-border-radius: 4px 4px 4px 4px;"> 

   <legend>Upload Document</legend>

    <input type="hidden" value="1" name="import">



    <table cellpadding="4px">

      <tbody><tr>



        <td>Select Client



          : <span style="color: red;">*</span></td>

            <td>

            <select style="height: 20px; width: 150px; line-height: 5px;" name="client">

                <option value="">Select Client</option>

                <?php

                if(count($this->users)) {

                   foreach($this->users as $user) {

                       echo '<option value="' . $user['id'] . '">' . $user['name'] . '</option>';

                   }

                }

                ?>

            </select>

            </td>



      </tr>

      <tr>



        <td>File Name



          : <span style="color: red;">*</span></td>



        <td><input type="file" size="40" name="file_upload"></td>



      </tr>

      <tr>



        <td> File Type



          : <span style="color: red;">*</span> </td>



        <td>

            <select style="height: 20px; width: 150px; line-height: 5px;" name="filetype">

                <option value="">Select File Type</option>

                <option value="tracker">Investment Tracker</option>

                <option value="corresp">Correspondence</option>

                <option value="doc">Document</option>

            </select>

        </td>



      </tr>

      <tr>



        <td></td>



        <td><input type="submit" value="Upload File" style="padding: 4px; font-size: 14px;" name="submit"></td>



      </tr>



    </tbody></table>

    </fieldset>

  </form>

</div>
<?php
require("components/com_quantumfp/files/inc/footer.html.php");
?>