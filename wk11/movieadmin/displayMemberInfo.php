<?php
  if (isset($pageTitle)) {
	echo "<h4>{$pageTitle}</h4>";
  }
  
  // Check if the dataList is not empty
	if (count($dataList) === 0) {
		echo "There is no data";
		exit();
	}

   /* In this case, the SQL should return just one record matching the given memberId.
	  Hence, $dataList is an array that consists of just one matching record
   */
   $member = $dataList[0];
   // Display the name of the selected member
   echo "<p>Name: {$member['lastName']}, {$member['firstName']}</p>";
   // Use an HTML form to display data
   ?>
    <form action="index.php?mode=updatememberinfo" method="post">
		<table class="table" style="width: 500px;">
		  <tbody>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $member['phone']; ?>" /></td>
			</tr>
			<tr>
				<td>Member Type</td>
				<td><select name="memberType">
						<option value="Preferred" <?php if ($member['memberType'] === "Preferred") echo "selected='selected'"; ?> >P