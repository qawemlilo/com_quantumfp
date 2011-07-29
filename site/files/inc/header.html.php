<div style="min-height:525px;" id="app-cont">
    <div class="q_logo"><span class="span">QuantumFP Client File Management System</span> 
       <?php if(!$this->allowed) { ?>  	
        <div class="h-div">
		    <a class="lbox" href="index.php?option=com_quantumfp&view=details">
			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/users_details.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">My Details</span>
			</a>

        </div>
         
        <div class="h-div">
		    <a class="lbox" href="index.php?option=com_quantumfp&view=clientpage">
			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/user_files.png" title="View your files" alt="My Files">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Client Files</span>
			</a>
        </div> 

		<?php } if($this->allowed) {?>
        <div class="h-div">
		    <a class="lbox" href="index.php?option=com_content&view=form&layout=edit">
			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/users_details.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Manage Users</span>
			</a>
        </div>

		

        <div class="h-div">
		    <a class="lbox" href="index.php?option=com_quantumfp&view=uploadfile">
			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/file_upload.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Upload File</span>
			</a>
        </div> 

		

        <div class="h-div">
		    <a class="lbox" href="index.php?option=com_quantumfp&view=addclient">
			    <img style="margin: 0pt auto;" src="components/com_quantumfp/files/images/users_add.png" alt="Article Manager">
				<span style="display: block; text-align: center; margin-top: 2px; font-size: 10px;">Add Client</span>
			</a>
        </div> 
		<?php } ?>
    </div>
    <div style="clear:left;">&nbsp;</div>