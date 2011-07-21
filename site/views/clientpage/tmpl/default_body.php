<?php
defined('_JEXEC') or die('Restricted Access');
?>
        <table class="adminlist" id="tracker">
		   <caption>Investment Tracker</caption>
            <thead>
				<tr>
                    <th scope="col">
                        <strong>File Name</strong>
                    </th>
                    <th scope="col">
                        <strong>Last Updated</strong>
                    </th>                     
                    <th scope="col">
                        <strong>Downloads</strong>
                    </th>
                </tr>
			</thead>		
            <tbody>
			    <?php foreach ($this->tracker as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['ts']; ?>
                    </td>
                    <td>
                        <a href="<?php echo $row['file_url']; ?>" target="_blank"> Download </a>
                    </td>                     
                </tr>
				<?php } ?>
			</tbody>
        </table>
		
	    <table class="adminlist" id="correspondence">
		    <caption>Correspondence</caption>
            <thead>
				<tr>
                    <th>
                        <strong>File Name</strong>
                    </th>
                    <th>
                        <strong>Date of Upload</strong>
                    </th>                     
                    <th>
                        <strong>Downloads</strong>
                    </th>
                </tr>
			</thead>
            <tbody>
			    <?php   foreach($this->correspondence as $i=>$row) { ?>
                <tr>
                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">
                        <?php echo $row['name']; ?>
                    </td>
                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">
                        <?php echo $row['ts']; ?>
                    </td>
                    <td class="<?php if ($i % 2 == 0) echo 'alt'; ?>">
                        <a href="<?php echo $row['file_url']; ?>" target="_blank"> Download </a>
                    </td>                     
                </tr>
				<?php } ?>
			</tbody>
        </table>
        <table class="adminlist" id="documents">
		   <caption>Documents</caption>
            <thead>
				<tr>
                    <th>
                        <strong>File Name</strong>
                    </th>
                    <th>
                        <strong>Date of Upload</strong>
                    </th>                     
                    <th>
                        <strong>Downloads</strong>
                    </th>
                </tr>
			</thead>
			
            <tbody>
			    <?php foreach($this->document as $c=>$row) { ?>
                <tr>
                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">
                        <?php echo $row['name']; ?>
                    </td>
                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">
                        <?php echo $row['ts']; ?>
                    </td>
                    <td class="<?php if ($c % 2 == 0) echo 'alt'; ?>">
                        <a href="<?php echo $row['file_url']; ?>" target="_blank"> Download </a>
                    </td>                     
                </tr>
				<?php } ?>
			</tbody>
        </table> 