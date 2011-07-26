<?php

defined('_JEXEC') or die('Restricted Access');

?>

<div style="min-height:525px;">

    <div class="q_logo"><span class="span">QuantumFP Client File Management System</span>  		

		

        <div class="h-div">

		    <a class="lbox" href="index.php?option=com_quantumfp&view=details">

			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/users_details.png" title="Edit your details" alt="My Details">

				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Details</span>

			</a>

        </div> 
     <?php if(!$this->allowed) {?>   
        <div class="h-div">

		    <a class="lbox" href="index.php?option=com_quantumfp&view=clientpage">

			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/user_files.png" title="View your files" alt="My Files">

				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Client Files</span>

			</a>

        </div>

		<?php } if($this->allowed) {?>

        <div class="h-div">

		    <a class="lbox" href="index.php?option=com_content&view=form&layout=edit">

			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/article_add.png" title="Create new article" alt="Article Manager">

				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Article</span>

			</a>

        </div>

		

        <div class="h-div">

		    <a class="lbox" href="index.php?option=com_quantumfp&view=uploadfile">

			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/file_upload.png" title="Upload client files" alt="Upload File">

				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Upload File</span>

			</a>

        </div> 

		

        <div class="h-div">

		    <a class="lbox" href="index.php?option=com_quantumfp&view=addclient">

			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/users_add.png" title="Create client account" alt="Add Client">

				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Client</span>

			</a>

        </div> 

		<?php } ?>

    </div>

	

    <div style="clear:left;">&nbsp;</div>

	

    <span class="span" style="fon-size:16px;">Hi <?php echo $this->current_user; ?>, welcome.</span>

	<p></p>



    <div style="clear:left;">&nbsp;</div>